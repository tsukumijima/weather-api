<?php

namespace App;

use App\ConvertDate;
use Illuminate\Database\Eloquent\Model;
use Weidner\Goutte\GoutteFacade as GoutteFacade;

class Weather extends Model
{

    public static function getWeatherForecast($id)
    {

        // サイトの URL を取得
        $url = url('/');

        // 天気画像
        $weather_image = [
            '晴れ' => "{$url}/icon/1.gif",
            '晴時々曇' => "{$url}/icon/2.gif",
            '晴時々雨' => "{$url}/icon/3.gif",
            '晴時々雪' => "{$url}/icon/4.gif",
            '晴一時曇' => "{$url}/icon/2.gif",
            '晴一時雨' => "{$url}/icon/3.gif",
            '晴一時雪' => "{$url}/icon/4.gif",
            '晴のち時々曇' => "{$url}/icon/2.gif",
            '晴のち時々雨' => "{$url}/icon/3.gif",
            '晴のち時々雪' => "{$url}/icon/4.gif",
            '晴のち一時曇' => "{$url}/icon/2.gif",
            '晴のち一時雨' => "{$url}/icon/3.gif",
            '晴のち一時雪' => "{$url}/icon/4.gif",
            '晴のち曇' => "{$url}/icon/5.gif",
            '晴のち雨' => "{$url}/icon/6.gif",
            '晴のち雪' => "{$url}/icon/7.gif",
            '曇り' => "{$url}/icon/8.gif",
            '曇時々晴' => "{$url}/icon/9.gif",
            '曇時々雨' => "{$url}/icon/10.gif",
            '曇時々雪' => "{$url}/icon/11.gif",
            '曇一時晴' => "{$url}/icon/9.gif",
            '曇一時雨' => "{$url}/icon/10.gif",
            '曇一時雪' => "{$url}/icon/11.gif",
            '曇のち時々晴' => "{$url}/icon/9.gif",
            '曇のち時々雨' => "{$url}/icon/10.gif",
            '曇のち時々雪' => "{$url}/icon/11.gif",
            '曇のち一時晴' => "{$url}/icon/9.gif",
            '曇のち一時雨' => "{$url}/icon/10.gif",
            '曇のち一時雪' => "{$url}/icon/11.gif",
            '曇のち晴' => "{$url}/icon/12.gif",
            '曇のち雨' => "{$url}/icon/13.gif",
            '曇のち雪' => "{$url}/icon/14.gif",
            '雨' => "{$url}/icon/15.gif",
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
            '雪一時晴' => "{$url}/icon/24.gif",
            '雪一時曇' => "{$url}/icon/25.gif",
            '雪一時雨' => "{$url}/icon/26.gif",
            '雪のち時々晴' => "{$url}/icon/24.gif",
            '雪のち時々曇' => "{$url}/icon/25.gif",
            '雪のち時々雨' => "{$url}/icon/26.gif",
            '雪のち一時晴' => "{$url}/icon/24.gif",
            '雪のち一時曇' => "{$url}/icon/25.gif",
            '雪のち一時雨' => "{$url}/icon/26.gif",
            '雪のち晴' => "{$url}/icon/27.gif",
            '雪のち曇' => "{$url}/icon/28.gif",
            '雪のち雨' => "{$url}/icon/29.gif",
            '大雪' => "{$url}/icon/30.gif",
            '暴風雪' => "{$url}/icon/30.gif",
            'その他' => "{$url}/icon/31.gif"
        ];


        // 数値でない or 6桁ではない
        if (!is_numeric($id) or strlen($id) != 6) {
            return [
                'error' => 'The specified city ID is invalid.'
            ];
        }

        // ID
        $prefecture_id = substr($id, 0, 2);
        $region_id = substr($id, 2, 1);
        $city_id = substr($id, 4, 1);

        // 気象庁 HP の ID を算出
        if (intval($prefecture_id) === 1) {
            // 北海道用
            $jma_id = '3'.str_pad($region_id, 2, 0, STR_PAD_LEFT);

            // $region_id が 0 (存在しない)
            if (intval($region_id) === 0) {
                return [
                    'error' => 'The specified city ID does not exist.'
                ];
            }
        } else if (intval($prefecture_id) === 47) {
            // 沖縄用
            $jma_id = '3'.str_pad(52 + $region_id, 2, 0, STR_PAD_LEFT);

            // $region_id が 0 (存在しない)
            if (intval($region_id) === 0) {
                return [
                    'error' => 'The specified city ID does not exist.'
                ];
            }
        } else {
            // それ以外の都府県
            // 北海道分のインデックスを足す
            $jma_id = '3'.str_pad($prefecture_id + 6, 2, 0, STR_PAD_LEFT);

            // 北海道以外なのに $region_id が 0 以外
            if (intval($region_id) != 0) {
                return [
                    'error' => 'The specified city ID does not exist.'
                ];
            }
        }


        // アクセスする気象庁 HP の URL
        $jma_url = "https://www.jma.go.jp/jp/yoho/{$jma_id}.html";

        // Goutte
        $goutte = GoutteFacade::request('GET', $jma_url);

        // table から必要な element を抽出
        $weather_table = $goutte->filter('table#forecasttablefont > tr');
        $weather = [
            /*
                table の tr 要素は地域ごとに4つ使われるので、$city_id が 1 ならインデックスが 0～3 の tr 要素を、
                $city_id が 2 ならインデックスが 4～7 要素の tr を… といった具合で取得できるようにしている
            */
            $weather_table->eq(0 + (($city_id - 1) * 4)), // 表のヘッダー
            $weather_table->eq(1 + (($city_id - 1) * 4)), // 今日の天気 
            $weather_table->eq(2 + (($city_id - 1) * 4)), // 明日の天気
            $weather_table->eq(3 + (($city_id - 1) * 4)), // 明後日の天気
        ];

        // 要素があるか（なければ存在しない ID なのでエラーを出す）
        try {
            $weather[0]->text();
        } catch (\InvalidArgumentException $exception) {
            return [
                'error' => 'The specified city ID does not exist.'
            ];
        }


        // table のヘッダーから publicTime を抽出
        preg_match('/(\d+)日(\d+)時/', $goutte->filter('table#forecasttablefont > caption')->text(), $match1); // 正規表現で抽出

        $match[1] = '5';

        if (intval(date('d')) < intval($match1[1])) { // 先月の日付 (現在の曜日よりも抽出した曜日の方が大きい)
            $weather_publicTime = date('Y/m/d H:i:s', strtotime(date('Y/m/', strtotime('-1 month')).$match1[1].' '.$match1[2].':00:00')); // 先月に設定
        } else { // 今月の日付
            $weather_publicTime = date('Y/m/d H:i:s', strtotime(date('Y/m/')."{$match1[1]} {$match1[2]}:00:00")); // 今月に設定
        }

        // ISO8601 形式に変換
        $date = new \DateTime($weather_publicTime); // \ をつけないと DateTime クラスが検索できない
        $weather_publicTime_iso8601 = $date->format(\DateTime::ATOM);


        // 天気概要を抽出
        $weather_description_raw = mb_convert_kana($goutte->filter('pre.textframe')->html(), 'as');
        preg_match('/天気概況..(.*)([0-9][0-9])時([0-9][0-9])分.*発表.*\<b\>.(.*)\<\/b\>.....(.*)/s', $weather_description_raw, $match2); // 正規表現で抽出
        if (!empty($match2)) {
            $weather_description_title = str_replace(' ', '', str_replace("\r\n", '', $match2[4])); // 半角スペースを除去
            $weather_description = trim($weather_description_title."\n\n".str_replace(' ', '', $match2[5])); // 半角スペースを除去
        } else {
            preg_match('/天気概況..(.*)([0-9][0-9])時([0-9][0-9])分.*発表(.*)/s', $weather_description_raw, $match2); // 正規表現で抽出
            $weather_description = trim(str_replace(' ', '', $match2[4])); // 半角スペースを除去
        }

        // 天気概要から publicTime を取得
        $weather_description_publicTime = date('Y/m/d H:i:s', strtotime(ConvertDate::convertJtGDate($match2[1])." {$match2[2]}:{$match2[3]}:00"));

        // ISO8601 形式に変換
        $date = new \DateTime($weather_description_publicTime); // \ をつけないと DateTime クラスが検索できない
        $weather_description_publicTime_iso8601 = $date->format(\DateTime::ATOM);


        // 天気を取得
        $weather_telop = [];
        for ($i = 1; $i <= 3; $i++) { 
            if ($weather[$i]->filter('th.weather > img')->count() >= 1) {
                // 天気を html から取得する
                $weather_telop[$i - 1] = $weather[$i]->filter('th.weather > img')->attr('title');

                // 表現を livedoor 天気や Yahoo! 天気に合わせる
                if (mb_strlen($weather_telop[$i - 1]) > 2) {
                    $weather_telop[$i - 1] = str_replace('晴れ', '晴', $weather_telop[$i - 1]);
                    $weather_telop[$i - 1] = str_replace('曇り', '曇', $weather_telop[$i - 1]);
                    $weather_telop[$i - 1] = str_replace('止む', '曇', $weather_telop[$i - 1]);
                    $weather_telop[$i - 1] = str_replace('後時々', '後', $weather_telop[$i - 1]);
                    $weather_telop[$i - 1] = str_replace('後', 'のち', $weather_telop[$i - 1]);
                    $weather_telop[$i - 1] = str_replace('雨で暴風を伴う', '暴風雨', $weather_telop[$i - 1]);
                    $weather_telop[$i - 1] = str_replace('雪で暴風を伴う', '暴風雪', $weather_telop[$i - 1]);
                }
            } else {
                $weather_telop[$i - 1] = null;
            }
        }


        // 気温を取得
        $weather_temp = [];
        for ($i = 1; $i <= 3; $i++) { 
            if ($weather[$i]->filter('table.temp td.min')->count() >= 1 && !empty($weather[$i]->filter('table.temp td.min')->text())) {
                // 最低気温を html から取得する
                $weather_temp[$i - 1]['min']['celsius'] = str_replace('度', '', $weather[$i]->filter('table.temp td.min')->text());
                $weather_temp[$i - 1]['min']['fahrenheit'] = strval($weather_temp[$i - 1]['min']['celsius'] * 1.8 + 32); // 華氏に変換
            } else {
                $weather_temp[$i - 1]['min'] = null;
            }
            if ($weather[$i]->filter('table.temp td.max')->count() >= 1 && !empty($weather[$i]->filter('table.temp td.max')->text())) {
                // 最高気温を html から取得する
                $weather_temp[$i - 1]['max']['celsius'] = str_replace('度', '', $weather[$i]->filter('table.temp td.max')->text());
                $weather_temp[$i - 1]['max']['fahrenheit'] = strval($weather_temp[$i - 1]['max']['celsius'] * 1.8 + 32); // 華氏に変換
            } else {
                $weather_temp[$i - 1]['max'] = null;
            }
        }


        // 降水確率を取得
        $weather_chanceOfRain = [];
        for ($i = 1; $i <= 3; $i++) { 
            if ($i !== 3) { // 明後日は取得できないので除外
                // 降水確率 html から取得する
                $weather_chanceOfRain[$i - 1]['00-06'] = $weather[$i]->filter('td.rain table.rain > tr')->eq(0)->filter('td')->eq(1)->text();
                $weather_chanceOfRain[$i - 1]['06-12'] = $weather[$i]->filter('td.rain table.rain > tr')->eq(1)->filter('td')->eq(1)->text();
                $weather_chanceOfRain[$i - 1]['12-18'] = $weather[$i]->filter('td.rain table.rain > tr')->eq(2)->filter('td')->eq(1)->text();
                $weather_chanceOfRain[$i - 1]['18-24'] = $weather[$i]->filter('td.rain table.rain > tr')->eq(3)->filter('td')->eq(1)->text();
            } else {
                $weather_chanceOfRain[$i - 1]['00-06'] = '--%';
                $weather_chanceOfRain[$i - 1]['06-12'] = '--%';
                $weather_chanceOfRain[$i - 1]['12-18'] = '--%';
                $weather_chanceOfRain[$i - 1]['18-24'] = '--%';
            }
        }


        // 日付
        $weather_date = [];
        for ($i = 1; $i <= 3; $i++) {
            // 日付を html から取得して数字だけにする
            $weather_date_tmp = preg_replace('/[^0-9]/', '', $weather[$i]->filter('th.weather')->text());
            // 現在時刻 + (今日・明日・明後日) よりも後の曜日になっていたら先月と判定する
            if (intval(date('d')) + ($i - 1) < intval($weather_date_tmp)){ // 先月の日付
                $weather_date[$i - 1] = date('Y-m-', strtotime('-1 month')).str_pad($weather_date_tmp, 2, 0, STR_PAD_LEFT); // 先月に設定
            } else { // 今月の設定
                $weather_date[$i - 1] = date('Y-m-').str_pad($weather_date_tmp, 2, 0, STR_PAD_LEFT); // 今月に設定
            }
        }

        // 地域
        if ($weather[1]->filter('table.temp td.city')->count() >= 1) {
            $city = $weather[1]->filter('table.temp td.city')->text();
        } else if ($weather[2]->filter('table.temp td.city')->count() >= 1) {
            $city = $weather[2]->filter('table.temp td.city')->text();
        } else if ($weather[3]->filter('table.temp td.city')->count() >= 1) {
            $city = $weather[3]->filter('table.temp td.city')->text();
        } else {
            $city = '';
        }

        // 地方
        if (intval($prefecture_id) === 1) {
            $area = '北海道';
        } else if (intval($prefecture_id) >= 2 and intval($prefecture_id) <= 7) {
            $area = '東北';
        } else if (intval($prefecture_id) >= 8 and intval($prefecture_id) <= 14) {
            $area = '関東';
        } else if (intval($prefecture_id) >= 15 and intval($prefecture_id) <= 23) {
            $area = '中部';
        } else if (intval($prefecture_id) >= 24 and intval($prefecture_id) <= 30) {
            $area = '近畿';
        } else if ((intval($prefecture_id) >= 31 and intval($prefecture_id) <= 34) or intval($prefecture_id) === 39) {
            $area = '中国';
        } else if (intval($prefecture_id) >= 35 and intval($prefecture_id) <= 38) {
            $area = '四国';
        } else if (intval($prefecture_id) >= 40 and intval($prefecture_id) <= 46) {
            $area = '九州';
        } else if (intval($prefecture_id) === 47) {
            $area = '沖縄';
        } else {
            $area = '日本';
        }

        // 都道府県
        if (intval($prefecture_id) === 1) {
            $prefecture = '北海道';
        } else if (intval($prefecture_id) === 47) {
            $prefecture = '沖縄県';
        } else {
            preg_match('/天気予報.： (.*)/', $goutte->filter('td.titleText > h1')->text(), $match3); // 正規表現で抽出
            $prefecture = $match3[1];
        }


        // JSON の雛形
        $weather_json = [
            /*
            'debug' => [
                'date' => date('Y/m/d H:i:s'),
                'weather' => $weather_telop,
                'weather_temp' => $weather_temp,
                'prefecture_id' => $prefecture_id,
                'region_id' => $region_id,
                'city_id' => $city_id,
                'jma_id' => $jma_id,
            ],
            */
            'publicTime' => null,
            'publicTime_format' => null,
            'title' => null,
            'link' => "https://www.jma.go.jp/jma/",
            'description' => [
                'text' => null,
                'publicTime' => null,
                'publicTime_format' => null
            ],
            'forecasts' => [
                [
                    'date' => $weather_date[0],
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
                    'date' => $weather_date[1],
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
                    'date' => $weather_date[2],
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
                'city' => null,
                'area' => null,
                'prefecture' => null
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


        // 雛形に情報を追加していく
        $weather_json['publicTime'] = $weather_publicTime_iso8601;
        $weather_json['publicTime_format'] = $weather_publicTime;
        $weather_json['title'] = "{$prefecture} {$city} の天気";
        $weather_json['link'] = $jma_url;
        $weather_json['description']['text'] = $weather_description;
        $weather_json['description']['publicTime'] = $weather_description_publicTime_iso8601;
        $weather_json['description']['publicTime_format'] = $weather_description_publicTime;
        $weather_json['location']['city'] = $city;
        $weather_json['location']['area'] = $area;
        $weather_json['location']['prefecture'] = $prefecture;

        // 昨日の天気予報だったら明日のデータを今日に、明後日のデータを明日に設定
        if (strtotime(date('Y/m/d')) > strtotime($weather_publicTime)) {

            // 予報の日付を +1 する
            for ($i = 1; $i <= 3; $i++) {
                $date = new \DateTime($weather_date[$i - 1]);
                $date->modify('+1 days');
                $weather_json['forecasts'][$i - 1]['date'] = $date->format('Y-m-d');
            }
            
            $weather_json['forecasts'][0]['telop'] = $weather_telop[1];
            $weather_json['forecasts'][1]['telop'] = $weather_telop[2];
            $weather_json['forecasts'][2]['telop'] = null;
            
            $weather_json['forecasts'][0]['chanceOfRain'] = $weather_chanceOfRain[1];
            $weather_json['forecasts'][1]['chanceOfRain'] = $weather_chanceOfRain[2];
            // $weather_json['forecasts'][2]['chanceOfRain'] = null; // null だと不親切なので雛形の --% を使う

            $weather_json['forecasts'][0]['temperature'] = $weather_temp[1];
            $weather_json['forecasts'][1]['temperature'] = $weather_temp[2];
            $weather_json['forecasts'][2]['temperature']['min'] = null;
            $weather_json['forecasts'][2]['temperature']['max'] = null;

            $weather_json['forecasts'][0]['image']['title'] = $weather_telop[1];
            $weather_json['forecasts'][1]['image']['title'] = $weather_telop[2];
            $weather_json['forecasts'][2]['image']['title'] = null;
            if (isset($weather_image[$weather_telop[0]])) $weather_json['forecasts'][0]['image']['url'] = $weather_image[$weather_telop[1]];
            else if ($weather_telop[0] != null) $weather_json['forecasts'][0]['image']['url'] = $weather_image['その他'];
            if (isset($weather_image[$weather_telop[1]])) $weather_json['forecasts'][1]['image']['url'] = $weather_image[$weather_telop[2]];
            else if ($weather_telop[1] != null)  $weather_json['forecasts'][1]['image']['url'] = $weather_image['その他'];
            $weather_json['forecasts'][2]['image']['url'] = null;

        // 通常時
        } else {

            $weather_json['forecasts'][0]['telop'] = $weather_telop[0];
            $weather_json['forecasts'][1]['telop'] = $weather_telop[1];
            $weather_json['forecasts'][2]['telop'] = $weather_telop[2];
            
            $weather_json['forecasts'][0]['chanceOfRain'] = $weather_chanceOfRain[0];
            $weather_json['forecasts'][1]['chanceOfRain'] = $weather_chanceOfRain[1];
            $weather_json['forecasts'][2]['chanceOfRain'] = $weather_chanceOfRain[2];

            $weather_json['forecasts'][0]['temperature'] = $weather_temp[0];
            $weather_json['forecasts'][1]['temperature'] = $weather_temp[1];
            $weather_json['forecasts'][2]['temperature'] = $weather_temp[2];

            $weather_json['forecasts'][0]['image']['title'] = $weather_telop[0];
            $weather_json['forecasts'][1]['image']['title'] = $weather_telop[1];
            $weather_json['forecasts'][2]['image']['title'] = $weather_telop[2];
            if (isset($weather_image[$weather_telop[0]])) $weather_json['forecasts'][0]['image']['url'] = $weather_image[$weather_telop[0]];
            else if ($weather_telop[0] != null) $weather_json['forecasts'][0]['image']['url'] = $weather_image['その他'];
            if (isset($weather_image[$weather_telop[1]])) $weather_json['forecasts'][1]['image']['url'] = $weather_image[$weather_telop[1]];
            else if ($weather_telop[1] != null)  $weather_json['forecasts'][1]['image']['url'] = $weather_image['その他'];
            if (isset($weather_image[$weather_telop[2]])) $weather_json['forecasts'][2]['image']['url'] = $weather_image[$weather_telop[2]];
            else if ($weather_telop[2] != null)  $weather_json['forecasts'][2]['image']['url'] = $weather_image['その他'];

        }

        // json を返す
        return json_encode($weather_json, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
