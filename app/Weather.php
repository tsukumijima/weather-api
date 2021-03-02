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

        // 地域の週間天気予報用のインデックス
        // ほとんどは県あたりの観測地点は1箇所しかないが、小笠原諸島がある東京、奄美地方のある鹿児島などでは複数存在する
        // なんでもかんでも配列のインデックス探さないといけないの心底つらい
        foreach ($forecast_data[1]['timeSeries'][1]['areas'] as $area_key => $area) {
            // アメダス ID と一致したら、そのアメダス ID があるインデックスを取得して終了
            if ($area['area']['code'] === $city_amedas_id) {
                $city_weekly_index = $area_key;
                break;
            }
        }
        // 取得できなかった場合（3日間天気でしか観測を行っていない地点）は 0 とし、その都道府県のメインの観測地点を利用する
        if (!isset($city_weekly_index)) {
            $city_weekly_index = 0;
        }

        // 地域名を取得
        // livedoor天気では観測地点の名前が使われており、それに合わせるため気象データの方から取得している
        $city_name = $forecast_data[0]['timeSeries'][2]['areas'][$city_amedas_index]['area']['name'];


        /**** 気象データから今日・明日・明後日の天気予報を取得 ****/

        // API のデータは日付が変わっても 5 時までは更新されないため、自力で昨日の情報を削除したり整形する作業が必要になる

        // 天気予報
        $forecast = Weather::getForecast($forecast_data, $city_index, $city_weekly_index);

        // 最高気温・最低気温
        $temperature = Weather::getTemperature($forecast_data, $city_amedas_index, $city_weekly_index);

        // 降水確率
        $chanceofrain = Weather::getChanceOfRain($forecast_data, $city_index, $city_weekly_index);


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
                        'T00_06' => $chanceofrain[0]['T00_06'],
                        'T06_12' => $chanceofrain[0]['T06_12'],
                        'T12_18' => $chanceofrain[0]['T12_18'],
                        'T18_24' => $chanceofrain[0]['T18_24'],
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
                        'T00_06' => $chanceofrain[1]['T00_06'],
                        'T06_12' => $chanceofrain[1]['T06_12'],
                        'T12_18' => $chanceofrain[1]['T12_18'],
                        'T18_24' => $chanceofrain[1]['T18_24'],
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
                        'T00_06' => $chanceofrain[2]['T00_06'],
                        'T06_12' => $chanceofrain[2]['T06_12'],
                        'T12_18' => $chanceofrain[2]['T12_18'],
                        'T18_24' => $chanceofrain[2]['T18_24'],
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
     * もうちょっと綺麗にかけたよなってのが正直な感想だけど動いてるのでこのまま
     *
     * @param array $forecast_data API から取得した気象データ
     * @param int $city_index 取得する地域の配列のインデックス
     * @param int $city_weekly_index 取得する地域の配列のインデックス（週間天気予報用）
     * @return array 整形された気象データ
     */
    private static function getForecast(array $forecast_data, int $city_index, int $city_weekly_index): array
    {
        $forecast = [];

        $days_datetime = [
            (new DateTimeImmutable('now')),  // 現在の時刻
            (new DateTimeImmutable('now'))->modify('+1 days'),  // 明日の時刻
            (new DateTimeImmutable('now'))->modify('+2 days'),  // 明後日の時刻
        ];

        // 今日・明日・明後日の天気予報が載っている配列のインデックスを格納
        $forecast_index = [null, null, null];

        // timeDefines の中から今日・明日・明後日の日付を見つけ、インデックスを手に入れる
        // 見つからなかったら既定値の null になる
        foreach ($forecast_data[0]['timeSeries'][0]['timeDefines'] as $timedefine_index => $timedefine) {

            // 比較対象（処理対象）の時刻
            $compare_datetime = new DateTimeImmutable($timedefine);

            foreach ($days_datetime as $day_index => $day_datetime) {

                // 同じ時刻ならインデックスを取得して抜ける
                if ($compare_datetime->setTime(0,0) == $day_datetime->setTime(0,0)) {
                    $forecast_index[$day_index] = $timedefine_index;
                    break;
                }
            }
        }

        // インデックスを手に入れたので、インデックスが null でなければアクセスしてデータを取りに行く
        foreach ($days_datetime as $day_index => $day_datetime) {

            // 天気コード
            // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
            $weathercodes = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['weatherCodes'];
            $weathercode = ($forecast_index[$day_index] !== null ? $weathercodes[$forecast_index[$day_index]] : null);
            
            // データを入れる
            $forecast[$day_index] = [
                'date' => $day_datetime->format('Y-m-d'),
                'telop' => ($weathercode !== null ? WeatherDefinition::Telops[$weathercode][3]: null),
                'image' => [
                    // テロップと共通
                    'title' => ($weathercode !== null ? WeatherDefinition::Telops[$weathercode][3]: null),
                    // 気象庁の SVG にリンク
                    'url' => ($weathercode !== null ? 'https://www.jma.go.jp/bosai/forecast/img/' . WeatherDefinition::Telops[$weathercode][0]: null),
                ]
            ];
        }

        // 明後日の天気が 3 日間予報から取得できない場合（多くの場合、0時～5時の期間）は、週間天気予報からデータを持ってくる
        // 以下は0時～5時の明後日専用の処理
        foreach ($forecast as $forecast_key => $forecast_value) {

            // その日の天気予報がすべて存在しない
            if ($forecast_value['telop'] === null) {

                // 週間天気予報の時刻
                $weekly_datetime = $days_datetime[$forecast_key];
    
                // 週間天気予報から目当ての日付を見つけ、インデックスを手に入れる
                foreach ($forecast_data[1]['timeSeries'][0]['timeDefines'] as $key => $value) {
    
                    // 比較対象の時刻
                    $compare_datetime = new DateTimeImmutable($value);
    
                    // 同じ時刻ならインデックスを取得して抜ける
                    if ($compare_datetime->setTime(0,0) == $weekly_datetime->setTime(0,0)) {
                        $weekly_index = $key;
                        break;
                    }
                }
   
                // インデックスが定義されている場合だけ
                if (isset($weekly_index)) {

                    // 天気コード
                    // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
                    $weathercode = $forecast_data[1]['timeSeries'][0]['areas'][$city_weekly_index]['weatherCodes'][$weekly_index];
            
                    // データを入れる
                    $forecast[$day_index] = [
                        'date' => $days_datetime[$forecast_key]->format('Y-m-d'),
                        'telop' => WeatherDefinition::Telops[$weathercode][3],
                        'image' => [
                            // テロップと共通
                            'title' => WeatherDefinition::Telops[$weathercode][3],
                            // 気象庁の SVG にリンク
                            'url' => 'https://www.jma.go.jp/bosai/forecast/img/' . WeatherDefinition::Telops[$weathercode][0],
                        ]
                    ];
                }
            }
        }

        clock()->debug($forecast);

        return $forecast;
    }


    /**
     * 取得した生の気象データから、今日・明日・明後日の気温を取得する
     *
     * @param array $forecast_data API から取得した気象データ
     * @param int $city_amedas_index 取得する地域のアメダス ID の配列のインデックス
     * @param int $city_weekly_index 取得する地域の配列のインデックス（週間天気予報用）
     * @return array 整形された気象データ
     */
    private static function getTemperature(array $forecast_data, int $city_amedas_index, int $city_weekly_index): array
    {
        $temperature = [];

        $days_datetime = [
            (new DateTimeImmutable('now')),  // 現在の時刻
            (new DateTimeImmutable('now'))->modify('+1 days'),  // 明日の時刻
            (new DateTimeImmutable('now'))->modify('+2 days'),  // 明後日の時刻
        ];

        // 今日・明日・明後日の最高気温/最低気温が載っている配列のインデックスを格納
        $temperature_index_min = [null, null, null];
        $temperature_index_max = [null, null, null];

        // timeDefines の中から今日・明日・明後日の日付を見つけ、インデックスを手に入れる
        // 見つからなかったら既定値の null になる
        foreach ($forecast_data[0]['timeSeries'][2]['timeDefines'] as $timedefine_index => $timedefine) {

            // 比較対象（処理対象）の時刻
            $compare_datetime = new DateTimeImmutable($timedefine);

            foreach ($days_datetime as $day_index => $day_datetime) {

                // 最低気温
                // 同じ時刻ならインデックスを取得して抜ける
                if ($compare_datetime == $day_datetime->setTime(0,0)) {
                    $temperature_index_min[$day_index] = $timedefine_index;
                    break;
                }

                // 最高気温
                // 同じ時刻ならインデックスを取得して抜ける
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
        // ダミーの最低気温が入っているとき、最低気温は最高気温と同じ値かそれ以上になるのを利用する（ HP 上では - になってる）
        // いっそ API に今日の最低気温を含めないでくれ…って気持ち
        if (intval($temperature[0]['min']['celsius']) >= intval($temperature[0]['max']['celsius'])) {
            $temperature[0]['min']['celsius'] = null;
            $temperature[0]['min']['fahrenheit'] = null;
        }

        // 明後日の最高気温・最低気温は常に取得できないはずなので、週間天気予報から持ってくる
        // 明日分も0時～5時は取得できないと思われる
        foreach ($temperature as $temperature_key => $temperature_value) {

            // その日の最高気温・最低気温ともに存在しない
            if ($temperature_value['min']['celsius'] === null and $temperature_value['max']['celsius'] === null) {

                // 週間天気予報の時刻
                $weekly_datetime = $days_datetime[$temperature_key];
    
                // 週間天気予報から目当ての日付を見つけ、インデックスを手に入れる
                foreach ($forecast_data[1]['timeSeries'][1]['timeDefines'] as $key => $value) {
    
                    // 比較対象の時刻
                    $compare_datetime = new DateTimeImmutable($value);
    
                    // 同じ時刻ならインデックスを取得して抜ける
                    if ($compare_datetime->setTime(0,0) == $weekly_datetime->setTime(0,0)) {
                        $weekly_index = $key;
                        break;
                    }
                }
   
                // インデックスが定義されている場合だけ
                if (isset($weekly_index)) {

                    // 最高気温・最低気温
                    $weekly_tempmin = $forecast_data[1]['timeSeries'][1]['areas'][$city_weekly_index]['tempsMin'][$weekly_index];
                    $weekly_tempmax = $forecast_data[1]['timeSeries'][1]['areas'][$city_weekly_index]['tempsMax'][$weekly_index];
        
                    // データを入れる
                    $temperature[$temperature_key] = [
                        'min' => [
                            'celsius' => $weekly_tempmin,  // 摂氏はそのまま
                            'fahrenheit' => strval($weekly_tempmin * 1.8 + 32),  // 華氏に変換
                        ],
                        'max' => [
                            'celsius' => $weekly_tempmax,  // 摂氏はそのまま
                            'fahrenheit' => strval($weekly_tempmax * 1.8 + 32),  // 華氏に変換
                        ]
                    ];
                }
            }
        }

        clock()->debug($temperature);
        
        return $temperature;
    }


    /**
     * 取得した生の気象データから、今日・明日・明後日の降水確率を取得する
     *
     * @param array $forecast_data API から取得した気象データ
     * @param int $city_index 取得する地域の配列のインデックス
     * @param int $city_weekly_index 取得する地域の配列のインデックス（週間天気予報用）
     * @return array 整形された気象データ
     */
    private static function getChanceOfRain(array $forecast_data, int $city_index, int $city_weekly_index): array
    {
        $chanceofrain = [];

        $days_datetime = [
            (new DateTimeImmutable('now')),  // 現在の時刻
            (new DateTimeImmutable('now'))->modify('+1 days'),  // 明日の時刻
            (new DateTimeImmutable('now'))->modify('+2 days'),  // 明後日の時刻
        ];

        // 今日・明日・明後日の降水確率が載っている配列のインデックスを格納
        $chanceofrain_index = [
            'T00_06' => [null, null, null],
            'T06_12' => [null, null, null],
            'T12_18' => [null, null, null],
            'T18_24' => [null, null, null],
        ];

        // timeDefines の中から今日・明日・明後日の日付を見つけ、インデックスを手に入れる
        // 最高気温/最低気温同様、降水確率は今日分明日分しかないし今日分の降水確率も過去のは存在しないのでこうせざるを得ない
        // 見つからなかったら既定値の null になる
        foreach ($forecast_data[0]['timeSeries'][1]['timeDefines'] as $timedefine_index => $timedefine) {

            // 比較対象（処理対象）の時刻
            $compare_datetime = new DateTimeImmutable($timedefine);

            foreach ($days_datetime as $day_index => $day_datetime) {

                // 00時～06時の降水確率
                if ($compare_datetime == $day_datetime->setTime(0,0)) {
                    $chanceofrain_index['T00_06'][$day_index] = $timedefine_index;
                    break;
                }

                // 06時～12時の降水確率
                if ($compare_datetime == $day_datetime->setTime(6,0)) {
                    $chanceofrain_index['T06_12'][$day_index] = $timedefine_index;
                    break;
                }

                // 12時～18時の降水確率
                if ($compare_datetime == $day_datetime->setTime(12,0)) {
                    $chanceofrain_index['T12_18'][$day_index] = $timedefine_index;
                    break;
                }

                // 18時～24時の降水確率
                if ($compare_datetime == $day_datetime->setTime(18,0)) {
                    $chanceofrain_index['T18_24'][$day_index] = $timedefine_index;
                    break;
                }
            }
        }

        // インデックスを手に入れたので、インデックスが null でなければアクセスしてデータを取りに行く
        foreach ($days_datetime as $day_index => $day_datetime) {

            // ネスト長過ぎる
            $pops = $forecast_data[0]['timeSeries'][1]['areas'][$city_index]['pops'];

            // データを入れる
            $chanceofrain[$day_index] = [
                'T00_06' => ($chanceofrain_index['T00_06'][$day_index] !== null ? $pops[$chanceofrain_index['T00_06'][$day_index]].'%' : '--%'),
                'T06_12' => ($chanceofrain_index['T06_12'][$day_index] !== null ? $pops[$chanceofrain_index['T06_12'][$day_index]].'%' : '--%'),
                'T12_18' => ($chanceofrain_index['T12_18'][$day_index] !== null ? $pops[$chanceofrain_index['T12_18'][$day_index]].'%' : '--%'),
                'T18_24' => ($chanceofrain_index['T18_24'][$day_index] !== null ? $pops[$chanceofrain_index['T18_24'][$day_index]].'%' : '--%'),
            ];
        }

        // 明後日の降水確率は常に取得できないはずなので、週間天気予報から持ってくる
        // 明日分も0時～5時は取得できないと思われる
        foreach ($chanceofrain as $chanceofrain_key => $chanceofrain_value) {

            // その日の降水確率がすべて存在しない
            if ($chanceofrain_value['T00_06'] === '--%' and
                $chanceofrain_value['T06_12'] === '--%' and
                $chanceofrain_value['T12_18'] === '--%' and
                $chanceofrain_value['T18_24'] === '--%') {

                // 週間天気予報の時刻
                $weekly_datetime = $days_datetime[$chanceofrain_key];
    
                // 週間天気予報から目当ての日付を見つけ、インデックスを手に入れる
                foreach ($forecast_data[1]['timeSeries'][0]['timeDefines'] as $key => $value) {
    
                    // 比較対象の時刻
                    $compare_datetime = new DateTimeImmutable($value);
    
                    // 同じ時刻ならインデックスを取得して抜ける
                    if ($compare_datetime->setTime(0,0) == $weekly_datetime->setTime(0,0)) {
                        $weekly_index = $key;
                        break;
                    }
                }
   
                // インデックスが定義されている場合だけ
                if (isset($weekly_index)) {

                    // 降水確率
                    // 週間天気予報だと時間ごとの詳細な降水確率は取得できないので、全て同じ値に設定する
                    $weekly_chanceofrain = $forecast_data[1]['timeSeries'][0]['areas'][$city_weekly_index]['pops'][$weekly_index];
                    
                    // 降水確率が空でなければ
                    // 最初の要素の降水確率は '' になるらしい
                    if ($weekly_chanceofrain !== '') {
        
                        // データを入れる
                        $chanceofrain[$chanceofrain_key] = [
                            'T00_06' => $weekly_chanceofrain.'%',
                            'T06_12' => $weekly_chanceofrain.'%',
                            'T12_18' => $weekly_chanceofrain.'%',
                            'T18_24' => $weekly_chanceofrain.'%',
                        ];
                    }
                }
            }
        }

        clock()->debug($chanceofrain);

        return $chanceofrain;
    }
}
