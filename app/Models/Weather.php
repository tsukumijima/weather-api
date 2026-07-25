<?php

namespace App\Models;

use DateTimeImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Models\WeatherDefinition;

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
        $url = config('app.url');


        /**** 各 ID 定義 ****/

        // 数値でない or 6桁ではない or 地点定義に存在しないID
        if (!is_numeric($id) or strlen($id) != 6 or !isset(WeatherDefinition::Areas['class10s'][$id])) {
            return ['error' => 'The specified city ID is invalid.'];
        }

        // 地域ID / 一時細分区域名
        $city_id = (string) $id;
        $district_name = WeatherDefinition::Areas['class10s'][$city_id]['name'];

        // 都道府県ID / 都道府県名
        $prefecture_id = (string) WeatherDefinition::Areas['class10s'][$id]['parent'];
        $prefecture_name = WeatherDefinition::Areas['offices'][$prefecture_id]['name'];

        // 地方名（九州、東北 など）
        $area_name = Weather::getAreaName($prefecture_id);

        // 1.十勝地方と奄美地方は測候所という気象台の下部施設が気象情報を発表しているため、
        //   十勝地方：014030・奄美地方：460040 のように一見普通の地域 ID のように見えるが、気象庁 HP 上は独立した都道府県/地方の扱いになっている
        //   一方 API では 014100・460100 のように同じ都道府県扱いのため、気象庁 HP へのリンクに使う ID だけ別個書き換える必要がある
        $prefecture_url_id = $prefecture_id;
        switch ($city_id) {
            case '014030':
                $prefecture_url_id = '014030';
                break;
            case '460040':
                $prefecture_url_id = '460040';
                break;
        }


        /**** API リクエスト ****/

        // 気象庁 HP の API
        $jma_api_forecast = "https://www.jma.go.jp/bosai/forecast/data/forecast/{$prefecture_id}.json";
        $jma_api_overview = "https://www.jma.go.jp/bosai/forecast/data/overview_forecast/{$prefecture_id}.json";

        // API から気象データを取得
        $retry_count = 5;
        while ($retry_count > 0) {
            try {
                $forecast_response = HTTP::withHeaders(['User-Agent' => 'weather-api/1.0'])
                                         ->withOptions(['verify' => false])
                                         ->get($jma_api_forecast);
                break;
            } catch (\Throwable $e) {
                $retry_count--;
                if ($retry_count === 0) throw $e;  // 3回失敗したら例外を投げる
                sleep(1);  // 1秒待機
            }
        }
        if ($forecast_response->status() === 200) {
            $forecast_data = $forecast_response->json();
        } else {
            return ['error' => "Request to JMA API failed (HTTP Error {$forecast_response->status()})"];
        }

        // API から気象概況を取得
        $retry_count = 5;
        while ($retry_count > 0) {
            try {
                $overview_response = HTTP::withHeaders(['User-Agent' => 'weather-api/1.0'])
                                         ->withOptions(['verify' => false])
                                         ->get($jma_api_overview);
                break;
            } catch (\Throwable $e) {
                $retry_count--;
                if ($retry_count === 0) throw $e;  // 3回失敗したら例外を投げる
                sleep(1);  // 1秒待機
            }
        }
        if ($overview_response->status() === 200){
            $overview = $overview_response->json();
        } else {
            return ['error' => "Request to JMA API failed (HTTP Error {$forecast_response->status()})"];
        }

        // 気象庁 API の一次細分区域は ID 順に並ぶとは限らないため、地域 ID から実際の配列位置を取得
        $city_index = null;
        foreach ($forecast_data[0]['timeSeries'][0]['areas'] as $area_key => $area) {
            // リクエストされた地域 ID と一致した位置を採用
            if ($area['area']['code'] === $city_id) {
                $city_index = $area_key;
                break;
            }
        }
        // 対応する一次細分区域がない場合は別地域のデータを返さずエラーにする
        if ($city_index === null) {
            return ['error' => "Weather area was not found in JMA API response: {$city_id}"];
        }

        // 気温観測地点の候補も気象庁 API の配列順から独立して地域 ID で取得
        $forecast_area_index = null;
        foreach (WeatherDefinition::ForecastArea[$prefecture_id] as $area_key => $forecast_area) {
            // リクエストされた地域 ID と一致した地点定義を採用
            if ($forecast_area['class10'] === $city_id) {
                $forecast_area_index = $area_key;
                break;
            }
        }
        // 対応する地点定義がない場合は先頭の地域へ暗黙に切り替えずエラーにする
        if ($forecast_area_index === null) {
            return ['error' => "Forecast area definition was not found: {$city_id}"];
        }

        // アメダスは鹿児島のように地域に複数存在する場合があり、また愛媛県の新居浜 (380020) のように
        // 0番目に存在するアメダス ID と実際に運用されているアメダス ID が異なる場合があるため、念のためこっちも回す
        $city_amedas_id = null;
        $city_amedas_index = null;
        foreach (WeatherDefinition::ForecastArea[$prefecture_id][$forecast_area_index]['amedas'] as $amedas_id) {
            // 地域のアメダスのインデックス
            // なんでもかんでも配列のインデックス探さないといけないの心底つらい
            foreach ($forecast_data[0]['timeSeries'][2]['areas'] as $area_key => $area) {
                // アメダス ID と一致したら、そのアメダス ID があるインデックスを取得して終了
                if ($area['area']['code'] === $amedas_id) {
                    $city_amedas_id = $amedas_id;
                    $city_amedas_index = $area_key;
                    break 2;  // 親ループも抜ける
                }
            }
        }
        // 対応する気温観測地点がない場合は都道府県内の別地点を返さずエラーにする
        if ($city_amedas_index === null) {
            return ['error' => "Temperature area was not found in JMA API response: {$city_id}"];
        }

        // 地域の週間天気予報用のインデックス
        // ほとんどは県あたりの観測地点は1箇所しかないが、小笠原諸島がある東京、奄美地方のある鹿児島などでは複数存在する
        // なんでもかんでも配列のインデックス探さないといけないの心底つらい
        $city_weekly_index = null;
        foreach ($forecast_data[1]['timeSeries'][1]['areas'] as $area_key => $area) {
            // アメダス ID と一致したら、そのアメダス ID があるインデックスを取得して終了
            if ($area['area']['code'] === $city_amedas_id) {
                $city_weekly_index = $area_key;
                break;
            }
        }
        // 取得できなかった場合（3日間天気でしか観測を行っていない地点）は 0 とし、その都道府県のメインの観測地点を利用する
        if ($city_weekly_index === null) {
            $city_weekly_index = 0;
        }

        // 地域名（気象観測所名）を取得
        // livedoor天気では気象観測所の名前が地域名として使われており、それに合わせるため気象データの方から取得している
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
            'publicTimeFormatted' => (new DateTimeImmutable($forecast_data[0]['reportDatetime']))->format('Y/m/d H:i:s'),
            'publishingOffice' => $forecast_data[0]['publishingOffice'],
            'title' => "{$prefecture_name} {$city_name} の天気",
            'link' => "https://www.jma.go.jp/bosai/forecast/#area_type=offices&area_code={$prefecture_url_id}",
            'description' => [
                'publicTime' => $overview['reportDatetime'],
                'publicTimeFormatted' => (new DateTimeImmutable($overview['reportDatetime']))->format('Y/m/d H:i:s'),
                // 天気概況の見出し
                'headlineText' => $overview['headlineText'],
                // 天気概況の本文
                'bodyText' => $overview['text'],
                // 見出しが空でなければ見出しと本文を改行で連結し、空であれば本文のみを返す
                'text' => ($overview['headlineText'] !== '' ? "{$overview['headlineText']}\n\n{$overview['text']}": $overview['text']),
            ],
            'forecasts' => [
                [
                    // 今日の天気
                    'date' => $forecast[0]['date'],
                    'dateLabel' => "今日",
                    'telop' => $forecast[0]['telop'],
                    'detail' => [
                        'weather' => $forecast[0]['detail']['weather'],
                        'wind' => $forecast[0]['detail']['wind'],
                        'wave' => $forecast[0]['detail']['wave'],
                    ],
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
                    // 明日の天気
                    'date' => $forecast[1]['date'],
                    'dateLabel' => "明日",
                    'telop' => $forecast[1]['telop'],
                    'detail' => [
                        'weather' => $forecast[1]['detail']['weather'],
                        'wind' => $forecast[1]['detail']['wind'],
                        'wave' => $forecast[1]['detail']['wave'],
                    ],
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
                    // 明後日の天気
                    'date' => $forecast[2]['date'],
                    'dateLabel' => "明後日",
                    'telop' => $forecast[2]['telop'],
                    'detail' => [
                        'weather' => $forecast[2]['detail']['weather'],
                        'wind' => $forecast[2]['detail']['wind'],
                        'wave' => $forecast[2]['detail']['wave'],
                    ],
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
                'area' => $area_name,
                'prefecture' => $prefecture_name,
                'district' => $district_name,
                'city' => $city_name,
            ],
            'copyright' => [
                'title' => "(C) 天気予報 API（livedoor 天気互換）",
                'link' => "{$url}/",
                'image' => [
                    'title' => "天気予報 API（livedoor 天気互換）",
                    'link' => "{$url}/",
                    'url' => "{$url}/logo.png",
                    'width' => 120,
                    'height' => 120,
                ],
                'provider' => [
                    [
                        'link' => "https://www.jma.go.jp/jma/",
                        'name' => "気象庁 Japan Meteorological Agency",
                        'note' => "気象庁 HP にて配信されている天気予報を JSON データへ編集しています。",
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

                // 同じ日付ならインデックスを取得して抜ける
                if ($compare_datetime->setTime(0,0) == $day_datetime->setTime(0,0)) {
                    $forecast_index[$day_index] = $timedefine_index;
                    break;
                }
            }
        }

        // インデックスを手に入れたので、インデックスが null でなければアクセスしてデータを取りに行く
        foreach ($days_datetime as $day_index => $day_datetime) {

            // 天気コード
            $weathercodes = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['weatherCodes'];
            $weathercode = ($forecast_index[$day_index] !== null ? $weathercodes[$forecast_index[$day_index]] : null);

            // 詳細な天気情報
            $weathers = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['weathers'];
            $weather = ($forecast_index[$day_index] !== null ? $weathers[$forecast_index[$day_index]] : null);

            // 風の強さ
            $winds = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['winds'];
            $wind = ($forecast_index[$day_index] !== null ? $winds[$forecast_index[$day_index]] : null);

            // 波の高さ
            // 海沿いの地域以外では存在しない
            if (isset($forecast_data[0]['timeSeries'][0]['areas'][$city_index]['waves'])) {
                $waves = $forecast_data[0]['timeSeries'][0]['areas'][$city_index]['waves'];
                $wave = ($forecast_index[$day_index] !== null ? $waves[$forecast_index[$day_index]] : null);
            } else {
                $wave = null;
            }

            // データを入れる
            $forecast[$day_index] = [
                'date' => $day_datetime->format('Y-m-d'),
                // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
                'telop' => ($weathercode !== null ? WeatherDefinition::Telops[$weathercode][3]: null),
                'detail' => [
                    'weather' => $weather,
                    'wind' => $wind,
                    'wave' => $wave,
                ],
                'image' => [
                    // テロップと共通
                    'title' => ($weathercode !== null ? WeatherDefinition::Telops[$weathercode][3]: null),
                    // 気象庁の SVG にリンク
                    'url' => ($weathercode !== null ? 'https://www.jma.go.jp/bosai/forecast/img/' . WeatherDefinition::Telops[$weathercode][0]: null),
                ]
            ];
        }

        // 明後日の天気が3日間予報から取得できない場合（多くの場合、0時～5時の間）は、週間天気予報からデータを持ってくる
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

                    // 同じ日付ならインデックスを取得して抜ける
                    if ($compare_datetime->setTime(0,0) == $weekly_datetime->setTime(0,0)) {
                        $weekly_index = $key;
                        break;
                    }
                }

                // インデックスが定義されている場合だけ
                if (isset($weekly_index)) {

                    // 天気コード
                    $weathercode = $forecast_data[1]['timeSeries'][0]['areas'][$city_weekly_index]['weatherCodes'][$weekly_index];

                    // データを入れる
                    $forecast[$day_index] = [
                        'date' => $days_datetime[$forecast_key]->format('Y-m-d'),
                        // WeatherDefinition::Telops から天気コードに当てはまるテロップや画像のファイル名を取得する
                        'telop' => WeatherDefinition::Telops[$weathercode][3],
                        'detail' => [  // 週間天気予報では以下の情報は取得できない
                            'weather' => null,
                            'wind' => null,
                            'wave' => null,
                        ],
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
                // 同じ日付ならインデックスを取得して抜ける
                if ($compare_datetime == $day_datetime->setTime(0,0)) {
                    $temperature_index_min[$day_index] = $timedefine_index;
                    break;
                }

                // 最高気温
                // 同じ日付ならインデックスを取得して抜ける
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

            // 現在のループのインデックスの気温のインデックスが null じゃなければ取得を実行（ややこしい）
            // 目的の情報が取り出しにくすぎる…
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
        // 明日分も0時～5時の間は取得できないと思われる
        foreach ($temperature as $temperature_key => $temperature_value) {

            // その日の最高気温・最低気温ともに存在しない
            if ($temperature_value['min']['celsius'] === null and $temperature_value['max']['celsius'] === null) {

                // 週間天気予報の時刻
                $weekly_datetime = $days_datetime[$temperature_key];

                // 週間天気予報から目当ての日付を見つけ、インデックスを手に入れる
                foreach ($forecast_data[1]['timeSeries'][1]['timeDefines'] as $key => $value) {

                    // 比較対象の時刻
                    $compare_datetime = new DateTimeImmutable($value);

                    // 同じ日付ならインデックスを取得して抜ける
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
        // 明日分も0時～5時の間は取得できないと思われる
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

                    // 同じ日付ならインデックスを取得して抜ける
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
