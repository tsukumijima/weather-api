<?php

namespace App;

use DateTimeImmutable;
use App\WeatherDefinition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

        // 天気画像
        $weather_image = [
            '晴れ' => "{$url}/icon/1.gif",
            '晴時々曇' => "{$url}/icon/2.gif",
            '晴時々雨' => "{$url}/icon/3.gif",
            '晴時々雨か雪' => "{$url}/icon/3.gif",
            '晴時々雪' => "{$url}/icon/4.gif",
            '晴一時曇' => "{$url}/icon/2.gif",
            '晴一時雨' => "{$url}/icon/3.gif",
            '晴一時雨か雪' => "{$url}/icon/3.gif",
            '晴一時雪' => "{$url}/icon/4.gif",
            '晴のち時々曇' => "{$url}/icon/2.gif",
            '晴のち時々雨' => "{$url}/icon/3.gif",
            '晴のち時々雨か雪' => "{$url}/icon/3.gif",
            '晴のち時々雪' => "{$url}/icon/4.gif",
            '晴のち一時曇' => "{$url}/icon/2.gif",
            '晴のち一時雨' => "{$url}/icon/3.gif",
            '晴のち一時雨か雪' => "{$url}/icon/3.gif",
            '晴のち一時雪' => "{$url}/icon/4.gif",
            '晴のち曇' => "{$url}/icon/5.gif",
            '晴のち雨' => "{$url}/icon/6.gif",
            '晴のち雨か雪' => "{$url}/icon/6.gif",
            '晴のち雪' => "{$url}/icon/7.gif",
            '曇り' => "{$url}/icon/8.gif",
            '曇時々晴' => "{$url}/icon/9.gif",
            '曇時々雨' => "{$url}/icon/10.gif",
            '曇時々雨か雪' => "{$url}/icon/10.gif",
            '曇時々雪' => "{$url}/icon/11.gif",
            '曇一時晴' => "{$url}/icon/9.gif",
            '曇一時雨' => "{$url}/icon/10.gif",
            '曇一時雨か雪' => "{$url}/icon/10.gif",
            '曇一時雪' => "{$url}/icon/11.gif",
            '曇のち時々晴' => "{$url}/icon/9.gif",
            '曇のち時々雨' => "{$url}/icon/10.gif",
            '曇のち時々雨か雪' => "{$url}/icon/10.gif",
            '曇のち時々雪' => "{$url}/icon/11.gif",
            '曇のち一時晴' => "{$url}/icon/9.gif",
            '曇のち一時雨' => "{$url}/icon/10.gif",
            '曇のち一時雨か雪' => "{$url}/icon/10.gif",
            '曇のち一時雪' => "{$url}/icon/11.gif",
            '曇のち晴' => "{$url}/icon/12.gif",
            '曇のち雨' => "{$url}/icon/13.gif",
            '曇のち雨か雪' => "{$url}/icon/13.gif",
            '曇のち雪' => "{$url}/icon/14.gif",
            '雨' => "{$url}/icon/15.gif",
            '雨か雪' => "{$url}/icon/15.gif",
            '雨時々晴' => "{$url}/icon/16.gif",
            '雨時々曇' => "{$url}/icon/17.gif",
            '雨時々雪' => "{$url}/icon/18.gif",
            '雨一時晴' => "{$url}/icon/16.gif",
            '雨一時曇' => "{$url}/icon/17.gif",
            '雨一時雪' => "{$url}/icon/18.gif",
            '雨のち時々晴' => "{$url}/icon/16.gif",
            '雨のち時々曇' => "{$url}/icon/17.gif",
            '雨のち時々雪' => "{$url}/icon/18.gif",
            '雨のち一時晴' => "{$url}/icon/16.gif",
            '雨のち一時曇' => "{$url}/icon/17.gif",
            '雨のち一時雪' => "{$url}/icon/18.gif",
            '雨のち晴' => "{$url}/icon/19.gif",
            '雨のち曇' => "{$url}/icon/20.gif",
            '雨のち雪' => "{$url}/icon/21.gif",
            '大雨' => "{$url}/icon/22.gif",
            '暴風雨' => "{$url}/icon/22.gif",
            '雪' => "{$url}/icon/23.gif",
            '雪時々晴' => "{$url}/icon/24.gif",
            '雪時々曇' => "{$url}/icon/25.gif",
            '雪時々雨' => "{$url}/icon/26.gif",
            '雪時々雨か雪' => "{$url}/icon/26.gif",
            '雪一時晴' => "{$url}/icon/24.gif",
            '雪一時曇' => "{$url}/icon/25.gif",
            '雪一時雨' => "{$url}/icon/26.gif",
            '雪一時雨か雪' => "{$url}/icon/26.gif",
            '雪のち時々晴' => "{$url}/icon/24.gif",
            '雪のち時々曇' => "{$url}/icon/25.gif",
            '雪のち時々雨' => "{$url}/icon/26.gif",
            '雪のち時々雨か雪' => "{$url}/icon/26.gif",
            '雪のち一時晴' => "{$url}/icon/24.gif",
            '雪のち一時曇' => "{$url}/icon/25.gif",
            '雪のち一時雨' => "{$url}/icon/26.gif",
            '雪のち一時雨か雪' => "{$url}/icon/26.gif",
            '雪のち晴' => "{$url}/icon/27.gif",
            '雪のち曇' => "{$url}/icon/28.gif",
            '雪のち雨' => "{$url}/icon/29.gif",
            '雪のち雨か雪' => "{$url}/icon/29.gif",
            '大雪' => "{$url}/icon/30.gif",
            '暴風雪' => "{$url}/icon/30.gif",
            'その他' => "{$url}/icon/31.gif"
        ];


        /**** 各 ID 定義 ****/

        // 数値でない or 6桁ではない or 地点定義に存在しないID
        if (!is_numeric($id) or strlen($id) != 6 or !isset(WeatherDefinition::AREA['class10s'][$id])) {
            return ['error' => 'The specified city ID is invalid.'];
        }

        // 地域ID / 地域名（〇〇地方）
        $city_id = (string) $id;
        $city_index = intval(substr($city_id, 4, 1)) - 1;
        if ($city_index < 0) $city_index = 0;  // 大東島など一部の地域用
        $city_point_name = WeatherDefinition::AREA['class10s'][$city_id]['name'];

        // 都道府県ID / 都道府県名
        $prefecture_id = (string) WeatherDefinition::AREA['class10s'][$id]['parent'];
        $prefecture_name = WeatherDefinition::AREA['offices'][$prefecture_id]['name'];

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
        $forecast = Weather::getForecast($forecast_data);


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
                    'telop' => null,
                    'temperature' => [
                        'min' => [
                            'celsius' => null,
                            'fahrenheit' => null
                        ],
                        'max' => [
                            'celsius' => null,
                            'fahrenheit' => null
                        ]
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
                        'width' => 50,
                        'height' => 31
                    ]
                ],
                [
                    'date' => $forecast[1]['date'],
                    'dateLabel' => "明日",
                    'telop' => null,
                    'temperature' => [
                        'min' => [
                            'celsius' => null,
                            'fahrenheit' => null
                        ],
                        'max' => [
                            'celsius' => null,
                            'fahrenheit' => null
                        ]
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
                        'width' => 50,
                        'height' => 31
                    ]
                ],
                [
                    'date' => $forecast[2]['date'],
                    'dateLabel' => "明後日",
                    'telop' => null,
                    'temperature' => [
                        'min' => null,
                        'max' => null
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
                        'width' => 50,
                        'height' => 31
                    ]
                ]
            ],
            'location' => [
                'city' => $city_name,
                'area' => $area_name,
                'prefecture' => $prefecture_name
            ],
            'copyright' => [
                'link' => "{$url}/",
                'title' => "(C) 天気予報 API（livedoor 天気互換）",
                'image' => [
                    'width' => 120,
                    'height' => 120,
                    'link' => "{$url}/",
                    'url' => "{$url}/logo.png",
                    'title' => "天気予報 API（livedoor 天気互換）"
                ],
                'provider' => [
                    [
                        'link' => "https://www.jma.go.jp/jma/",
                        'name' => "気象庁 Japan Meteorological Agency",
                        'note' => "気象庁 HP にて配信されている天気予報を json データへ編集しています。"
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
     * @param array $forecast_data
     * @return array
     */
    private static function getForecast(array $forecast_data): array
    {
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

            // データを入れる
            $forecast[$index] = [
                'date' => $compare_datetime->format('Y-m-d'),
            ];

            $index++;  // インデックスを足す
        }

        Log::Debug($forecast);

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
