<?php

namespace App;

use DateTimeImmutable;
use App\WeatherDefinition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Weather extends Model
{

    /**
     * 天気予報を livedoor 天気互換の JSON で返す
     *
     * @param string $id 地点定義表で定義されている地点ID
     * @return array livedoor 天気互換の JSON
     */
    public static function getWeather(string $id): array
    {

        // サイトの URL を取得
        $url = url('/');


        /**** 各 ID 定義 ****/

        // 数値でない or 6桁ではない or 地点定義に存在しないID
        if (!is_numeric($id) or strlen($id) != 6 or !isset(WeatherDefinition::Areas['class10s'][$id])) {
            return ['error' => 'The specified city ID is invalid.'];
        }

        // 地域ID / 地域名（〇〇地方）
        $city_id = (string) $id;
        $city_point_name = WeatherDefinition::Areas['class10s'][$city_id]['name'];

        // 地域 ID から配列のインデックスを抽出
        $city_index = intval(substr($city_id, 4, 1)) - 1;
        if ($city_index < 0) $city_index = 0;  // 大東島など一部の地域用

        // 都道府県ID / 都道府県名
        $prefecture_id = (string) WeatherDefinition::Areas['class10s'][$id]['parent'];
        $prefecture_name = WeatherDefinition::Areas['offices'][$prefecture_id]['name'];

        // 地方名（九州、東北 など）
        $area_name = Weather::getAreaName($prefecture_id);


        /**** API リクエスト ****/

        // 気象庁 HP の API
        $jma_api_forecast = "https://www.jma.go.jp/bosai/forecast/data/forecast/{$prefecture_id}.json";
        $jma_api_overview = "https://www.jma.go.jp/bosai/forecast/data/overview_forecast/{$prefecture_id}.json";

        // API から気象データを取得
        $forecast_response = HTTP::get($jma_api_forecast);
        if ($forecast_response->status() === 200) {
            $forecast_data = $forecast_response->json();
        } else {
            return ['error' => "Request to JMA API failed (HTTP Error {$forecast_response->status()})"];
        }
        $overview_response = HTTP::get($jma_api_overview);
        if ($overview_response->status() === 200){
            $overview = $overview_response->json();
        } else {
            return ['error' => "Request to JMA API failed (HTTP Error {$forecast_response->status()})"];
        }

        // 地域名を取得
        // livedoor天気では観測地点の名前が使われており、それに合わせるため気象データの方から取得している
        $city_name = $forecast_data[0]['timeSeries'][2]['areas'][$city_index]['area']['name'];


        /**** 気象データから今日・明日・明後日の天気予報を取得 ****/

        // API のデータは日付が変わっても 5 時までは更新されないため、自力で昨日の情報を削除したり整形する作業が必要になる
        $forecast = Weather::getForecast($forecast_data, $city_index);


        /**** 出力する JSON データ ****/

        $forecast_json = [
            'publicTime' => $forecast_data[0]['reportDatetime'],
            'formattedPublicTime' => (new DateTimeImmutable($forecast_data[0]['reportDatetime']))->format('Y/m/d H:i:s'),
            'title' => "{$prefecture_name} {$city_name} の天気",
            'link' => "https://www.jma.go.jp/jma/",
            'description' => [
                'text' => "{$overview['headlineText']}\n\n{$overview['text']}",
                'publicTime' => $overview['reportDatetime'],
                'formattedPublicTime' => (new DateTimeImmutable($overview['reportDatetime']))->format('Y/m/d H:i:s')
            ],
            'forecasts' => [
                [
                    'date' => $forecast[0]['date'],
                    'dateLabel' => "今日",
                    'telop' => $forecast[0]['telop'],
                    'temperature' => [
                        'min' => [
                            'celsius' => null,
                            'fahrenheit' => null,
                        ],
                        'max' => [
                            'celsius' => null,
                            'fahrenheit' => null,
                        ]
                    ],
                    'chanceOfRain' => [
                        '00-06' => '--%',
                        '06-12' => '--%',
                        '12-18' => '--%',
                        '18-24' => '--%',
                    ],
                    'image' => [
                        'title' => $forecast[0]['image']['title'],
                        'url' => $forecast[0]['image']['url'],
                        'width' => 80,
                        'height' => 60,
                    ]
                ],
                [
                    'date' => $forecast[1]['date'],
                    'dateLabel' => "明日",
                    'telop' => $forecast[1]['telop'],
                    'temperature' => [
                        'min' => [
                            'celsius' => null,
                            'fahrenheit' => null,
                        ],
                        'max' => [
                            'celsius' => null,
                            'fahrenheit' => null,
                        ]
                    ],
                    'chanceOfRain' => [
                        '00-06' => '--%',
                        '06-12' => '--%',
                        '12-18' => '--%',
                        '18-24' => '--%',
                    ],
                    'image' => [
                        'title' => $forecast[1]['image']['title'],
                        'url' => $forecast[1]['image']['url'],
                        'width' => 80,
                        'height' => 60,
                    ]
                ],
                [
                    'date' => null,
                    'dateLabel' => "明後日",
                    'telop' => null,
                    'temperature' => [
                        'min' => null,
                        'max' => null,
                    ],
                    'chanceOfRain' => [
                        '00-06' => '--%',
                        '06-12' => '--%',
                        '12-18' => '--%',
                        '18-24' => '--%',
                    ],
                    'image' => [
                        'title' => null,
                        'url' => null,
                        'width' => 80,
                        'height' => 60,
                    ]
                ]
            ],
            'location' => [
                'city' => $city_name,
                'area' => $area_name,
                'prefecture' => $prefecture_name,
            ],
            'copyright' => [
                'link' => "{$url}/",
                'title' => "(C) 天気予報 API（livedoor 天気互換）",
                'image' => [
                    'width' => 120,
                    'height' => 120,
                    'link' => "{$url}/",
                    'url' => "{$url}/logo.png",
                    'title' => "天気予報 API（livedoor 天気互換）",
                ],
                'provider' => [
                    [
                        'link' => "https://www.jma.go.jp/jma/",
                        'name' => "気象庁 Japan Meteorological Agency",
                        'note' => "気象庁 HP にて配信されている天気予報を json データへ編集しています。",
                    ]
                ]
            ]
        ];

        // json を返す
        return $forecast_json;
    }


    /**
     * 都道府県 ID からその都道府県が属する地方名を取得する
     * WeatherDefinition では「九州北部地方（山口県を含む）」のように一般的な分類がされていないため
     *
     * @param string $prefecture_id 都道府県ID
     * @return string 地方名
     */
    private static function getAreaName(string $prefecture_id): string
    {
        $prefecture_id = intval(substr($prefecture_id, 0, 2));
        if ($prefecture_id === 1) {
            $area = '北海道';
        } else if ($prefecture_id >= 2 and $prefecture_id <= 7) {
            $area = '東北';
        } else if ($prefecture_id >= 8 and $prefecture_id <= 14) {
            $area = '関東';
        } else if ($prefecture_id >= 15 and $prefecture_id <= 23) {
            $area = '中部';
        } else if ($prefecture_id >= 24 and $prefecture_id <= 30) {
            $area = '近畿';
        } else if ($prefecture_id >= 31 and $prefecture_id <= 35) {
            $area = '中国';
        } else if ($prefecture_id >= 36 and $prefecture_id <= 39) {
            $area = '四国';
        } else if ($prefecture_id >= 40 and $prefecture_id <= 46) {
            $area = '九州';
        } else if ($prefecture_id === 47) {
            $area = '沖縄';
        } else {
            $area = '日本';
        }
        return $area;
    }


    /**
     * 取得した生の気象データから、今日・明日・明後日の天気予報を取得する
     *
     * @param array $forecast_data API から取得した気象データ
     * @param int $city_index 取得する地域の配列のインデックス
     * @return array 整形された気象データ
     */
    private static function getForecast(array $forecast_data, int $city_index): array
    {
        // 定義
        $forecast = [];

        // timeDefines の数だけループを回す
        $index = 0;
        for ($count = 0; $count < count($forecast_data[0]['timeSeries'][0]['timeDefines']); $count++) {

            // 比較対象の時刻
            $compare_datetime = new DateTimeImmutable($forecast_data[0]['timeSeries'][0]['timeDefines'][$count]);

            // 現在の時刻
            $current_datetime = new DateTimeImmutable('now');

            // 比較対象の日付が現在の日付より過去（小さい）ならスキップ
            if ($compare_datetime->setTime(0,0) < $current_datetime->setTime(0,0)) {
                continue;
            }

            // 天気コード
            // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
            $weathercode = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['weatherCodes'][$count];

            // データを入れる
            $forecast[$index] = [
                'date' => $compare_datetime->format('Y-m-d'),
                'telop' => WeatherDefinition::Telops[$weathercode][3],
                'image' => [
                    'title' => WeatherDefinition::Telops[$weathercode][3],  // テロップと共通
                    'url' => 'https://www.jma.go.jp/bosai/forecast/img/' . WeatherDefinition::Telops[$weathercode][0],  // 気象庁の SVG にリンク
                ]
            ];

            $index++;  // インデックスを足す
        }

        clock()->debug($forecast);

        return $forecast;
    }


    /**
     * 取得した生の気象データから、今日・明日・明後日の気温を取得する
     *
     * @param array $forecast_data
     * @return array
     */
    private static function getTemperature(array $forecast_data): array
    {
        return [];
    }
}
