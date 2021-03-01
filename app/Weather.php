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

        // 地域のアメダスID
        // アメダスは鹿児島のように地域に複数存在する場合があるが、0番目のものを選ぶ
        $city_amedas_id = WeatherDefinition::ForecastArea[$prefecture_id][$city_index]['amedas'][0];

        // 地域のアメダスのインデックス
        // なんでもかんでも配列のインデックス探さないといけないの心底つらい
        foreach ($forecast_data[0]['timeSeries'][2]['areas'] as $area_key => $area) {
            // アメダス ID と一致したら、そのアメダス ID があるインデックスを取得して終了
            if ($area['area']['code'] === $city_amedas_id) {
                $city_amedas_index = $area_key;
                break;
            }
        }

        // 地域名を取得
        // livedoor天気では観測地点の名前が使われており、それに合わせるため気象データの方から取得している
        $city_name = $forecast_data[0]['timeSeries'][2]['areas'][$city_amedas_index]['area']['name'];


        /**** 気象データから今日・明日・明後日の天気予報を取得 ****/

        // API のデータは日付が変わっても 5 時までは更新されないため、自力で昨日の情報を削除したり整形する作業が必要になる

        // 天気予報
        $forecast = Weather::getForecast($forecast_data, $city_index);

        // 最高気温・最低気温
        $temperature = Weather::getTemperature($forecast_data, $city_amedas_index);


        /**** 出力する JSON データ ****/

        $forecast_json = [
            'publicTime' => $forecast_data[0]['reportDatetime'],
            'formattedPublicTime' => (new DateTimeImmutable($forecast_data[0]['reportDatetime']))->format('Y/m/d H:i:s'),
            'title' => "{$prefecture_name} {$city_name} の天気",
            'link' => "https://www.jma.go.jp/bosai/forecast/#area_type=offices&area_code={$prefecture_id}",
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
                            'celsius' => $temperature[0]['min']['celsius'],
                            'fahrenheit' => $temperature[0]['min']['fahrenheit'],
                        ],
                        'max' => [
                            'celsius' => $temperature[0]['max']['celsius'],
                            'fahrenheit' => $temperature[0]['max']['fahrenheit'],
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
                            'celsius' => $temperature[1]['min']['celsius'],
                            'fahrenheit' => $temperature[1]['min']['fahrenheit'],
                        ],
                        'max' => [
                            'celsius' => $temperature[1]['max']['celsius'],
                            'fahrenheit' => $temperature[1]['max']['fahrenheit'],
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
                    'date' => $forecast[2]['date'],
                    'dateLabel' => "明後日",
                    'telop' => $forecast[2]['telop'],
                    'temperature' => [
                        'min' => [
                            'celsius' => $temperature[2]['min']['celsius'],
                            'fahrenheit' => $temperature[2]['min']['fahrenheit'],
                        ],
                        'max' => [
                            'celsius' => $temperature[2]['max']['celsius'],
                            'fahrenheit' => $temperature[2]['max']['fahrenheit'],
                        ]
                    ],
                    'chanceOfRain' => [
                        '00-06' => '--%',
                        '06-12' => '--%',
                        '12-18' => '--%',
                        '18-24' => '--%',
                    ],
                    'image' => [
                        'title' => $forecast[2]['image']['title'],
                        'url' => $forecast[2]['image']['url'],
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
     * 取得した生の気象データから、今日・明日・明後日の天気予報・気温・降水確率を取得する
     *
     * @param array $forecast_data API から取得した気象データ
     * @param int $city_index 取得する地域の配列のインデックス
     * @return array 整形された気象データ
     */
    private static function getForecast(array $forecast_data, int $city_index): array
    {
        $forecast = [];

        // 現在の時刻
        $today_datetime = new DateTimeImmutable('now');

        // timeDefines の数だけループを回す
        $day_index = 0;
        for ($count = 0; $count < count($forecast_data[0]['timeSeries'][0]['timeDefines']); $count++) {

            // 比較対象の時刻
            $compare_datetime = new DateTimeImmutable($forecast_data[0]['timeSeries'][0]['timeDefines'][$count]);

            // 比較対象の日付が現在の日付より過去（小さい）ならスキップ
            if ($compare_datetime->setTime(0,0) < $today_datetime->setTime(0,0)) {
                continue;
            }

            // 天気コード
            // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
            $weathercode = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['weatherCodes'][$count];

            // データを入れる
            $forecast[$day_index] = [
                'date' => $compare_datetime->format('Y-m-d'),
                'telop' => WeatherDefinition::Telops[$weathercode][3],
                'image' => [
                    'title' => WeatherDefinition::Telops[$weathercode][3],  // テロップと共通
                    'url' => 'https://www.jma.go.jp/bosai/forecast/img/' . WeatherDefinition::Telops[$weathercode][0],  // 気象庁の SVG にリンク
                ]
            ];

            $day_index++;  // インデックスを足す
        }

        // 明後日の天気が 3 日間予報から取得できない場合（多くの場合、0時～5時の期間）は、週間天気予報からデータを持ってくる
        // 以下は0時～5時の明後日専用の処理
        if (!isset($forecast[2])) {

            // 明後日の時刻
            $aftertomorrow_datetime = $today_datetime->modify('+2 days');

            // 週間天気予報から明後日の日付を見つけ、インデックスを手に入れる
            foreach ($forecast_data[1]['timeSeries'][0]['timeDefines'] as $key => $value) {

                // 比較対象の時刻
                $compare_datetime = new DateTimeImmutable($value);

                // 同じ時刻ならインデックスを取得して break
                if ($compare_datetime->setTime(0,0) == $aftertomorrow_datetime->setTime(0,0)) {
                    $aftertomorrow_index = $key;
                    break;
                }
            }

            // 天気コード
            // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
            // 週間天気予報は県（気象台）単位でしか存在しないので、$city_index はここでは使わない
            $aftertomorrow_weathercode = $forecast_data[1]['timeSeries'][0]['areas'][0]['weatherCodes'][$aftertomorrow_index];

            // データを入れる
            $forecast[2] = [
                'date' => $aftertomorrow_datetime->format('Y-m-d'),
                'telop' => WeatherDefinition::Telops[$aftertomorrow_weathercode][3],
                'image' => [
                    'title' => WeatherDefinition::Telops[$aftertomorrow_weathercode][3],  // テロップと共通
                    'url' => 'https://www.jma.go.jp/bosai/forecast/img/' . WeatherDefinition::Telops[$aftertomorrow_weathercode][0],  // 気象庁の SVG にリンク
                ]
            ];
        }

        clock()->debug($forecast);

        return $forecast;
    }


    /**
     * 取得した生の気象データから、今日・明日・明後日の気温を取得する
     *
     * @param array $forecast_data API から取得した気象データ
     * @param int $city_amedas_index 取得する地域のアメダス ID の配列のインデックス
     * @return array 整形された気象データ
     */
    private static function getTemperature(array $forecast_data, int $city_amedas_index): array
    {
        $temperature = [];

        // TODO: 現在の方法だとあまりにもバグが出るので、もう timeDefines に指定時刻が存在するかでやった方が早い気がする
        // 指定時刻が存在しなかったら null にしておいたり、後で週間天気予報から持ってきたりする

        $days_datetime = [
            (new DateTimeImmutable('now')),  // 現在の時刻
            (new DateTimeImmutable('now'))->modify('+1 days'),  // 明日の時刻
            (new DateTimeImmutable('now'))->modify('+2 days'),  // 明後日の時刻
        ];

        $temperature_index_min = [null, null, null];
        $temperature_index_max = [null, null, null];

        // 最高気温・最低気温の中から今日・明日・明後日の日付を見つけ、インデックスを手に入れる
        foreach ($forecast_data[0]['timeSeries'][2]['timeDefines'] as $timedefine_index => $timedefine) {

            // 比較対象（処理対象）の時刻
            $compare_datetime = new DateTimeImmutable($timedefine);

            foreach ($days_datetime as $day_index => $day_datetime) {

                // 最低気温
                // 同じ時刻ならインデックスを取得して break
                if ($compare_datetime == $day_datetime->setTime(0,0)) {
                    $temperature_index_min[$day_index] = $timedefine_index;
                    break;
                }

                // 最高気温
                // 同じ時刻ならインデックスを取得して break
                if ($compare_datetime == $day_datetime->setTime(9,0)) {
                    $temperature_index_max[$day_index] = $timedefine_index;
                    break;
                }
            }
        }

        // インデックスを手に入れたので、インデックスが null でなければアクセスしてデータを取りに行く
        foreach ($days_datetime as $day_index => $day_datetime) {

            // ネスト長過ぎる
            $temps = $forecast_data[0]['timeSeries'][2]['areas'][$city_amedas_index]['temps'];

            // 現在のループのインデックスの気温のインデックスが null じゃなければ取得を実行（ややこしすぎる）
            // シーケンス制御みたいになってるのが悪い
            $temperature[$day_index] = [
                'min' => [
                    'celsius' => ($temperature_index_min[$day_index] !== null ?
                                  $temps[$temperature_index_min[$day_index]] : null),  // 摂氏はそのまま
                    'fahrenheit' => ($temperature_index_min[$day_index] !== null ?
                                     strval($temps[$temperature_index_min[$day_index]] * 1.8 + 32) : null),  // 華氏に変換
                ],
                'max' => [
                    'celsius' => ($temperature_index_max[$day_index] !== null ?
                                  $temps[$temperature_index_max[$day_index]] : null),  // 摂氏はそのまま
                    'fahrenheit' => ($temperature_index_max[$day_index] !== null ?
                                     strval($temps[$temperature_index_max[$day_index]] * 1.8 + 32) : null),  // 華氏に変換
                ]
            ];
        }
                    
        // 今日の最低気温は常に存在しないのが正しいらしい🤔ので弾く
        // ダミーの最低気温が入っているとき、最低気温は最高気温と同じ値になるのを利用する（ HP 上では - になってる）
        // いっそ API に今日の最低気温を含めないでくれ…って気持ち
        if ($temperature[0]['min']['celsius'] === $temperature[0]['max']['celsius']) {
            $temperature[0]['min']['celsius'] = null;
            $temperature[0]['min']['fahrenheit'] = null;
        }

        // 明後日の最高気温・最低気温は常に取得できないはずなので、週間天気予報から持ってくる
        // 明日分も0時～5時は取得できない事が多い
        foreach ($temperature as $temperature_key => $temperature_value) {

            // その日の最高気温・最低気温ともに存在しない
            if ($temperature_value['min']['celsius'] === null and $temperature_value['max']['celsius'] === null) {

                // 明後日の時刻
                $aftertomorrow_datetime = $days_datetime[2];
    
                // 週間天気予報から明後日の日付を見つけ、インデックスを手に入れる
                foreach ($forecast_data[1]['timeSeries'][1]['timeDefines'] as $key => $value) {
    
                    // 比較対象の時刻
                    $compare_datetime = new DateTimeImmutable($value);
    
                    // 同じ時刻ならインデックスを取得して break
                    if ($compare_datetime->setTime(0,0) == $aftertomorrow_datetime->setTime(0,0)) {
                        $aftertomorrow_index = $key;
                        break;
                    }
                }
   
                // インデックスが定義されている場合だけ
                if (isset($aftertomorrow_index)) {

                    // 最高気温・最低気温
                    $aftertomorrow_tempmin = $forecast_data[1]['timeSeries'][1]['areas'][0]['tempsMin'][$aftertomorrow_index];
                    $aftertomorrow_tempmax = $forecast_data[1]['timeSeries'][1]['areas'][0]['tempsMax'][$aftertomorrow_index];
        
                    // データを入れる
                    $temperature[$temperature_key] = [
                        'min' => [
                            'celsius' => $aftertomorrow_tempmin,  // 摂氏はそのまま
                            'fahrenheit' => strval($aftertomorrow_tempmin * 1.8 + 32),  // 華氏に変換
                        ],
                        'max' => [
                            'celsius' => $aftertomorrow_tempmax,  // 摂氏はそのまま
                            'fahrenheit' => strval($aftertomorrow_tempmax * 1.8 + 32),  // 華氏に変換
                        ]
                    ];
                }
            }
        }

        clock()->debug($temperature);
        
        return $temperature;
    }
}
