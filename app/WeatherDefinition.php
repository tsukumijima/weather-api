<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeatherDefinition extends Model
{
    // http://www.jma.go.jp/bosai/common/const/area.json
    const AREA = [
        'centers' => [
            '010100' => [
                'name' => '北海道地方',
                'enName' => 'Hokkaido',
                'officeName' => '札幌管区気象台',
                'children' => [
                    '011000',
                    '012000',
                    '013000',
                    '014030',
                    '014100',
                    '015000',
                    '016000',
                    '017000'
                ]
            ],
            '010200' => [
                'name' => '東北地方',
                'enName' => 'Tohoku',
                'officeName' => '仙台管区気象台',
                'children' => [
                    '020000',
                    '030000',
                    '040000',
                    '050000',
                    '060000',
                    '070000'
                ]
            ],
            '010300' => [
                'name' => '関東甲信地方',
                'enName' => 'Kanto Koshin',
                'officeName' => '気象庁',
                'children' => [
                    '080000',
                    '090000',
                    '100000',
                    '110000',
                    '120000',
                    '130000',
                    '140000',
                    '190000',
                    '200000'
                ]
            ],
            '010400' => [
                'name' => '東海地方',
                'enName' => 'Tokai',
                'officeName' => '名古屋地方気象台',
                'children' => [
                    '210000',
                    '220000',
                    '230000',
                    '240000'
                ]
            ],
            '010500' => [
                'name' => '北陸地方',
                'enName' => 'Hokuriku',
                'officeName' => '新潟地方気象台',
                'children' => [
                    '150000',
                    '160000',
                    '170000',
                    '180000'
                ]
            ],
            '010600' => [
                'name' => '近畿地方',
                'enName' => 'Kinki',
                'officeName' => '大阪管区気象台',
                'children' => [
                    '250000',
                    '260000',
                    '270000',
                    '280000',
                    '290000',
                    '300000'
                ]
            ],
            '010700' => [
                'name' => '中国地方（山口県を除く）',
                'enName' => 'Chugoku (Excluding Yamaguchi]',
                'officeName' => '広島地方気象台',
                'children' => [
                    '310000',
                    '320000',
                    '330000',
                    '340000'
                ]
            ],
            '010800' => [
                'name' => '四国地方',
                'enName' => 'Shikoku',
                'officeName' => '高松地方気象台',
                'children' => [
                    '360000',
                    '370000',
                    '380000',
                    '390000'
                ]
            ],
            '010900' => [
                'name' => '九州北部地方（山口県を含む）',
                'enName' => 'Northern Kyushu (Including Yamaguchi]',
                'officeName' => '福岡管区気象台',
                'children' => [
                    '350000',
                    '400000',
                    '410000',
                    '420000',
                    '430000',
                    '440000'
                ]
            ],
            '011000' => [
                'name' => '九州南部地方',
                'enName' => 'Southern Kyushu',
                'officeName' => '鹿児島地方気象台',
                'children' => [
                    '450000',
                    '460040',
                    '460100'
                ]
            ],
            '011100' => [
                'name' => '沖縄地方',
                'enName' => 'Okinawa',
                'officeName' => '沖縄気象台',
                'children' => [
                    '471000',
                    '472000',
                    '473000',
                    '474000'
                ]
            ]
        ],
        'offices' => [
            '100000' => [
                'name' => '群馬県',
                'enName' => 'Gunma',
                'officeName' => '前橋地方気象台',
                'parent' => '010300',
                'children' => [
                    '100010',
                    '100020'
                ]
            ],
            '110000' => [
                'name' => '埼玉県',
                'enName' => 'Saitama',
                'officeName' => '熊谷地方気象台',
                'parent' => '010300',
                'children' => [
                    '110010',
                    '110020',
                    '110030'
                ]
            ],
            '120000' => [
                'name' => '千葉県',
                'enName' => 'Chiba',
                'officeName' => '銚子地方気象台',
                'parent' => '010300',
                'children' => [
                    '120010',
                    '120020',
                    '120030'
                ]
            ],
            '130000' => [
                'name' => '東京都',
                'enName' => 'Tokyo',
                'officeName' => '気象庁',
                'parent' => '010300',
                'children' => [
                    '130010',
                    '130020',
                    '130030',
                    '130040'
                ]
            ],
            '140000' => [
                'name' => '神奈川県',
                'enName' => 'Kanagawa',
                'officeName' => '横浜地方気象台',
                'parent' => '010300',
                'children' => [
                    '140010',
                    '140020'
                ]
            ],
            '150000' => [
                'name' => '新潟県',
                'enName' => 'Niigata',
                'officeName' => '新潟地方気象台',
                'parent' => '010500',
                'children' => [
                    '150010',
                    '150020',
                    '150030',
                    '150040'
                ]
            ],
            '160000' => [
                'name' => '富山県',
                'enName' => 'Toyama',
                'officeName' => '富山地方気象台',
                'parent' => '010500',
                'children' => [
                    '160010',
                    '160020'
                ]
            ],
            '170000' => [
                'name' => '石川県',
                'enName' => 'Ishikawa',
                'officeName' => '金沢地方気象台',
                'parent' => '010500',
                'children' => [
                    '170010',
                    '170020'
                ]
            ],
            '180000' => [
                'name' => '福井県',
                'enName' => 'Fukui',
                'officeName' => '福井地方気象台',
                'parent' => '010500',
                'children' => [
                    '180010',
                    '180020'
                ]
            ],
            '190000' => [
                'name' => '山梨県',
                'enName' => 'Yamanashi',
                'officeName' => '甲府地方気象台',
                'parent' => '010300',
                'children' => [
                    '190010',
                    '190020'
                ]
            ],
            '200000' => [
                'name' => '長野県',
                'enName' => 'Nagano',
                'officeName' => '長野地方気象台',
                'parent' => '010300',
                'children' => [
                    '200010',
                    '200020',
                    '200030'
                ]
            ],
            '210000' => [
                'name' => '岐阜県',
                'enName' => 'Gifu',
                'officeName' => '岐阜地方気象台',
                'parent' => '010400',
                'children' => [
                    '210010',
                    '210020'
                ]
            ],
            '220000' => [
                'name' => '静岡県',
                'enName' => 'Shizuoka',
                'officeName' => '静岡地方気象台',
                'parent' => '010400',
                'children' => [
                    '220010',
                    '220020',
                    '220030',
                    '220040'
                ]
            ],
            '230000' => [
                'name' => '愛知県',
                'enName' => 'Aichi',
                'officeName' => '名古屋地方気象台',
                'parent' => '010400',
                'children' => [
                    '230010',
                    '230020'
                ]
            ],
            '240000' => [
                'name' => '三重県',
                'enName' => 'Mie',
                'officeName' => '津地方気象台',
                'parent' => '010400',
                'children' => [
                    '240010',
                    '240020'
                ]
            ],
            '250000' => [
                'name' => '滋賀県',
                'enName' => 'Shiga',
                'officeName' => '彦根地方気象台',
                'parent' => '010600',
                'children' => [
                    '250010',
                    '250020'
                ]
            ],
            '260000' => [
                'name' => '京都府',
                'enName' => 'Kyoto',
                'officeName' => '京都地方気象台',
                'parent' => '010600',
                'children' => [
                    '260010',
                    '260020'
                ]
            ],
            '270000' => [
                'name' => '大阪府',
                'enName' => 'Osaka',
                'officeName' => '大阪管区気象台',
                'parent' => '010600',
                'children' => [
                    '270000'
                ]
            ],
            '280000' => [
                'name' => '兵庫県',
                'enName' => 'Hyogo',
                'officeName' => '神戸地方気象台',
                'parent' => '010600',
                'children' => [
                    '280010',
                    '280020'
                ]
            ],
            '290000' => [
                'name' => '奈良県',
                'enName' => 'Nara',
                'officeName' => '奈良地方気象台',
                'parent' => '010600',
                'children' => [
                    '290010',
                    '290020'
                ]
            ],
            '300000' => [
                'name' => '和歌山県',
                'enName' => 'Wakayama',
                'officeName' => '和歌山地方気象台',
                'parent' => '010600',
                'children' => [
                    '300010',
                    '300020'
                ]
            ],
            '310000' => [
                'name' => '鳥取県',
                'enName' => 'Tottori',
                'officeName' => '鳥取地方気象台',
                'parent' => '010700',
                'children' => [
                    '310010',
                    '310020'
                ]
            ],
            '320000' => [
                'name' => '島根県',
                'enName' => 'Shimane',
                'officeName' => '松江地方気象台',
                'parent' => '010700',
                'children' => [
                    '320010',
                    '320020',
                    '320030'
                ]
            ],
            '330000' => [
                'name' => '岡山県',
                'enName' => 'Okayama',
                'officeName' => '岡山地方気象台',
                'parent' => '010700',
                'children' => [
                    '330010',
                    '330020'
                ]
            ],
            '340000' => [
                'name' => '広島県',
                'enName' => 'Hiroshima',
                'officeName' => '広島地方気象台',
                'parent' => '010700',
                'children' => [
                    '340010',
                    '340020'
                ]
            ],
            '350000' => [
                'name' => '山口県',
                'enName' => 'Yamaguchi',
                'officeName' => '下関地方気象台',
                'parent' => '010900',
                'children' => [
                    '350010',
                    '350020',
                    '350030',
                    '350040'
                ]
            ],
            '360000' => [
                'name' => '徳島県',
                'enName' => 'Tokushima',
                'officeName' => '徳島地方気象台',
                'parent' => '010800',
                'children' => [
                    '360010',
                    '360020'
                ]
            ],
            '370000' => [
                'name' => '香川県',
                'enName' => 'Kagawa',
                'officeName' => '高松地方気象台',
                'parent' => '010800',
                'children' => [
                    '370000'
                ]
            ],
            '380000' => [
                'name' => '愛媛県',
                'enName' => 'Ehime',
                'officeName' => '松山地方気象台',
                'parent' => '010800',
                'children' => [
                    '380010',
                    '380020',
                    '380030'
                ]
            ],
            '390000' => [
                'name' => '高知県',
                'enName' => 'Kochi',
                'officeName' => '高知地方気象台',
                'parent' => '010800',
                'children' => [
                    '390010',
                    '390020',
                    '390030'
                ]
            ],
            '400000' => [
                'name' => '福岡県',
                'enName' => 'Fukuoka',
                'officeName' => '福岡管区気象台',
                'parent' => '010900',
                'children' => [
                    '400010',
                    '400020',
                    '400030',
                    '400040'
                ]
            ],
            '410000' => [
                'name' => '佐賀県',
                'enName' => 'Saga',
                'officeName' => '佐賀地方気象台',
                'parent' => '010900',
                'children' => [
                    '410010',
                    '410020'
                ]
            ],
            '420000' => [
                'name' => '長崎県',
                'enName' => 'Nagasaki',
                'officeName' => '長崎地方気象台',
                'parent' => '010900',
                'children' => [
                    '420010',
                    '420020',
                    '420030',
                    '420040'
                ]
            ],
            '430000' => [
                'name' => '熊本県',
                'enName' => 'Kumamoto',
                'officeName' => '熊本地方気象台',
                'parent' => '010900',
                'children' => [
                    '430010',
                    '430020',
                    '430030',
                    '430040'
                ]
            ],
            '440000' => [
                'name' => '大分県',
                'enName' => 'Oita',
                'officeName' => '大分地方気象台',
                'parent' => '010900',
                'children' => [
                    '440010',
                    '440020',
                    '440030',
                    '440040'
                ]
            ],
            '450000' => [
                'name' => '宮崎県',
                'enName' => 'Miyazaki',
                'officeName' => '宮崎地方気象台',
                'parent' => '011000',
                'children' => [
                    '450010',
                    '450020',
                    '450030',
                    '450040'
                ]
            ],
            '460040' => [
                'name' => '奄美地方',
                'enName' => 'Amami',
                'officeName' => '名瀬測候所',
                'parent' => '011000',
                'children' => [
                    '460040'
                ]
            ],
            '460100' => [
                'name' => '鹿児島県（奄美地方除く）',
                'enName' => 'Kagoshima (Excluding Amami]',
                'officeName' => '鹿児島地方気象台',
                'parent' => '011000',
                'children' => [
                    '460010',
                    '460020',
                    '460030'
                ]
            ],
            '471000' => [
                'name' => '沖縄本島地方',
                'enName' => 'Okinawa Main Island',
                'officeName' => '沖縄気象台',
                'parent' => '011100',
                'children' => [
                    '471010',
                    '471020',
                    '471030'
                ]
            ],
            '472000' => [
                'name' => '大東島地方',
                'enName' => 'Daitojima',
                'officeName' => '南大東島地方気象台',
                'parent' => '011100',
                'children' => [
                    '472000'
                ]
            ],
            '473000' => [
                'name' => '宮古島地方',
                'enName' => 'Miyakojima',
                'officeName' => '宮古島地方気象台',
                'parent' => '011100',
                'children' => [
                    '473000'
                ]
            ],
            '474000' => [
                'name' => '八重山地方',
                'enName' => 'Yaeyama',
                'officeName' => '石垣島地方気象台',
                'parent' => '011100',
                'children' => [
                    '474010',
                    '474020'
                ]
            ],
            '011000' => [
                'name' => '宗谷地方',
                'enName' => 'Soya',
                'officeName' => '稚内地方気象台',
                'parent' => '010100',
                'children' => [
                    '011000'
                ]
            ],
            '012000' => [
                'name' => '上川・留萌地方',
                'enName' => 'Kamikawa Rumoi',
                'officeName' => '旭川地方気象台',
                'parent' => '010100',
                'children' => [
                    '012010',
                    '012020'
                ]
            ],
            '013000' => [
                'name' => '網走・北見・紋別地方',
                'enName' => 'Abashiri Kitami Mombetsu',
                'officeName' => '網走地方気象台',
                'parent' => '010100',
                'children' => [
                    '013010',
                    '013020',
                    '013030'
                ]
            ],
            '014030' => [
                'name' => '十勝地方',
                'enName' => 'Tokachi',
                'officeName' => '帯広測候所',
                'parent' => '010100',
                'children' => [
                    '014030'
                ]
            ],
            '014100' => [
                'name' => '釧路・根室地方',
                'enName' => 'Kushiro Nemuro',
                'officeName' => '釧路地方気象台',
                'parent' => '010100',
                'children' => [
                    '014010',
                    '014020'
                ]
            ],
            '015000' => [
                'name' => '胆振・日高地方',
                'enName' => 'Iburi Hidaka',
                'officeName' => '室蘭地方気象台',
                'parent' => '010100',
                'children' => [
                    '015010',
                    '015020'
                ]
            ],
            '016000' => [
                'name' => '石狩・空知・後志地方',
                'enName' => 'Ishikari Sorachi Shiribeshi',
                'officeName' => '札幌管区気象台',
                'parent' => '010100',
                'children' => [
                    '016010',
                    '016020',
                    '016030'
                ]
            ],
            '017000' => [
                'name' => '渡島・檜山地方',
                'enName' => 'Oshima Hiyama',
                'officeName' => '函館地方気象台',
                'parent' => '010100',
                'children' => [
                    '017010',
                    '017020'
                ]
            ],
            '020000' => [
                'name' => '青森県',
                'enName' => 'Aomori',
                'officeName' => '青森地方気象台',
                'parent' => '010200',
                'children' => [
                    '020010',
                    '020020',
                    '020030'
                ]
            ],
            '030000' => [
                'name' => '岩手県',
                'enName' => 'Iwate',
                'officeName' => '盛岡地方気象台',
                'parent' => '010200',
                'children' => [
                    '030010',
                    '030020',
                    '030030'
                ]
            ],
            '040000' => [
                'name' => '宮城県',
                'enName' => 'Miyagi',
                'officeName' => '仙台管区気象台',
                'parent' => '010200',
                'children' => [
                    '040010',
                    '040020'
                ]
            ],
            '050000' => [
                'name' => '秋田県',
                'enName' => 'Akita',
                'officeName' => '秋田地方気象台',
                'parent' => '010200',
                'children' => [
                    '050010',
                    '050020'
                ]
            ],
            '060000' => [
                'name' => '山形県',
                'enName' => 'Yamagata',
                'officeName' => '山形地方気象台',
                'parent' => '010200',
                'children' => [
                    '060010',
                    '060020',
                    '060030',
                    '060040'
                ]
            ],
            '070000' => [
                'name' => '福島県',
                'enName' => 'Fukushima',
                'officeName' => '福島地方気象台',
                'parent' => '010200',
                'children' => [
                    '070010',
                    '070020',
                    '070030'
                ]
            ],
            '080000' => [
                'name' => '茨城県',
                'enName' => 'Ibaraki',
                'officeName' => '水戸地方気象台',
                'parent' => '010300',
                'children' => [
                    '080010',
                    '080020'
                ]
            ],
            '090000' => [
                'name' => '栃木県',
                'enName' => 'Tochigi',
                'officeName' => '宇都宮地方気象台',
                'parent' => '010300',
                'children' => [
                    '090010',
                    '090020'
                ]
            ]
        ],
        'class10s' => [
            '100010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '100000',
                'children' => [
                    '100011',
                    '100012',
                    '100013'
                ]
            ],
            '100020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '100000',
                'children' => [
                    '100021',
                    '100022'
                ]
            ],
            '110010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '110000',
                'children' => [
                    '110011',
                    '110012',
                    '110013'
                ]
            ],
            '110020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '110000',
                'children' => [
                    '110021',
                    '110022'
                ]
            ],
            '110030' => [
                'name' => '秩父地方',
                'enName' => 'Chichibu Region',
                'parent' => '110000',
                'children' => [
                    '110030'
                ]
            ],
            '120010' => [
                'name' => '北西部',
                'enName' => 'North-western Region',
                'parent' => '120000',
                'children' => [
                    '120011',
                    '120012',
                    '120013'
                ]
            ],
            '120020' => [
                'name' => '北東部',
                'enName' => 'North-eastern Region',
                'parent' => '120000',
                'children' => [
                    '120021',
                    '120022'
                ]
            ],
            '120030' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '120000',
                'children' => [
                    '120031',
                    '120032'
                ]
            ],
            '130010' => [
                'name' => '東京地方',
                'enName' => 'Tokyo Region',
                'parent' => '130000',
                'children' => [
                    '130011',
                    '130012',
                    '130013',
                    '130014',
                    '130015'
                ]
            ],
            '130020' => [
                'name' => '伊豆諸島北部',
                'enName' => 'Northern Izu Islands',
                'parent' => '130000',
                'children' => [
                    '130021',
                    '130022'
                ]
            ],
            '130030' => [
                'name' => '伊豆諸島南部',
                'enName' => 'Southern Izu Islands',
                'parent' => '130000',
                'children' => [
                    '130031',
                    '130032'
                ]
            ],
            '130040' => [
                'name' => '小笠原諸島',
                'enName' => 'Ogasawara Islands',
                'parent' => '130000',
                'children' => [
                    '130040'
                ]
            ],
            '140010' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '140000',
                'children' => [
                    '140011',
                    '140012',
                    '140013'
                ]
            ],
            '140020' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '140000',
                'children' => [
                    '140021',
                    '140022',
                    '140023',
                    '140024'
                ]
            ],
            '150010' => [
                'name' => '下越',
                'enName' => 'Kaetsu',
                'parent' => '150000',
                'children' => [
                    '150011',
                    '150012',
                    '150013',
                    '150014'
                ]
            ],
            '150020' => [
                'name' => '中越',
                'enName' => 'Chuetsu',
                'parent' => '150000',
                'children' => [
                    '150021',
                    '150022',
                    '150023',
                    '150024',
                    '150025',
                    '150026'
                ]
            ],
            '150030' => [
                'name' => '上越',
                'enName' => 'Joetsu',
                'parent' => '150000',
                'children' => [
                    '150031',
                    '150032',
                    '150033'
                ]
            ],
            '150040' => [
                'name' => '佐渡',
                'enName' => 'Sado',
                'parent' => '150000',
                'children' => [
                    '150040'
                ]
            ],
            '160010' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '160000',
                'children' => [
                    '160011',
                    '160012'
                ]
            ],
            '160020' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '160000',
                'children' => [
                    '160021',
                    '160022'
                ]
            ],
            '170010' => [
                'name' => '加賀',
                'enName' => 'Kaga',
                'parent' => '170000',
                'children' => [
                    '170011',
                    '170012'
                ]
            ],
            '170020' => [
                'name' => '能登',
                'enName' => 'Noto',
                'parent' => '170000',
                'children' => [
                    '170021',
                    '170022'
                ]
            ],
            '180010' => [
                'name' => '嶺北',
                'enName' => 'Reihoku',
                'parent' => '180000',
                'children' => [
                    '180011',
                    '180012',
                    '180013'
                ]
            ],
            '180020' => [
                'name' => '嶺南',
                'enName' => 'Reinan',
                'parent' => '180000',
                'children' => [
                    '180021',
                    '180022'
                ]
            ],
            '190010' => [
                'name' => '中・西部',
                'enName' => 'Central Western Region',
                'parent' => '190000',
                'children' => [
                    '190011',
                    '190012',
                    '190013'
                ]
            ],
            '190020' => [
                'name' => '東部・富士五湖',
                'enName' => 'Eastern Region and Fuji Five Lakes',
                'parent' => '190000',
                'children' => [
                    '190021',
                    '190022'
                ]
            ],
            '200010' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '200000',
                'children' => [
                    '200011',
                    '200012',
                    '200013'
                ]
            ],
            '200020' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '200000',
                'children' => [
                    '200021',
                    '200022',
                    '200023',
                    '200024',
                    '200025'
                ]
            ],
            '200030' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '200000',
                'children' => [
                    '200031',
                    '200032',
                    '200033'
                ]
            ],
            '210010' => [
                'name' => '美濃地方',
                'enName' => 'Mino Region',
                'parent' => '210000',
                'children' => [
                    '210011',
                    '210012',
                    '210013'
                ]
            ],
            '210020' => [
                'name' => '飛騨地方',
                'enName' => 'Hida Region',
                'parent' => '210000',
                'children' => [
                    '210021',
                    '210022'
                ]
            ],
            '220010' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '220000',
                'children' => [
                    '220011',
                    '220012'
                ]
            ],
            '220020' => [
                'name' => '伊豆',
                'enName' => 'Izu',
                'parent' => '220000',
                'children' => [
                    '220021',
                    '220022'
                ]
            ],
            '220030' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '220000',
                'children' => [
                    '220031',
                    '220032'
                ]
            ],
            '220040' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '220000',
                'children' => [
                    '220041',
                    '220042'
                ]
            ],
            '230010' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '230000',
                'children' => [
                    '230011',
                    '230012',
                    '230013',
                    '230014',
                    '230015'
                ]
            ],
            '230020' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '230000',
                'children' => [
                    '230021',
                    '230022',
                    '230023'
                ]
            ],
            '240010' => [
                'name' => '北中部',
                'enName' => 'Northern Central Region',
                'parent' => '240000',
                'children' => [
                    '240011',
                    '240012',
                    '240013'
                ]
            ],
            '240020' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '240000',
                'children' => [
                    '240021',
                    '240022'
                ]
            ],
            '250010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '250000',
                'children' => [
                    '250011',
                    '250012',
                    '250013'
                ]
            ],
            '250020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '250000',
                'children' => [
                    '250021',
                    '250022',
                    '250023'
                ]
            ],
            '260010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '260000',
                'children' => [
                    '260011',
                    '260012',
                    '260013',
                    '260014'
                ]
            ],
            '260020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '260000',
                'children' => [
                    '260021',
                    '260022',
                    '260023'
                ]
            ],
            '270000' => [
                'name' => '大阪府',
                'enName' => 'Osaka Prefecture',
                'parent' => '270000',
                'children' => [
                    '270001',
                    '270002',
                    '270003',
                    '270004',
                    '270005'
                ]
            ],
            '280010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '280000',
                'children' => [
                    '280011',
                    '280012',
                    '280013',
                    '280014',
                    '280015',
                    '280016'
                ]
            ],
            '280020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '280000',
                'children' => [
                    '280021',
                    '280022'
                ]
            ],
            '290010' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '290000',
                'children' => [
                    '290011',
                    '290012',
                    '290013'
                ]
            ],
            '290020' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '290000',
                'children' => [
                    '290021',
                    '290022'
                ]
            ],
            '300010' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '300000',
                'children' => [
                    '300011',
                    '300012'
                ]
            ],
            '300020' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '300000',
                'children' => [
                    '300021',
                    '300022'
                ]
            ],
            '310010' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '310000',
                'children' => [
                    '310011',
                    '310012'
                ]
            ],
            '310020' => [
                'name' => '中・西部',
                'enName' => 'Central Western Region',
                'parent' => '310000',
                'children' => [
                    '310021',
                    '310022',
                    '310023'
                ]
            ],
            '320010' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '320000',
                'children' => [
                    '320011',
                    '320012',
                    '320013'
                ]
            ],
            '320020' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '320000',
                'children' => [
                    '320021',
                    '320022',
                    '320023'
                ]
            ],
            '320030' => [
                'name' => '隠岐',
                'enName' => 'Oki',
                'parent' => '320000',
                'children' => [
                    '320030'
                ]
            ],
            '330010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '330000',
                'children' => [
                    '330011',
                    '330012',
                    '330013',
                    '330014',
                    '330015'
                ]
            ],
            '330020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '330000',
                'children' => [
                    '330021',
                    '330022',
                    '330023',
                    '330024'
                ]
            ],
            '340010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '340000',
                'children' => [
                    '340011',
                    '340012',
                    '340013'
                ]
            ],
            '340020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '340000',
                'children' => [
                    '340021',
                    '340022'
                ]
            ],
            '350010' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '350000',
                'children' => [
                    '350011',
                    '350012'
                ]
            ],
            '350020' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '350000',
                'children' => [
                    '350021',
                    '350022'
                ]
            ],
            '350030' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '350000',
                'children' => [
                    '350031',
                    '350032'
                ]
            ],
            '350040' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '350000',
                'children' => [
                    '350041',
                    '350042'
                ]
            ],
            '360010' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '360000',
                'children' => [
                    '360011',
                    '360012',
                    '360013',
                    '360014'
                ]
            ],
            '360020' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '360000',
                'children' => [
                    '360021',
                    '360022',
                    '360023'
                ]
            ],
            '370000' => [
                'name' => '香川県',
                'enName' => 'Kagawa Prefecture',
                'parent' => '370000',
                'children' => [
                    '370001',
                    '370002',
                    '370003',
                    '370004',
                    '370005'
                ]
            ],
            '380010' => [
                'name' => '中予',
                'enName' => 'Chuyo',
                'parent' => '380000',
                'children' => [
                    '380010'
                ]
            ],
            '380020' => [
                'name' => '東予',
                'enName' => 'Toyo',
                'parent' => '380000',
                'children' => [
                    '380021',
                    '380022'
                ]
            ],
            '380030' => [
                'name' => '南予',
                'enName' => 'Nan-yo',
                'parent' => '380000',
                'children' => [
                    '380031',
                    '380032'
                ]
            ],
            '390010' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '390000',
                'children' => [
                    '390011',
                    '390012',
                    '390013'
                ]
            ],
            '390020' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '390000',
                'children' => [
                    '390021',
                    '390022'
                ]
            ],
            '390030' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '390000',
                'children' => [
                    '390031',
                    '390032'
                ]
            ],
            '400010' => [
                'name' => '福岡地方',
                'enName' => 'Fukuoka Region',
                'parent' => '400000',
                'children' => [
                    '400010'
                ]
            ],
            '400020' => [
                'name' => '北九州地方',
                'enName' => 'Kitakyushu Region',
                'parent' => '400000',
                'children' => [
                    '400021',
                    '400022'
                ]
            ],
            '400030' => [
                'name' => '筑豊地方',
                'enName' => 'Chikuho Region',
                'parent' => '400000',
                'children' => [
                    '400030'
                ]
            ],
            '400040' => [
                'name' => '筑後地方',
                'enName' => 'Chikugo Region',
                'parent' => '400000',
                'children' => [
                    '400041',
                    '400042'
                ]
            ],
            '410010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '410000',
                'children' => [
                    '410011',
                    '410012',
                    '410013',
                    '410014'
                ]
            ],
            '410020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '410000',
                'children' => [
                    '410021',
                    '410022'
                ]
            ],
            '420010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '420000',
                'children' => [
                    '420011',
                    '420012',
                    '420013',
                    '420014'
                ]
            ],
            '420020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '420000',
                'children' => [
                    '420021',
                    '420022'
                ]
            ],
            '420030' => [
                'name' => '壱岐・対馬',
                'enName' => 'Iki Tsushima',
                'parent' => '420000',
                'children' => [
                    '420031',
                    '420032',
                    '420033'
                ]
            ],
            '420040' => [
                'name' => '五島',
                'enName' => 'Goto',
                'parent' => '420000',
                'children' => [
                    '420041',
                    '420042'
                ]
            ],
            '430010' => [
                'name' => '熊本地方',
                'enName' => 'Kumamoto Region',
                'parent' => '430000',
                'children' => [
                    '430011',
                    '430012',
                    '430013',
                    '430014',
                    '430015'
                ]
            ],
            '430020' => [
                'name' => '阿蘇地方',
                'enName' => 'Aso Region',
                'parent' => '430000',
                'children' => [
                    '430020'
                ]
            ],
            '430030' => [
                'name' => '天草・芦北地方',
                'enName' => 'Amakusa Ashikita Region',
                'parent' => '430000',
                'children' => [
                    '430031',
                    '430032'
                ]
            ],
            '430040' => [
                'name' => '球磨地方',
                'enName' => 'Kuma Region',
                'parent' => '430000',
                'children' => [
                    '430040'
                ]
            ],
            '440010' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '440000',
                'children' => [
                    '440010'
                ]
            ],
            '440020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '440000',
                'children' => [
                    '440020'
                ]
            ],
            '440030' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '440000',
                'children' => [
                    '440031',
                    '440032'
                ]
            ],
            '440040' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '440000',
                'children' => [
                    '440041',
                    '440042'
                ]
            ],
            '450010' => [
                'name' => '南部平野部',
                'enName' => 'Plain Area of Southern Region',
                'parent' => '450000',
                'children' => [
                    '450011',
                    '450012'
                ]
            ],
            '450020' => [
                'name' => '北部平野部',
                'enName' => 'Plain Area of Northern Region',
                'parent' => '450000',
                'children' => [
                    '450021',
                    '450022'
                ]
            ],
            '450030' => [
                'name' => '南部山沿い',
                'enName' => 'Area along mountains of Southern Region',
                'parent' => '450000',
                'children' => [
                    '450031',
                    '450032'
                ]
            ],
            '450040' => [
                'name' => '北部山沿い',
                'enName' => 'Area along mountains of Northern Region',
                'parent' => '450000',
                'children' => [
                    '450041',
                    '450042'
                ]
            ],
            '460010' => [
                'name' => '薩摩地方',
                'enName' => 'Satsuma Region',
                'parent' => '460100',
                'children' => [
                    '460011',
                    '460012',
                    '460013',
                    '460014',
                    '460015'
                ]
            ],
            '460020' => [
                'name' => '大隅地方',
                'enName' => 'Osumi Region',
                'parent' => '460100',
                'children' => [
                    '460021',
                    '460022'
                ]
            ],
            '460030' => [
                'name' => '種子島・屋久島地方',
                'enName' => 'Tanegashima Yakushima Region',
                'parent' => '460100',
                'children' => [
                    '460031',
                    '460032'
                ]
            ],
            '460040' => [
                'name' => '奄美地方',
                'enName' => 'Amami Region',
                'parent' => '460040',
                'children' => [
                    '460041',
                    '460042',
                    '460043'
                ]
            ],
            '471010' => [
                'name' => '本島中南部',
                'enName' => 'Central and Southern Main Island',
                'parent' => '471000',
                'children' => [
                    '471011',
                    '471012',
                    '471013'
                ]
            ],
            '471020' => [
                'name' => '本島北部',
                'enName' => 'Northern Main Island',
                'parent' => '471000',
                'children' => [
                    '471021',
                    '471022',
                    '471023',
                    '471024'
                ]
            ],
            '471030' => [
                'name' => '久米島',
                'enName' => 'Kumejima',
                'parent' => '471000',
                'children' => [
                    '471030'
                ]
            ],
            '472000' => [
                'name' => '大東島地方',
                'enName' => 'Daitojima Region',
                'parent' => '472000',
                'children' => [
                    '472000'
                ]
            ],
            '473000' => [
                'name' => '宮古島地方',
                'enName' => 'Miyakojima Region',
                'parent' => '473000',
                'children' => [
                    '473001',
                    '473002'
                ]
            ],
            '474010' => [
                'name' => '石垣島地方',
                'enName' => 'Ishigakijima Region',
                'parent' => '474000',
                'children' => [
                    '474011',
                    '474012'
                ]
            ],
            '474020' => [
                'name' => '与那国島地方',
                'enName' => 'Yonagunijima Region',
                'parent' => '474000',
                'children' => [
                    '474020'
                ]
            ],
            '011000' => [
                'name' => '宗谷地方',
                'enName' => 'Soya Region',
                'parent' => '011000',
                'children' => [
                    '011011',
                    '011012',
                    '011013'
                ]
            ],
            '012010' => [
                'name' => '上川地方',
                'enName' => 'Kamikawa Region',
                'parent' => '012000',
                'children' => [
                    '012011',
                    '012012',
                    '012013'
                ]
            ],
            '012020' => [
                'name' => '留萌地方',
                'enName' => 'Rumoi Region',
                'parent' => '012000',
                'children' => [
                    '012021',
                    '012022',
                    '012023'
                ]
            ],
            '013010' => [
                'name' => '網走地方',
                'enName' => 'Abashiri Region',
                'parent' => '013000',
                'children' => [
                    '013011',
                    '013012',
                    '013013'
                ]
            ],
            '013020' => [
                'name' => '北見地方',
                'enName' => 'Kitami Region',
                'parent' => '013000',
                'children' => [
                    '013020'
                ]
            ],
            '013030' => [
                'name' => '紋別地方',
                'enName' => 'Mombetsu Region',
                'parent' => '013000',
                'children' => [
                    '013031',
                    '013032'
                ]
            ],
            '014010' => [
                'name' => '根室地方',
                'enName' => 'Nemuro Region',
                'parent' => '014100',
                'children' => [
                    '014011',
                    '014012',
                    '014013'
                ]
            ],
            '014020' => [
                'name' => '釧路地方',
                'enName' => 'Kushiro Region',
                'parent' => '014100',
                'children' => [
                    '014021',
                    '014022',
                    '014023',
                    '014024'
                ]
            ],
            '014030' => [
                'name' => '十勝地方',
                'enName' => 'Tokachi Region',
                'parent' => '014030',
                'children' => [
                    '014031',
                    '014032',
                    '014033'
                ]
            ],
            '015010' => [
                'name' => '胆振地方',
                'enName' => 'Iburi Region',
                'parent' => '015000',
                'children' => [
                    '015011',
                    '015012',
                    '015013'
                ]
            ],
            '015020' => [
                'name' => '日高地方',
                'enName' => 'Hidaka Region',
                'parent' => '015000',
                'children' => [
                    '015021',
                    '015022',
                    '015023'
                ]
            ],
            '016010' => [
                'name' => '石狩地方',
                'enName' => 'Ishikari Region',
                'parent' => '016000',
                'children' => [
                    '016011',
                    '016012',
                    '016013'
                ]
            ],
            '016020' => [
                'name' => '空知地方',
                'enName' => 'Sorachi Region',
                'parent' => '016000',
                'children' => [
                    '016021',
                    '016022',
                    '016023'
                ]
            ],
            '016030' => [
                'name' => '後志地方',
                'enName' => 'Shiribeshi Region',
                'parent' => '016000',
                'children' => [
                    '016031',
                    '016032',
                    '016033'
                ]
            ],
            '017010' => [
                'name' => '渡島地方',
                'enName' => 'Oshima Region',
                'parent' => '017000',
                'children' => [
                    '017011',
                    '017012',
                    '017013'
                ]
            ],
            '017020' => [
                'name' => '檜山地方',
                'enName' => 'Hiyama Region',
                'parent' => '017000',
                'children' => [
                    '017021',
                    '017022',
                    '017023'
                ]
            ],
            '020010' => [
                'name' => '津軽',
                'enName' => 'Tsugaru',
                'parent' => '020000',
                'children' => [
                    '020011',
                    '020012',
                    '020013',
                    '020014'
                ]
            ],
            '020020' => [
                'name' => '下北',
                'enName' => 'Shimokita',
                'parent' => '020000',
                'children' => [
                    '020020'
                ]
            ],
            '020030' => [
                'name' => '三八上北',
                'enName' => 'Sanpachi Kamikita',
                'parent' => '020000',
                'children' => [
                    '020031',
                    '020032'
                ]
            ],
            '030010' => [
                'name' => '内陸',
                'enName' => 'Inland',
                'parent' => '030000',
                'children' => [
                    '030011',
                    '030012',
                    '030013',
                    '030014',
                    '030015',
                    '030016'
                ]
            ],
            '030020' => [
                'name' => '沿岸北部',
                'enName' => 'Northern Coast',
                'parent' => '030000',
                'children' => [
                    '030021',
                    '030022'
                ]
            ],
            '030030' => [
                'name' => '沿岸南部',
                'enName' => 'Southern Coast',
                'parent' => '030000',
                'children' => [
                    '030031',
                    '030032'
                ]
            ],
            '040010' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '040000',
                'children' => [
                    '040011',
                    '040012',
                    '040013',
                    '040014',
                    '040015',
                    '040016'
                ]
            ],
            '040020' => [
                'name' => '西部',
                'enName' => 'Western Region',
                'parent' => '040000',
                'children' => [
                    '040021',
                    '040022',
                    '040023',
                    '040024'
                ]
            ],
            '050010' => [
                'name' => '沿岸',
                'enName' => 'Coast',
                'parent' => '050000',
                'children' => [
                    '050011',
                    '050012',
                    '050013'
                ]
            ],
            '050020' => [
                'name' => '内陸',
                'enName' => 'Inland',
                'parent' => '050000',
                'children' => [
                    '050021',
                    '050022',
                    '050023'
                ]
            ],
            '060010' => [
                'name' => '村山',
                'enName' => 'Murayama',
                'parent' => '060000',
                'children' => [
                    '060011',
                    '060012',
                    '060013'
                ]
            ],
            '060020' => [
                'name' => '置賜',
                'enName' => 'Okitama',
                'parent' => '060000',
                'children' => [
                    '060021',
                    '060022'
                ]
            ],
            '060030' => [
                'name' => '庄内',
                'enName' => 'Shonai',
                'parent' => '060000',
                'children' => [
                    '060031',
                    '060032'
                ]
            ],
            '060040' => [
                'name' => '最上',
                'enName' => 'Mogami',
                'parent' => '060000',
                'children' => [
                    '060040'
                ]
            ],
            '070010' => [
                'name' => '中通り',
                'enName' => 'Nakadori',
                'parent' => '070000',
                'children' => [
                    '070011',
                    '070012',
                    '070013'
                ]
            ],
            '070020' => [
                'name' => '浜通り',
                'enName' => 'Hamadori',
                'parent' => '070000',
                'children' => [
                    '070021',
                    '070022',
                    '070023'
                ]
            ],
            '070030' => [
                'name' => '会津',
                'enName' => 'Aizu',
                'parent' => '070000',
                'children' => [
                    '070031',
                    '070032',
                    '070033'
                ]
            ],
            '080010' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '080000',
                'children' => [
                    '080011',
                    '080012'
                ]
            ],
            '080020' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '080000',
                'children' => [
                    '080021',
                    '080022',
                    '080023'
                ]
            ],
            '090010' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '090000',
                'children' => [
                    '090011',
                    '090012',
                    '090013'
                ]
            ],
            '090020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '090000',
                'children' => [
                    '090021',
                    '090022'
                ]
            ]
        ],
        'class15s' => [
            '100011' => [
                'name' => '前橋・桐生地域',
                'enName' => 'Maebashi Kiryu Area',
                'parent' => '100010',
                'children' => [
                    '1020100',
                    '1020300',
                    '1020800',
                    '1021200',
                    '1034400',
                    '1034500'
                ]
            ],
            '100012' => [
                'name' => '伊勢崎・太田地域',
                'enName' => 'Isesaki Ota Area',
                'parent' => '100010',
                'children' => [
                    '1020400',
                    '1020500',
                    '1020700',
                    '1046400',
                    '1052100',
                    '1052200',
                    '1052300',
                    '1052400',
                    '1052500'
                ]
            ],
            '100013' => [
                'name' => '高崎・藤岡地域',
                'enName' => 'Takasaki Fujioka Area',
                'parent' => '100010',
                'children' => [
                    '1020200',
                    '1020900',
                    '1021000',
                    '1021100',
                    '1036600',
                    '1036700',
                    '1038200',
                    '1038300',
                    '1038400'
                ]
            ],
            '100021' => [
                'name' => '利根・沼田地域',
                'enName' => 'Tone Numata Area',
                'parent' => '100020',
                'children' => [
                    '1020600',
                    '1044300',
                    '1044400',
                    '1044800',
                    '1044900'
                ]
            ],
            '100022' => [
                'name' => '吾妻地域',
                'enName' => 'Agatsuma Area',
                'parent' => '100020',
                'children' => [
                    '1042100',
                    '1042400',
                    '1042500',
                    '1042600',
                    '1042800',
                    '1042900'
                ]
            ],
            '110011' => [
                'name' => '南中部',
                'enName' => 'Southern Central Region',
                'parent' => '110010',
                'children' => [
                    '1110000',
                    '1120100',
                    '1120300',
                    '1120800',
                    '1121500',
                    '1121900',
                    '1122300',
                    '1122400',
                    '1122700',
                    '1122800',
                    '1122900',
                    '1123000',
                    '1123100',
                    '1123300',
                    '1123500',
                    '1124500',
                    '1130100',
                    '1132400',
                    '1134600'
                ]
            ],
            '110012' => [
                'name' => '南東部',
                'enName' => 'South-eastern Region',
                'parent' => '110010',
                'children' => [
                    '1121400',
                    '1122100',
                    '1122200',
                    '1123400',
                    '1123700',
                    '1123800',
                    '1124000',
                    '1124300',
                    '1124600',
                    '1144200',
                    '1146400',
                    '1146500'
                ]
            ],
            '110013' => [
                'name' => '南西部',
                'enName' => 'South-western Region',
                'parent' => '110010',
                'children' => [
                    '1120900',
                    '1122500',
                    '1123900',
                    '1124100',
                    '1124200',
                    '1132600',
                    '1132700'
                ]
            ],
            '110021' => [
                'name' => '北東部',
                'enName' => 'North-eastern Region',
                'parent' => '110020',
                'children' => [
                    '1120600',
                    '1121000',
                    '1121600',
                    '1121700',
                    '1123200'
                ]
            ],
            '110022' => [
                'name' => '北西部',
                'enName' => 'North-western Region',
                'parent' => '110020',
                'children' => [
                    '1120200',
                    '1121100',
                    '1121200',
                    '1121800',
                    '1134100',
                    '1134200',
                    '1134300',
                    '1134700',
                    '1134800',
                    '1134900',
                    '1136900',
                    '1138100',
                    '1138300',
                    '1138500',
                    '1140800'
                ]
            ],
            '110030' => [
                'name' => '秩父地方',
                'enName' => 'Chichibu District',
                'parent' => '110030',
                'children' => [
                    '1120700',
                    '1136100',
                    '1136200',
                    '1136300',
                    '1136500'
                ]
            ],
            '120011' => [
                'name' => '千葉中央',
                'enName' => 'Central Chiba',
                'parent' => '120010',
                'children' => [
                    '1210000',
                    '1221900'
                ]
            ],
            '120012' => [
                'name' => '印旛',
                'enName' => 'Imba',
                'parent' => '120010',
                'children' => [
                    '1221100',
                    '1221200',
                    '1222800',
                    '1223000',
                    '1223100',
                    '1223200',
                    '1223300',
                    '1232200',
                    '1232900'
                ]
            ],
            '120013' => [
                'name' => '東葛飾',
                'enName' => 'Higashi-katsushika',
                'parent' => '120010',
                'children' => [
                    '1220300',
                    '1220400',
                    '1220700',
                    '1220800',
                    '1221600',
                    '1221700',
                    '1222000',
                    '1222100',
                    '1222200',
                    '1222400',
                    '1222700'
                ]
            ],
            '120021' => [
                'name' => '香取・海匝',
                'enName' => 'Katori Kaiso',
                'parent' => '120020',
                'children' => [
                    '1220200',
                    '1221500',
                    '1223500',
                    '1223600',
                    '1234200',
                    '1234700',
                    '1234900'
                ]
            ],
            '120022' => [
                'name' => '山武・長生',
                'enName' => 'Sammu Chosei',
                'parent' => '120020',
                'children' => [
                    '1221000',
                    '1221300',
                    '1223700',
                    '1223900',
                    '1240300',
                    '1240900',
                    '1241000',
                    '1242100',
                    '1242200',
                    '1242300',
                    '1242400',
                    '1242600',
                    '1242700'
                ]
            ],
            '120031' => [
                'name' => '君津',
                'enName' => 'Kimitsu',
                'parent' => '120030',
                'children' => [
                    '1220600',
                    '1222500',
                    '1222600',
                    '1222900'
                ]
            ],
            '120032' => [
                'name' => '夷隅・安房',
                'enName' => 'Isumi Awa',
                'parent' => '120030',
                'children' => [
                    '1220500',
                    '1221800',
                    '1222300',
                    '1223400',
                    '1223800',
                    '1244100',
                    '1244300',
                    '1246300'
                ]
            ],
            '130011' => [
                'name' => '２３区西部',
                'enName' => 'Western Region of 23 wards',
                'parent' => '130010',
                'children' => [
                    '1310100',
                    '1310200',
                    '1310300',
                    '1310400',
                    '1310500',
                    '1310900',
                    '1311000',
                    '1311100',
                    '1311200',
                    '1311300',
                    '1311400',
                    '1311500',
                    '1311600',
                    '1311700',
                    '1311900',
                    '1312000'
                ]
            ],
            '130012' => [
                'name' => '２３区東部',
                'enName' => 'Eastern Region of 23 wards',
                'parent' => '130010',
                'children' => [
                    '1310600',
                    '1310700',
                    '1310800',
                    '1311800',
                    '1312100',
                    '1312200',
                    '1312300'
                ]
            ],
            '130013' => [
                'name' => '多摩北部',
                'enName' => 'Northern Tama',
                'parent' => '130010',
                'children' => [
                    '1320200',
                    '1320300',
                    '1320400',
                    '1320600',
                    '1320700',
                    '1320800',
                    '1321000',
                    '1321100',
                    '1321300',
                    '1321400',
                    '1321500',
                    '1321900',
                    '1322000',
                    '1322100',
                    '1322200',
                    '1322300',
                    '1322900'
                ]
            ],
            '130014' => [
                'name' => '多摩西部',
                'enName' => 'Western Tama',
                'parent' => '130010',
                'children' => [
                    '1320500',
                    '1321800',
                    '1322700',
                    '1322800',
                    '1330300',
                    '1330500',
                    '1330700',
                    '1330800'
                ]
            ],
            '130015' => [
                'name' => '多摩南部',
                'enName' => 'Southern Tama',
                'parent' => '130010',
                'children' => [
                    '1320100',
                    '1320900',
                    '1321200',
                    '1322400',
                    '1322500'
                ]
            ],
            '130021' => [
                'name' => '大島',
                'enName' => 'Oshima Island',
                'parent' => '130020',
                'children' => [
                    '1336100'
                ]
            ],
            '130022' => [
                'name' => '新島',
                'enName' => 'Niijima Island',
                'parent' => '130020',
                'children' => [
                    '1336200',
                    '1336300',
                    '1336400'
                ]
            ],
            '130031' => [
                'name' => '八丈島',
                'enName' => 'Hachijojima Island',
                'parent' => '130030',
                'children' => [
                    '1340100',
                    '1340200'
                ]
            ],
            '130032' => [
                'name' => '三宅島',
                'enName' => 'Miyakejima Island',
                'parent' => '130030',
                'children' => [
                    '1338100',
                    '1338200'
                ]
            ],
            '130040' => [
                'name' => '小笠原諸島',
                'enName' => 'Ogasawara Islands',
                'parent' => '130040',
                'children' => [
                    '1342100'
                ]
            ],
            '140011' => [
                'name' => '横浜・川崎',
                'enName' => 'Yokohama Kawasaki',
                'parent' => '140010',
                'children' => [
                    '1410000',
                    '1413000'
                ]
            ],
            '140012' => [
                'name' => '湘南',
                'enName' => 'Shonan',
                'parent' => '140010',
                'children' => [
                    '1420300',
                    '1420500',
                    '1420700',
                    '1421300',
                    '1421500',
                    '1421600',
                    '1421800',
                    '1432100',
                    '1434100',
                    '1434200'
                ]
            ],
            '140013' => [
                'name' => '三浦半島',
                'enName' => 'Miura Peninsula',
                'parent' => '140010',
                'children' => [
                    '1420100',
                    '1420400',
                    '1420800',
                    '1421000',
                    '1430100'
                ]
            ],
            '140021' => [
                'name' => '相模原',
                'enName' => 'Sagamihara',
                'parent' => '140020',
                'children' => [
                    '1415000'
                ]
            ],
            '140022' => [
                'name' => '県央',
                'enName' => 'Ken-o',
                'parent' => '140020',
                'children' => [
                    '1421100',
                    '1421200',
                    '1421400',
                    '1440100',
                    '1440200'
                ]
            ],
            '140023' => [
                'name' => '足柄上',
                'enName' => 'Ashigara-kami',
                'parent' => '140020',
                'children' => [
                    '1421700',
                    '1436100',
                    '1436200',
                    '1436300',
                    '1436400',
                    '1436600'
                ]
            ],
            '140024' => [
                'name' => '西湘',
                'enName' => 'Seisho',
                'parent' => '140020',
                'children' => [
                    '1420600',
                    '1438200',
                    '1438300',
                    '1438400'
                ]
            ],
            '150011' => [
                'name' => '新潟地域',
                'enName' => 'Niigata Area',
                'parent' => '150010',
                'children' => [
                    '1510000',
                    '1521300',
                    '1522300',
                    '1534200'
                ]
            ],
            '150012' => [
                'name' => '岩船地域',
                'enName' => 'Iwafune Area',
                'parent' => '150010',
                'children' => [
                    '1521200',
                    '1558100',
                    '1558600'
                ]
            ],
            '150013' => [
                'name' => '新発田地域',
                'enName' => 'Shibata Area',
                'parent' => '150010',
                'children' => [
                    '1520600',
                    '1522700',
                    '1530700'
                ]
            ],
            '150014' => [
                'name' => '五泉地域',
                'enName' => 'Gosen Area',
                'parent' => '150010',
                'children' => [
                    '1521800',
                    '1538500'
                ]
            ],
            '150021' => [
                'name' => '長岡地域',
                'enName' => 'Nagaoka Area',
                'parent' => '150020',
                'children' => [
                    '1520200',
                    '1520800',
                    '1521100',
                    '1540500'
                ]
            ],
            '150022' => [
                'name' => '三条地域',
                'enName' => 'Sanjo Area',
                'parent' => '150020',
                'children' => [
                    '1520400',
                    '1520900',
                    '1536100'
                ]
            ],
            '150023' => [
                'name' => '魚沼市',
                'enName' => 'Uonuma City',
                'parent' => '150020',
                'children' => [
                    '1522500'
                ]
            ],
            '150024' => [
                'name' => '柏崎地域',
                'enName' => 'Kashiwazaki Area',
                'parent' => '150020',
                'children' => [
                    '1520500',
                    '1550400'
                ]
            ],
            '150025' => [
                'name' => '南魚沼地域',
                'enName' => 'Minami-uonuma Area',
                'parent' => '150020',
                'children' => [
                    '1522600',
                    '1546100'
                ]
            ],
            '150026' => [
                'name' => '十日町地域',
                'enName' => 'Toka-machi Area',
                'parent' => '150020',
                'children' => [
                    '1521000',
                    '1548200'
                ]
            ],
            '150031' => [
                'name' => '上越市',
                'enName' => 'Joetsu City',
                'parent' => '150030',
                'children' => [
                    '1522200'
                ]
            ],
            '150032' => [
                'name' => '糸魚川市',
                'enName' => 'Itoigawa City',
                'parent' => '150030',
                'children' => [
                    '1521600'
                ]
            ],
            '150033' => [
                'name' => '妙高市',
                'enName' => 'Myoko City',
                'parent' => '150030',
                'children' => [
                    '1521700'
                ]
            ],
            '150040' => [
                'name' => '佐渡',
                'enName' => 'Sado',
                'parent' => '150040',
                'children' => [
                    '1522400'
                ]
            ],
            '160011' => [
                'name' => '東部南',
                'enName' => 'South-eastern Region',
                'parent' => '160010',
                'children' => [
                    '1620100',
                    '1632100',
                    '1632200',
                    '1632300'
                ]
            ],
            '160012' => [
                'name' => '東部北',
                'enName' => 'North-eastern Region',
                'parent' => '160010',
                'children' => [
                    '1620400',
                    '1620600',
                    '1620700',
                    '1634200',
                    '1634300'
                ]
            ],
            '160021' => [
                'name' => '西部北',
                'enName' => 'North-western Region',
                'parent' => '160020',
                'children' => [
                    '1620200',
                    '1620500',
                    '1620900',
                    '1621100'
                ]
            ],
            '160022' => [
                'name' => '西部南',
                'enName' => 'South-western Region',
                'parent' => '160020',
                'children' => [
                    '1620800',
                    '1621000'
                ]
            ],
            '170011' => [
                'name' => '加賀北部',
                'enName' => 'Northern Kaga',
                'parent' => '170010',
                'children' => [
                    '1720100',
                    '1720900',
                    '1736100',
                    '1736500'
                ]
            ],
            '170012' => [
                'name' => '加賀南部',
                'enName' => 'Southern Kaga',
                'parent' => '170010',
                'children' => [
                    '1720300',
                    '1720600',
                    '1721000',
                    '1721100',
                    '1721200',
                    '1732400'
                ]
            ],
            '170021' => [
                'name' => '能登北部',
                'enName' => 'Northern Noto',
                'parent' => '170020',
                'children' => [
                    '1720400',
                    '1720500',
                    '1746100',
                    '1746300'
                ]
            ],
            '170022' => [
                'name' => '能登南部',
                'enName' => 'Southern Noto',
                'parent' => '170020',
                'children' => [
                    '1720200',
                    '1720700',
                    '1738400',
                    '1738600',
                    '1740700'
                ]
            ],
            '180011' => [
                'name' => '嶺北北部',
                'enName' => 'Northern Reihoku',
                'parent' => '180010',
                'children' => [
                    '1820100',
                    '1820800',
                    '1821000',
                    '1832200',
                    '1842300'
                ]
            ],
            '180012' => [
                'name' => '嶺北南部',
                'enName' => 'Southern Reihoku',
                'parent' => '180010',
                'children' => [
                    '1820700',
                    '1820900',
                    '1838200',
                    '1840400'
                ]
            ],
            '180013' => [
                'name' => '奥越',
                'enName' => 'Okuetsu',
                'parent' => '180010',
                'children' => [
                    '1820500',
                    '1820600'
                ]
            ],
            '180021' => [
                'name' => '嶺南東部',
                'enName' => 'Eastern Reinan',
                'parent' => '180020',
                'children' => [
                    '1820200',
                    '1844200',
                    '1850100'
                ]
            ],
            '180022' => [
                'name' => '嶺南西部',
                'enName' => 'Western Reinan',
                'parent' => '180020',
                'children' => [
                    '1820400',
                    '1848100',
                    '1848300'
                ]
            ],
            '190011' => [
                'name' => '中北地域',
                'enName' => 'Chuhoku Area',
                'parent' => '190010',
                'children' => [
                    '1920100',
                    '1920700',
                    '1920800',
                    '1920900',
                    '1921000',
                    '1921400',
                    '1938400'
                ]
            ],
            '190012' => [
                'name' => '峡東地域',
                'enName' => 'Kyoto Area',
                'parent' => '190010',
                'children' => [
                    '1920500',
                    '1921100',
                    '1921300'
                ]
            ],
            '190013' => [
                'name' => '峡南地域',
                'enName' => 'Kyonan Area',
                'parent' => '190010',
                'children' => [
                    '1934600',
                    '1936400',
                    '1936500',
                    '1936600',
                    '1936800'
                ]
            ],
            '190021' => [
                'name' => '東部',
                'enName' => 'Eastern Region',
                'parent' => '190020',
                'children' => [
                    '1920400',
                    '1920600',
                    '1921200',
                    '1942200',
                    '1944200',
                    '1944300'
                ]
            ],
            '190022' => [
                'name' => '富士五湖',
                'enName' => 'Fuji Five Lakes',
                'parent' => '190020',
                'children' => [
                    '1920200',
                    '1942300',
                    '1942400',
                    '1942500',
                    '1942900',
                    '1943000'
                ]
            ],
            '200011' => [
                'name' => '長野地域',
                'enName' => 'Nagano Area',
                'parent' => '200010',
                'children' => [
                    '2020100',
                    '2020700',
                    '2021800',
                    '2052100',
                    '2054100',
                    '2054300',
                    '2058300',
                    '2058800',
                    '2059000'
                ]
            ],
            '200012' => [
                'name' => '中野飯山地域',
                'enName' => 'Nakano Iiyama Area',
                'parent' => '200010',
                'children' => [
                    '2021100',
                    '2021300',
                    '2056100',
                    '2056200',
                    '2056300',
                    '2060200'
                ]
            ],
            '200013' => [
                'name' => '大北地域',
                'enName' => 'Daihoku Area',
                'parent' => '200010',
                'children' => [
                    '2021200',
                    '2048100',
                    '2048200',
                    '2048500',
                    '2048600'
                ]
            ],
            '200021' => [
                'name' => '上田地域',
                'enName' => 'Ueda Area',
                'parent' => '200020',
                'children' => [
                    '2020300',
                    '2021900',
                    '2034900',
                    '2035000'
                ]
            ],
            '200022' => [
                'name' => '佐久地域',
                'enName' => 'Saku Area',
                'parent' => '200020',
                'children' => [
                    '2020800',
                    '2021700',
                    '2030300',
                    '2030400',
                    '2030500',
                    '2030600',
                    '2030700',
                    '2030900',
                    '2032100',
                    '2032300',
                    '2032400'
                ]
            ],
            '200023' => [
                'name' => '松本地域',
                'enName' => 'Matsumoto Area',
                'parent' => '200020',
                'children' => [
                    '2020201',
                    '2021501',
                    '2022000',
                    '2044600',
                    '2044800',
                    '2045000',
                    '2045100',
                    '2045200'
                ]
            ],
            '200024' => [
                'name' => '乗鞍上高地地域',
                'enName' => 'Norikura Kamikochi Area',
                'parent' => '200020',
                'children' => [
                    '2020202'
                ]
            ],
            '200025' => [
                'name' => '諏訪地域',
                'enName' => 'Suwa Area',
                'parent' => '200020',
                'children' => [
                    '2020400',
                    '2020600',
                    '2021400',
                    '2036100',
                    '2036200',
                    '2036300'
                ]
            ],
            '200031' => [
                'name' => '上伊那地域',
                'enName' => 'Kamiina Area',
                'parent' => '200030',
                'children' => [
                    '2020900',
                    '2021000',
                    '2038200',
                    '2038300',
                    '2038400',
                    '2038500',
                    '2038600',
                    '2038800'
                ]
            ],
            '200032' => [
                'name' => '木曽地域',
                'enName' => 'Kiso Area',
                'parent' => '200030',
                'children' => [
                    '2021502',
                    '2042200',
                    '2042300',
                    '2042500',
                    '2042900',
                    '2043000',
                    '2043200'
                ]
            ],
            '200033' => [
                'name' => '下伊那地域',
                'enName' => 'Shimoina Area',
                'parent' => '200030',
                'children' => [
                    '2020500',
                    '2040200',
                    '2040300',
                    '2040400',
                    '2040700',
                    '2040900',
                    '2041000',
                    '2041100',
                    '2041200',
                    '2041300',
                    '2041400',
                    '2041500',
                    '2041600',
                    '2041700'
                ]
            ],
            '210011' => [
                'name' => '岐阜・西濃',
                'enName' => 'Gifu Seino',
                'parent' => '210010',
                'children' => [
                    '2120100',
                    '2120200',
                    '2120900',
                    '2121300',
                    '2121500',
                    '2121600',
                    '2121800',
                    '2122100',
                    '2130200',
                    '2130300',
                    '2134100',
                    '2136100',
                    '2136200',
                    '2138100',
                    '2138200',
                    '2138300',
                    '2140100',
                    '2140300',
                    '2140400',
                    '2142100'
                ]
            ],
            '210012' => [
                'name' => '東濃',
                'enName' => 'Tono',
                'parent' => '210010',
                'children' => [
                    '2120400',
                    '2120600',
                    '2120800',
                    '2121000',
                    '2121200'
                ]
            ],
            '210013' => [
                'name' => '中濃',
                'enName' => 'Chuno',
                'parent' => '210010',
                'children' => [
                    '2120500',
                    '2120700',
                    '2121100',
                    '2121400',
                    '2121900',
                    '2150100',
                    '2150200',
                    '2150300',
                    '2150400',
                    '2150500',
                    '2150600',
                    '2150700',
                    '2152100'
                ]
            ],
            '210021' => [
                'name' => '飛騨北部',
                'enName' => 'Northern Hida',
                'parent' => '210020',
                'children' => [
                    '2120300',
                    '2121700',
                    '2160400'
                ]
            ],
            '210022' => [
                'name' => '飛騨南部',
                'enName' => 'Southern Hida',
                'parent' => '210020',
                'children' => [
                    '2122000'
                ]
            ],
            '220011' => [
                'name' => '中部南',
                'enName' => 'Southern Central Region',
                'parent' => '220010',
                'children' => [
                    '2210001',
                    '2220900',
                    '2221200',
                    '2221400',
                    '2222600',
                    '2242400'
                ]
            ],
            '220012' => [
                'name' => '中部北',
                'enName' => 'Northern Central Region',
                'parent' => '220010',
                'children' => [
                    '2210002',
                    '2242900'
                ]
            ],
            '220021' => [
                'name' => '伊豆北',
                'enName' => 'Northern Izu',
                'parent' => '220020',
                'children' => [
                    '2220500',
                    '2220800',
                    '2222200',
                    '2222500',
                    '2232500'
                ]
            ],
            '220022' => [
                'name' => '伊豆南',
                'enName' => 'Southern Izu',
                'parent' => '220020',
                'children' => [
                    '2221900',
                    '2230100',
                    '2230200',
                    '2230400',
                    '2230500',
                    '2230600'
                ]
            ],
            '220031' => [
                'name' => '富士山南東',
                'enName' => 'South-eastern Mt. Fuji',
                'parent' => '220030',
                'children' => [
                    '2220300',
                    '2220600',
                    '2221500',
                    '2222000',
                    '2234100',
                    '2234200',
                    '2234400'
                ]
            ],
            '220032' => [
                'name' => '富士山南西',
                'enName' => 'South-western Mt. Fuji',
                'parent' => '220030',
                'children' => [
                    '2220700',
                    '2221000'
                ]
            ],
            '220041' => [
                'name' => '遠州北',
                'enName' => 'Northern Enshu',
                'parent' => '220040',
                'children' => [
                    '2213002'
                ]
            ],
            '220042' => [
                'name' => '遠州南',
                'enName' => 'Southern Enshu',
                'parent' => '220040',
                'children' => [
                    '2213001',
                    '2221100',
                    '2221300',
                    '2221600',
                    '2222100',
                    '2222300',
                    '2222400',
                    '2246100'
                ]
            ],
            '230011' => [
                'name' => '尾張東部',
                'enName' => 'Eastern Owari',
                'parent' => '230010',
                'children' => [
                    '2310000',
                    '2320400',
                    '2320600',
                    '2321500',
                    '2321900',
                    '2322600',
                    '2322900',
                    '2323000',
                    '2323800',
                    '2330200'
                ]
            ],
            '230012' => [
                'name' => '尾張西部',
                'enName' => 'Western Owari',
                'parent' => '230010',
                'children' => [
                    '2320300',
                    '2320800',
                    '2321700',
                    '2322000',
                    '2322800',
                    '2323200',
                    '2323300',
                    '2323400',
                    '2323500',
                    '2323700',
                    '2334200',
                    '2336100',
                    '2336200',
                    '2342400',
                    '2342500',
                    '2342700'
                ]
            ],
            '230013' => [
                'name' => '知多地域',
                'enName' => 'Chita Area',
                'parent' => '230010',
                'children' => [
                    '2320500',
                    '2321600',
                    '2322200',
                    '2322300',
                    '2322400',
                    '2344100',
                    '2344200',
                    '2344500',
                    '2344600',
                    '2344700'
                ]
            ],
            '230014' => [
                'name' => '西三河南部',
                'enName' => 'Southern Nishi-mikawa Region',
                'parent' => '230010',
                'children' => [
                    '2320200',
                    '2320900',
                    '2321000',
                    '2321200',
                    '2321300',
                    '2322500',
                    '2322700',
                    '2350100'
                ]
            ],
            '230015' => [
                'name' => '西三河北西部',
                'enName' => 'North-western Nishi-mikawa Region',
                'parent' => '230010',
                'children' => [
                    '2321101',
                    '2323600'
                ]
            ],
            '230021' => [
                'name' => '西三河北東部',
                'enName' => 'North-eastern Nishi-mikawa Region',
                'parent' => '230020',
                'children' => [
                    '2321102'
                ]
            ],
            '230022' => [
                'name' => '東三河北部',
                'enName' => 'Northern Higashi-mikawa Region',
                'parent' => '230020',
                'children' => [
                    '2322100',
                    '2356100',
                    '2356200',
                    '2356300'
                ]
            ],
            '230023' => [
                'name' => '東三河南部',
                'enName' => 'Southern Higashi-mikawa Region',
                'parent' => '230020',
                'children' => [
                    '2320100',
                    '2320700',
                    '2321400',
                    '2323100'
                ]
            ],
            '240011' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '240010',
                'children' => [
                    '2420100',
                    '2420400',
                    '2444100',
                    '2444200'
                ]
            ],
            '240012' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '240010',
                'children' => [
                    '2420200',
                    '2420500',
                    '2420700',
                    '2421000',
                    '2421400',
                    '2430300',
                    '2432400',
                    '2434100',
                    '2434300',
                    '2434400'
                ]
            ],
            '240013' => [
                'name' => '伊賀',
                'enName' => 'Iga',
                'parent' => '240010',
                'children' => [
                    '2420800',
                    '2421600'
                ]
            ],
            '240021' => [
                'name' => '伊勢志摩',
                'enName' => 'Ise Shima',
                'parent' => '240020',
                'children' => [
                    '2420300',
                    '2421100',
                    '2421500',
                    '2446100',
                    '2447000',
                    '2447200'
                ]
            ],
            '240022' => [
                'name' => '紀勢・東紀州',
                'enName' => 'Kisei Higashi-kishu',
                'parent' => '240020',
                'children' => [
                    '2420900',
                    '2421200',
                    '2444300',
                    '2447100',
                    '2454300',
                    '2456100',
                    '2456200'
                ]
            ],
            '250011' => [
                'name' => '近江南部',
                'enName' => 'Southern Omi Region',
                'parent' => '250010',
                'children' => [
                    '2520101',
                    '2520600',
                    '2520700',
                    '2520800',
                    '2521000'
                ]
            ],
            '250012' => [
                'name' => '東近江',
                'enName' => 'Higashi-omi',
                'parent' => '250010',
                'children' => [
                    '2520400',
                    '2521300',
                    '2538300',
                    '2538400'
                ]
            ],
            '250013' => [
                'name' => '甲賀',
                'enName' => 'Koka',
                'parent' => '250010',
                'children' => [
                    '2520900',
                    '2521100'
                ]
            ],
            '250021' => [
                'name' => '近江西部',
                'enName' => 'Western Omi',
                'parent' => '250020',
                'children' => [
                    '2520102',
                    '2521200'
                ]
            ],
            '250022' => [
                'name' => '湖北',
                'enName' => 'Kohoku',
                'parent' => '250020',
                'children' => [
                    '2520300',
                    '2521400'
                ]
            ],
            '250023' => [
                'name' => '湖東',
                'enName' => 'Koto',
                'parent' => '250020',
                'children' => [
                    '2520200',
                    '2542500',
                    '2544100',
                    '2544200',
                    '2544300'
                ]
            ],
            '260011' => [
                'name' => '京都・亀岡',
                'enName' => 'Kyoto Kameoka',
                'parent' => '260010',
                'children' => [
                    '2610000',
                    '2620600',
                    '2620800',
                    '2620900',
                    '2630300'
                ]
            ],
            '260012' => [
                'name' => '南丹・京丹波',
                'enName' => 'Nantan Kyotamba',
                'parent' => '260010',
                'children' => [
                    '2621300',
                    '2640700'
                ]
            ],
            '260013' => [
                'name' => '山城中部',
                'enName' => 'Central Yamashiro',
                'parent' => '260010',
                'children' => [
                    '2620400',
                    '2620700',
                    '2621000',
                    '2621100',
                    '2632200',
                    '2634300',
                    '2634400'
                ]
            ],
            '260014' => [
                'name' => '山城南部',
                'enName' => 'Southern Yamashiro',
                'parent' => '260010',
                'children' => [
                    '2621400',
                    '2636400',
                    '2636500',
                    '2636600',
                    '2636700'
                ]
            ],
            '260021' => [
                'name' => '丹後',
                'enName' => 'Tango',
                'parent' => '260020',
                'children' => [
                    '2620500',
                    '2621200',
                    '2646300',
                    '2646500'
                ]
            ],
            '260022' => [
                'name' => '舞鶴・綾部',
                'enName' => 'Maizuru Ayabe',
                'parent' => '260020',
                'children' => [
                    '2620200',
                    '2620300'
                ]
            ],
            '260023' => [
                'name' => '福知山',
                'enName' => 'Fukuchiyama',
                'parent' => '260020',
                'children' => [
                    '2620100'
                ]
            ],
            '270001' => [
                'name' => '大阪市',
                'enName' => 'Osaka City',
                'parent' => '270000',
                'children' => [
                    '2710000'
                ]
            ],
            '270002' => [
                'name' => '北大阪',
                'enName' => 'Kita-osaka',
                'parent' => '270000',
                'children' => [
                    '2720300',
                    '2720400',
                    '2720500',
                    '2720700',
                    '2721100',
                    '2722000',
                    '2722400',
                    '2730100',
                    '2732100',
                    '2732200'
                ]
            ],
            '270003' => [
                'name' => '東部大阪',
                'enName' => 'Eastern Osaka',
                'parent' => '270000',
                'children' => [
                    '2720900',
                    '2721000',
                    '2721200',
                    '2721500',
                    '2721800',
                    '2722100',
                    '2722300',
                    '2722700',
                    '2722900',
                    '2723000'
                ]
            ],
            '270004' => [
                'name' => '南河内',
                'enName' => 'Minami-kawachi',
                'parent' => '270000',
                'children' => [
                    '2721400',
                    '2721600',
                    '2721700',
                    '2722200',
                    '2722600',
                    '2723100',
                    '2738100',
                    '2738200',
                    '2738300'
                ]
            ],
            '270005' => [
                'name' => '泉州',
                'enName' => 'Senshu',
                'parent' => '270000',
                'children' => [
                    '2714000',
                    '2720200',
                    '2720600',
                    '2720800',
                    '2721300',
                    '2721900',
                    '2722500',
                    '2722800',
                    '2723200',
                    '2734100',
                    '2736100',
                    '2736200',
                    '2736600'
                ]
            ],
            '280011' => [
                'name' => '阪神',
                'enName' => 'Hanshin',
                'parent' => '280010',
                'children' => [
                    '2810000',
                    '2820200',
                    '2820400',
                    '2820600',
                    '2820700',
                    '2821400',
                    '2821700',
                    '2821900',
                    '2830100'
                ]
            ],
            '280012' => [
                'name' => '北播丹波',
                'enName' => 'Hokuban Tamba',
                'parent' => '280010',
                'children' => [
                    '2821300',
                    '2822100',
                    '2822300',
                    '2836500'
                ]
            ],
            '280013' => [
                'name' => '播磨北西部',
                'enName' => 'North-western Harima',
                'parent' => '280010',
                'children' => [
                    '2822700',
                    '2844200',
                    '2844300',
                    '2844600',
                    '2850100'
                ]
            ],
            '280014' => [
                'name' => '播磨南東部',
                'enName' => 'South-eastern Harima',
                'parent' => '280010',
                'children' => [
                    '2820300',
                    '2821000',
                    '2821500',
                    '2821600',
                    '2821800',
                    '2822000',
                    '2822800',
                    '2838100',
                    '2838200'
                ]
            ],
            '280015' => [
                'name' => '播磨南西部',
                'enName' => 'South-western Harima',
                'parent' => '280010',
                'children' => [
                    '2820100',
                    '2820800',
                    '2821200',
                    '2822900',
                    '2846400',
                    '2848100'
                ]
            ],
            '280016' => [
                'name' => '淡路島',
                'enName' => 'Awajishima',
                'parent' => '280010',
                'children' => [
                    '2820500',
                    '2822400',
                    '2822600'
                ]
            ],
            '280021' => [
                'name' => '但馬北部',
                'enName' => 'Northern Tajima',
                'parent' => '280020',
                'children' => [
                    '2820900',
                    '2858500',
                    '2858600'
                ]
            ],
            '280022' => [
                'name' => '但馬南部',
                'enName' => 'Southern Tajima',
                'parent' => '280020',
                'children' => [
                    '2822200',
                    '2822500'
                ]
            ],
            '290011' => [
                'name' => '北西部',
                'enName' => 'North-western Region',
                'parent' => '290010',
                'children' => [
                    '2920100',
                    '2920200',
                    '2920300',
                    '2920400',
                    '2920500',
                    '2920600',
                    '2920800',
                    '2920900',
                    '2921000',
                    '2921100',
                    '2934200',
                    '2934300',
                    '2934400',
                    '2934500',
                    '2936100',
                    '2936200',
                    '2936300',
                    '2940100',
                    '2940200',
                    '2942400',
                    '2942500',
                    '2942600',
                    '2942700'
                ]
            ],
            '290012' => [
                'name' => '北東部',
                'enName' => 'North-eastern Region',
                'parent' => '290010',
                'children' => [
                    '2921200',
                    '2932200'
                ]
            ],
            '290013' => [
                'name' => '五條・北部吉野',
                'enName' => 'Gojo and Northern Yoshino',
                'parent' => '290010',
                'children' => [
                    '2920701',
                    '2944100',
                    '2944200',
                    '2944300'
                ]
            ],
            '290021' => [
                'name' => '南東部',
                'enName' => 'South-eastern Region',
                'parent' => '290020',
                'children' => [
                    '2938500',
                    '2938600',
                    '2944400',
                    '2944600',
                    '2945000',
                    '2945100',
                    '2945200',
                    '2945300'
                ]
            ],
            '290022' => [
                'name' => '南西部',
                'enName' => 'South-western Region',
                'parent' => '290020',
                'children' => [
                    '2920702',
                    '2944700',
                    '2944900'
                ]
            ],
            '300011' => [
                'name' => '紀北',
                'enName' => 'Kihoku',
                'parent' => '300010',
                'children' => [
                    '3020100',
                    '3020200',
                    '3020300',
                    '3020800',
                    '3020900',
                    '3030400',
                    '3034100',
                    '3034300',
                    '3034400'
                ]
            ],
            '300012' => [
                'name' => '紀中',
                'enName' => 'Kichu',
                'parent' => '300010',
                'children' => [
                    '3020400',
                    '3020500',
                    '3036100',
                    '3036200',
                    '3036600',
                    '3038100',
                    '3038200',
                    '3038300',
                    '3039000',
                    '3039100',
                    '3039200'
                ]
            ],
            '300021' => [
                'name' => '田辺・西牟婁',
                'enName' => 'Tanabe Nishimuro',
                'parent' => '300020',
                'children' => [
                    '3020601',
                    '3020602',
                    '3020603',
                    '3020604',
                    '3020605',
                    '3040100',
                    '3040400',
                    '3040600'
                ]
            ],
            '300022' => [
                'name' => '新宮・東牟婁',
                'enName' => 'Shingu Higashimuro',
                'parent' => '300020',
                'children' => [
                    '3020700',
                    '3042100',
                    '3042200',
                    '3042400',
                    '3042700',
                    '3042800'
                ]
            ],
            '310011' => [
                'name' => '鳥取地区',
                'enName' => 'Tottori District',
                'parent' => '310010',
                'children' => [
                    '3120101',
                    '3130200'
                ]
            ],
            '310012' => [
                'name' => '八頭地区',
                'enName' => 'Yazu District',
                'parent' => '310010',
                'children' => [
                    '3120102',
                    '3132500',
                    '3132800',
                    '3132900'
                ]
            ],
            '310021' => [
                'name' => '倉吉地区',
                'enName' => 'Kurayoshi District',
                'parent' => '310020',
                'children' => [
                    '3120300',
                    '3136400',
                    '3137000',
                    '3137100',
                    '3137200'
                ]
            ],
            '310022' => [
                'name' => '米子地区',
                'enName' => 'Yonago District',
                'parent' => '310020',
                'children' => [
                    '3120200',
                    '3120400',
                    '3138400',
                    '3138600',
                    '3138900',
                    '3139000'
                ]
            ],
            '310023' => [
                'name' => '日野地区',
                'enName' => 'Hino District',
                'parent' => '310020',
                'children' => [
                    '3140100',
                    '3140200',
                    '3140300'
                ]
            ],
            '320011' => [
                'name' => '松江地区',
                'enName' => 'Matsue District',
                'parent' => '320010',
                'children' => [
                    '3220100',
                    '3220600'
                ]
            ],
            '320012' => [
                'name' => '出雲地区',
                'enName' => 'Izumo District',
                'parent' => '320010',
                'children' => [
                    '3220300'
                ]
            ],
            '320013' => [
                'name' => '雲南地区',
                'enName' => 'Unnan District',
                'parent' => '320010',
                'children' => [
                    '3220900',
                    '3234300',
                    '3238600'
                ]
            ],
            '320021' => [
                'name' => '大田邑智地区',
                'enName' => 'Oda Ochi District',
                'parent' => '320020',
                'children' => [
                    '3220500',
                    '3244100',
                    '3244800',
                    '3244900'
                ]
            ],
            '320022' => [
                'name' => '浜田地区',
                'enName' => 'Hamada District',
                'parent' => '320020',
                'children' => [
                    '3220200',
                    '3220700'
                ]
            ],
            '320023' => [
                'name' => '益田地区',
                'enName' => 'Masuda District',
                'parent' => '320020',
                'children' => [
                    '3220400',
                    '3250100',
                    '3250500'
                ]
            ],
            '320030' => [
                'name' => '隠岐',
                'enName' => 'Oki',
                'parent' => '320030',
                'children' => [
                    '3252500',
                    '3252600',
                    '3252700',
                    '3252800'
                ]
            ],
            '330011' => [
                'name' => '岡山地域',
                'enName' => 'Okayama Area',
                'parent' => '330010',
                'children' => [
                    '3310000',
                    '3320400',
                    '3321200',
                    '3368100'
                ]
            ],
            '330012' => [
                'name' => '東備地域',
                'enName' => 'Tobi Area',
                'parent' => '330010',
                'children' => [
                    '3321100',
                    '3321300',
                    '3334600'
                ]
            ],
            '330013' => [
                'name' => '倉敷地域',
                'enName' => 'Kurashiki Area',
                'parent' => '330010',
                'children' => [
                    '3320200',
                    '3320800',
                    '3342300'
                ]
            ],
            '330014' => [
                'name' => '井笠地域',
                'enName' => 'Ikasa Area',
                'parent' => '330010',
                'children' => [
                    '3320500',
                    '3320700',
                    '3321600',
                    '3344500',
                    '3346100'
                ]
            ],
            '330015' => [
                'name' => '高梁地域',
                'enName' => 'Takahashi Area',
                'parent' => '330010',
                'children' => [
                    '3320900'
                ]
            ],
            '330021' => [
                'name' => '新見地域',
                'enName' => 'Niimi Area',
                'parent' => '330020',
                'children' => [
                    '3321000'
                ]
            ],
            '330022' => [
                'name' => '真庭地域',
                'enName' => 'Maniwa Area',
                'parent' => '330020',
                'children' => [
                    '3321400',
                    '3358600'
                ]
            ],
            '330023' => [
                'name' => '津山地域',
                'enName' => 'Tsuyama Area',
                'parent' => '330020',
                'children' => [
                    '3320300',
                    '3360600',
                    '3366300',
                    '3366600'
                ]
            ],
            '330024' => [
                'name' => '勝英地域',
                'enName' => 'Shoei Area',
                'parent' => '330020',
                'children' => [
                    '3321500',
                    '3362200',
                    '3362300',
                    '3364300'
                ]
            ],
            '340011' => [
                'name' => '広島・呉',
                'enName' => 'Hiroshima Kure',
                'parent' => '340010',
                'children' => [
                    '3410000',
                    '3420200',
                    '3421100',
                    '3421300',
                    '3421500',
                    '3430200',
                    '3430400',
                    '3430700',
                    '3430900'
                ]
            ],
            '340012' => [
                'name' => '福山・尾三',
                'enName' => 'Fukuyama Bisan',
                'parent' => '340010',
                'children' => [
                    '3420400',
                    '3420500',
                    '3420700',
                    '3420800',
                    '3446200',
                    '3454500'
                ]
            ],
            '340013' => [
                'name' => '東広島・竹原',
                'enName' => 'Higashi-hiroshima Takehara',
                'parent' => '340010',
                'children' => [
                    '3420300',
                    '3421200',
                    '3443100'
                ]
            ],
            '340021' => [
                'name' => '備北',
                'enName' => 'Bihoku',
                'parent' => '340020',
                'children' => [
                    '3420900',
                    '3421000'
                ]
            ],
            '340022' => [
                'name' => '芸北',
                'enName' => 'Geihoku',
                'parent' => '340020',
                'children' => [
                    '3421400',
                    '3436800',
                    '3436900'
                ]
            ],
            '350011' => [
                'name' => '下関',
                'enName' => 'Shimonoseki',
                'parent' => '350010',
                'children' => [
                    '3520100'
                ]
            ],
            '350012' => [
                'name' => '宇部・山陽小野田',
                'enName' => 'Ube and Sanyo Onoda',
                'parent' => '350010',
                'children' => [
                    '3520200',
                    '3521600'
                ]
            ],
            '350021' => [
                'name' => '山口・防府',
                'enName' => 'Yamaguchi Hofu',
                'parent' => '350020',
                'children' => [
                    '3520300',
                    '3520600'
                ]
            ],
            '350022' => [
                'name' => '周南・下松',
                'enName' => 'Shunan Kudamatsu',
                'parent' => '350020',
                'children' => [
                    '3520700',
                    '3521500'
                ]
            ],
            '350031' => [
                'name' => '岩国',
                'enName' => 'Iwakuni',
                'parent' => '350030',
                'children' => [
                    '3520800',
                    '3532100'
                ]
            ],
            '350032' => [
                'name' => '柳井・光',
                'enName' => 'Yanai Hikari',
                'parent' => '350030',
                'children' => [
                    '3521000',
                    '3521200',
                    '3530500',
                    '3534100',
                    '3534300',
                    '3534400'
                ]
            ],
            '350041' => [
                'name' => '萩・美祢',
                'enName' => 'Hagi Mine',
                'parent' => '350040',
                'children' => [
                    '3520400',
                    '3521300',
                    '3550200'
                ]
            ],
            '350042' => [
                'name' => '長門',
                'enName' => 'Nagato',
                'parent' => '350040',
                'children' => [
                    '3521100'
                ]
            ],
            '360011' => [
                'name' => '徳島・鳴門',
                'enName' => 'Tokushima Naruto',
                'parent' => '360010',
                'children' => [
                    '3620100',
                    '3620200',
                    '3620300',
                    '3640100',
                    '3640200',
                    '3640300',
                    '3640400'
                ]
            ],
            '360012' => [
                'name' => '美馬北部・阿北',
                'enName' => 'Northern Mima and Ahoku',
                'parent' => '360010',
                'children' => [
                    '3620500',
                    '3620600',
                    '3620701',
                    '3634100',
                    '3640500',
                    '3646801'
                ]
            ],
            '360013' => [
                'name' => '美馬南部・神山',
                'enName' => 'Southern Mima and Kamiyama',
                'parent' => '360010',
                'children' => [
                    '3620702',
                    '3632100',
                    '3634200',
                    '3646802'
                ]
            ],
            '360014' => [
                'name' => '三好',
                'enName' => 'Miyoshi',
                'parent' => '360010',
                'children' => [
                    '3620800',
                    '3648900'
                ]
            ],
            '360021' => [
                'name' => '阿南',
                'enName' => 'Anan',
                'parent' => '360020',
                'children' => [
                    '3620400'
                ]
            ],
            '360022' => [
                'name' => '那賀・勝浦',
                'enName' => 'Naka Katsuura',
                'parent' => '360020',
                'children' => [
                    '3630100',
                    '3630200',
                    '3636800'
                ]
            ],
            '360023' => [
                'name' => '海部',
                'enName' => 'Kaifu',
                'parent' => '360020',
                'children' => [
                    '3638300',
                    '3638700',
                    '3638800'
                ]
            ],
            '370001' => [
                'name' => '高松地域',
                'enName' => 'Takamatsu Area',
                'parent' => '370000',
                'children' => [
                    '3720100',
                    '3736400'
                ]
            ],
            '370002' => [
                'name' => '小豆',
                'enName' => 'Shozu',
                'parent' => '370000',
                'children' => [
                    '3732200',
                    '3732400'
                ]
            ],
            '370003' => [
                'name' => '東讃',
                'enName' => 'Tosan',
                'parent' => '370000',
                'children' => [
                    '3720600',
                    '3720700',
                    '3734100'
                ]
            ],
            '370004' => [
                'name' => '中讃',
                'enName' => 'Chusan',
                'parent' => '370000',
                'children' => [
                    '3720200',
                    '3720300',
                    '3720400',
                    '3738600',
                    '3738700',
                    '3740300',
                    '3740400',
                    '3740600'
                ]
            ],
            '370005' => [
                'name' => '西讃',
                'enName' => 'Seisan',
                'parent' => '370000',
                'children' => [
                    '3720500',
                    '3720800'
                ]
            ],
            '380010' => [
                'name' => '中予',
                'enName' => 'Chuyo',
                'parent' => '380010',
                'children' => [
                    '3820100',
                    '3821000',
                    '3821500',
                    '3838600',
                    '3840100',
                    '3840200'
                ]
            ],
            '380021' => [
                'name' => '東予東部',
                'enName' => 'Eastern Toyo',
                'parent' => '380020',
                'children' => [
                    '3820500',
                    '3820600',
                    '3821300'
                ]
            ],
            '380022' => [
                'name' => '東予西部',
                'enName' => 'Western Toyo',
                'parent' => '380020',
                'children' => [
                    '3820200',
                    '3835600'
                ]
            ],
            '380031' => [
                'name' => '南予北部',
                'enName' => 'Northern Nan-yo',
                'parent' => '380030',
                'children' => [
                    '3820400',
                    '3820700',
                    '3821400',
                    '3842200',
                    '3844200'
                ]
            ],
            '380032' => [
                'name' => '南予南部',
                'enName' => 'Southern Nan-yo',
                'parent' => '380030',
                'children' => [
                    '3820300',
                    '3848400',
                    '3848800',
                    '3850600'
                ]
            ],
            '390011' => [
                'name' => '高知中央',
                'enName' => 'Central Kochi',
                'parent' => '390010',
                'children' => [
                    '3920100',
                    '3920400',
                    '3920500',
                    '3920600',
                    '3921100',
                    '3921200',
                    '3938600',
                    '3941000'
                ]
            ],
            '390012' => [
                'name' => '嶺北',
                'enName' => 'Reihoku',
                'parent' => '390010',
                'children' => [
                    '3934100',
                    '3934400',
                    '3936300',
                    '3936400'
                ]
            ],
            '390013' => [
                'name' => '高吾北',
                'enName' => 'Kogohoku',
                'parent' => '390010',
                'children' => [
                    '3938700',
                    '3940200',
                    '3940300'
                ]
            ],
            '390021' => [
                'name' => '室戸',
                'enName' => 'Muroto',
                'parent' => '390020',
                'children' => [
                    '3920200',
                    '3930100'
                ]
            ],
            '390022' => [
                'name' => '安芸',
                'enName' => 'Aki',
                'parent' => '390020',
                'children' => [
                    '3920300',
                    '3930200',
                    '3930300',
                    '3930400',
                    '3930500',
                    '3930600',
                    '3930700'
                ]
            ],
            '390031' => [
                'name' => '幡多',
                'enName' => 'Hata',
                'parent' => '390030',
                'children' => [
                    '3920800',
                    '3920900',
                    '3921000',
                    '3942400',
                    '3942700',
                    '3942800'
                ]
            ],
            '390032' => [
                'name' => '高幡',
                'enName' => 'Koban',
                'parent' => '390030',
                'children' => [
                    '3940100',
                    '3940500',
                    '3941100',
                    '3941200'
                ]
            ],
            '400010' => [
                'name' => '福岡地方',
                'enName' => 'Fukuoka Region',
                'parent' => '400010',
                'children' => [
                    '4013000',
                    '4021700',
                    '4021800',
                    '4021900',
                    '4022000',
                    '4022100',
                    '4022300',
                    '4022400',
                    '4023000',
                    '4023100',
                    '4034100',
                    '4034200',
                    '4034300',
                    '4034400',
                    '4034500',
                    '4034800',
                    '4034900'
                ]
            ],
            '400021' => [
                'name' => '北九州・遠賀地区',
                'enName' => 'Kitakyushu Onga District',
                'parent' => '400020',
                'children' => [
                    '4010000',
                    '4021500',
                    '4038100',
                    '4038200',
                    '4038300',
                    '4038400'
                ]
            ],
            '400022' => [
                'name' => '京築',
                'enName' => 'Keichiku',
                'parent' => '400020',
                'children' => [
                    '4021300',
                    '4021400',
                    '4062100',
                    '4062500',
                    '4064200',
                    '4064600',
                    '4064700'
                ]
            ],
            '400030' => [
                'name' => '筑豊地方',
                'enName' => 'Chikuho Region',
                'parent' => '400030',
                'children' => [
                    '4020400',
                    '4020500',
                    '4020600',
                    '4022600',
                    '4022700',
                    '4040100',
                    '4040200',
                    '4042100',
                    '4060100',
                    '4060200',
                    '4060400',
                    '4060500',
                    '4060800',
                    '4060900',
                    '4061000'
                ]
            ],
            '400041' => [
                'name' => '筑後北部',
                'enName' => 'Northern Chikugo',
                'parent' => '400040',
                'children' => [
                    '4020300',
                    '4021600',
                    '4022500',
                    '4022800',
                    '4044700',
                    '4044800',
                    '4050300'
                ]
            ],
            '400042' => [
                'name' => '筑後南部',
                'enName' => 'Southern Chikugo',
                'parent' => '400040',
                'children' => [
                    '4020200',
                    '4020700',
                    '4021000',
                    '4021100',
                    '4021200',
                    '4022900',
                    '4052200',
                    '4054400'
                ]
            ],
            '410011' => [
                'name' => '佐賀多久地区',
                'enName' => 'Saga Taku District',
                'parent' => '410010',
                'children' => [
                    '4120100',
                    '4120400',
                    '4120800'
                ]
            ],
            '410012' => [
                'name' => '鳥栖地区',
                'enName' => 'Tosu District',
                'parent' => '410010',
                'children' => [
                    '4120300',
                    '4121000',
                    '4132700',
                    '4134100',
                    '4134500',
                    '4134600'
                ]
            ],
            '410013' => [
                'name' => '武雄地区',
                'enName' => 'Takeo District',
                'parent' => '410010',
                'children' => [
                    '4120600',
                    '4142300',
                    '4142400',
                    '4142500'
                ]
            ],
            '410014' => [
                'name' => '鹿島地区',
                'enName' => 'Kashima District',
                'parent' => '410010',
                'children' => [
                    '4120700',
                    '4120900',
                    '4144100'
                ]
            ],
            '410021' => [
                'name' => '唐津地区',
                'enName' => 'Karatsu District',
                'parent' => '410020',
                'children' => [
                    '4120200',
                    '4138700'
                ]
            ],
            '410022' => [
                'name' => '伊万里地区',
                'enName' => 'Imari District',
                'parent' => '410020',
                'children' => [
                    '4120500',
                    '4140100'
                ]
            ],
            '420011' => [
                'name' => '島原半島',
                'enName' => 'Shimabara Peninsula',
                'parent' => '420010',
                'children' => [
                    '4220300',
                    '4221300',
                    '4221400'
                ]
            ],
            '420012' => [
                'name' => '長崎地区',
                'enName' => 'Nagasaki District',
                'parent' => '420010',
                'children' => [
                    '4220100',
                    '4230700',
                    '4230800'
                ]
            ],
            '420013' => [
                'name' => '諫早・大村地区',
                'enName' => 'Isahaya Omura District',
                'parent' => '420010',
                'children' => [
                    '4220400',
                    '4220500'
                ]
            ],
            '420014' => [
                'name' => '西彼杵半島',
                'enName' => 'Nishisonogi Peninsula',
                'parent' => '420010',
                'children' => [
                    '4221201'
                ]
            ],
            '420021' => [
                'name' => '平戸・松浦地区',
                'enName' => 'Hirado Matsuura District',
                'parent' => '420020',
                'children' => [
                    '4220700',
                    '4220800'
                ]
            ],
            '420022' => [
                'name' => '佐世保・東彼地区',
                'enName' => 'Sasebo Tohi District',
                'parent' => '420020',
                'children' => [
                    '4220201',
                    '4232100',
                    '4232200',
                    '4232300',
                    '4239100'
                ]
            ],
            '420031' => [
                'name' => '壱岐',
                'enName' => 'Iki',
                'parent' => '420030',
                'children' => [
                    '4221000'
                ]
            ],
            '420032' => [
                'name' => '上対馬',
                'enName' => 'Kamitsushima',
                'parent' => '420030',
                'children' => [
                    '4220902'
                ]
            ],
            '420033' => [
                'name' => '下対馬',
                'enName' => 'Shimotsushima',
                'parent' => '420030',
                'children' => [
                    '4220901'
                ]
            ],
            '420041' => [
                'name' => '上五島',
                'enName' => 'Kamigoto',
                'parent' => '420040',
                'children' => [
                    '4220202',
                    '4221202',
                    '4238300',
                    '4241100'
                ]
            ],
            '420042' => [
                'name' => '下五島',
                'enName' => 'Shimogoto',
                'parent' => '420040',
                'children' => [
                    '4221100'
                ]
            ],
            '430011' => [
                'name' => '熊本市',
                'enName' => 'Kumamoto City',
                'parent' => '430010',
                'children' => [
                    '4310000'
                ]
            ],
            '430012' => [
                'name' => '山鹿菊池',
                'enName' => 'Yamaga Kikuchi',
                'parent' => '430010',
                'children' => [
                    '4320800',
                    '4321000',
                    '4321600',
                    '4340300',
                    '4340400'
                ]
            ],
            '430013' => [
                'name' => '荒尾玉名',
                'enName' => 'Arao Tamana',
                'parent' => '430010',
                'children' => [
                    '4320400',
                    '4320600',
                    '4336400',
                    '4336700',
                    '4336800',
                    '4336900'
                ]
            ],
            '430014' => [
                'name' => '上益城',
                'enName' => 'Kamimashiki',
                'parent' => '430010',
                'children' => [
                    '4343200',
                    '4344100',
                    '4344200',
                    '4344300',
                    '4344400',
                    '4344700'
                ]
            ],
            '430015' => [
                'name' => '宇城八代',
                'enName' => 'Uki Yatsushiro',
                'parent' => '430010',
                'children' => [
                    '4320200',
                    '4321100',
                    '4321300',
                    '4334800',
                    '4346800'
                ]
            ],
            '430020' => [
                'name' => '阿蘇地方',
                'enName' => 'Aso Region',
                'parent' => '430020',
                'children' => [
                    '4321400',
                    '4342300',
                    '4342400',
                    '4342500',
                    '4342800',
                    '4343300'
                ]
            ],
            '430031' => [
                'name' => '天草地方',
                'enName' => 'Amakusa Region',
                'parent' => '430030',
                'children' => [
                    '4321200',
                    '4321500',
                    '4353100'
                ]
            ],
            '430032' => [
                'name' => '芦北地方',
                'enName' => 'Ashikita Region',
                'parent' => '430030',
                'children' => [
                    '4320500',
                    '4348200',
                    '4348400'
                ]
            ],
            '430040' => [
                'name' => '球磨地方',
                'enName' => 'Kuma Region',
                'parent' => '430040',
                'children' => [
                    '4320300',
                    '4350100',
                    '4350500',
                    '4350600',
                    '4350700',
                    '4351000',
                    '4351100',
                    '4351200',
                    '4351300',
                    '4351400'
                ]
            ],
            '440010' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '440010',
                'children' => [
                    '4420100',
                    '4420200',
                    '4420600',
                    '4420700',
                    '4421000',
                    '4421300',
                    '4434100'
                ]
            ],
            '440020' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '440020',
                'children' => [
                    '4420300',
                    '4420900',
                    '4421100',
                    '4421400',
                    '4432200'
                ]
            ],
            '440031' => [
                'name' => '日田玖珠',
                'enName' => 'Hita Kusu',
                'parent' => '440030',
                'children' => [
                    '4420400',
                    '4446100',
                    '4446200'
                ]
            ],
            '440032' => [
                'name' => '竹田市',
                'enName' => 'Taketa City',
                'parent' => '440030',
                'children' => [
                    '4420800'
                ]
            ],
            '440041' => [
                'name' => '佐伯市',
                'enName' => 'Saiki City',
                'parent' => '440040',
                'children' => [
                    '4420500'
                ]
            ],
            '440042' => [
                'name' => '豊後大野市',
                'enName' => 'Bungoono City',
                'parent' => '440040',
                'children' => [
                    '4421200'
                ]
            ],
            '450011' => [
                'name' => '宮崎地区',
                'enName' => 'Miyazaki District',
                'parent' => '450010',
                'children' => [
                    '4520100',
                    '4538200',
                    '4538300'
                ]
            ],
            '450012' => [
                'name' => '日南・串間地区',
                'enName' => 'Nichinan Kushima District',
                'parent' => '450010',
                'children' => [
                    '4520400',
                    '4520700'
                ]
            ],
            '450021' => [
                'name' => '延岡・日向地区',
                'enName' => 'Nobeoka Hyuga District',
                'parent' => '450020',
                'children' => [
                    '4520300',
                    '4520600',
                    '4542100'
                ]
            ],
            '450022' => [
                'name' => '西都・高鍋地区',
                'enName' => 'Saito Takanabe District',
                'parent' => '450020',
                'children' => [
                    '4520800',
                    '4540100',
                    '4540200',
                    '4540400',
                    '4540500',
                    '4540600'
                ]
            ],
            '450031' => [
                'name' => '小林・えびの地区',
                'enName' => 'Kobayashi Ebino District',
                'parent' => '450030',
                'children' => [
                    '4520500',
                    '4520900',
                    '4536100'
                ]
            ],
            '450032' => [
                'name' => '都城地区',
                'enName' => 'Miyakonojo District',
                'parent' => '450030',
                'children' => [
                    '4520200',
                    '4534100'
                ]
            ],
            '450041' => [
                'name' => '高千穂地区',
                'enName' => 'Takachiho District',
                'parent' => '450040',
                'children' => [
                    '4544100',
                    '4544200',
                    '4544300'
                ]
            ],
            '450042' => [
                'name' => '椎葉・美郷地区',
                'enName' => 'Shiiba Misato District',
                'parent' => '450040',
                'children' => [
                    '4540300',
                    '4542900',
                    '4543000',
                    '4543100'
                ]
            ],
            '460011' => [
                'name' => '鹿児島・日置',
                'enName' => 'Kagoshima Hioki',
                'parent' => '460010',
                'children' => [
                    '4620100',
                    '4621600',
                    '4621900'
                ]
            ],
            '460012' => [
                'name' => '出水・伊佐',
                'enName' => 'Izumi Isa',
                'parent' => '460010',
                'children' => [
                    '4620600',
                    '4620800',
                    '4622400',
                    '4640400'
                ]
            ],
            '460013' => [
                'name' => '川薩・姶良',
                'enName' => 'Sensatsu Aira',
                'parent' => '460010',
                'children' => [
                    '4621501',
                    '4621800',
                    '4622500',
                    '4639200',
                    '4645200'
                ]
            ],
            '460014' => [
                'name' => '甑島',
                'enName' => 'Koshikishima',
                'parent' => '460010',
                'children' => [
                    '4621502'
                ]
            ],
            '460015' => [
                'name' => '指宿・川辺',
                'enName' => 'Ibusuki Kawanabe',
                'parent' => '460010',
                'children' => [
                    '4620400',
                    '4621000',
                    '4622000',
                    '4622300'
                ]
            ],
            '460021' => [
                'name' => '曽於',
                'enName' => 'Soo',
                'parent' => '460020',
                'children' => [
                    '4621700',
                    '4622100',
                    '4646800'
                ]
            ],
            '460022' => [
                'name' => '肝属',
                'enName' => 'Kimotsuki',
                'parent' => '460020',
                'children' => [
                    '4620300',
                    '4621400',
                    '4648200',
                    '4649000',
                    '4649100',
                    '4649200'
                ]
            ],
            '460031' => [
                'name' => '種子島地方',
                'enName' => 'Tanegashima Region',
                'parent' => '460030',
                'children' => [
                    '4621300',
                    '4630300',
                    '4650100',
                    '4650200'
                ]
            ],
            '460032' => [
                'name' => '屋久島地方',
                'enName' => 'Yakushima Region',
                'parent' => '460030',
                'children' => [
                    '4650500'
                ]
            ],
            '460041' => [
                'name' => '北部',
                'enName' => 'Northern Region',
                'parent' => '460040',
                'children' => [
                    '4622200',
                    '4652300',
                    '4652400',
                    '4652500',
                    '4652700',
                    '4652900'
                ]
            ],
            '460042' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '460040',
                'children' => [
                    '4653000',
                    '4653100',
                    '4653200',
                    '4653300',
                    '4653400',
                    '4653500'
                ]
            ],
            '460043' => [
                'name' => '十島村',
                'enName' => 'Toshima Village',
                'parent' => '460040',
                'children' => [
                    '4630400'
                ]
            ],
            '471011' => [
                'name' => '南部',
                'enName' => 'Southern Region',
                'parent' => '471010',
                'children' => [
                    '4720100',
                    '4720800',
                    '4721000',
                    '4721200',
                    '4721500',
                    '4732900',
                    '4734800',
                    '4735000',
                    '4736200'
                ]
            ],
            '471012' => [
                'name' => '中部',
                'enName' => 'Central Region',
                'parent' => '471010',
                'children' => [
                    '4720500',
                    '4721100',
                    '4721300',
                    '4732400',
                    '4732500',
                    '4732600',
                    '4732700',
                    '4732800'
                ]
            ],
            '471013' => [
                'name' => '慶良間・粟国諸島',
                'enName' => 'Kerama Aguni Islands',
                'parent' => '471010',
                'children' => [
                    '4735300',
                    '4735400',
                    '4735500',
                    '4735600'
                ]
            ],
            '471021' => [
                'name' => '伊是名・伊平屋',
                'enName' => 'Izena Iheya',
                'parent' => '471020',
                'children' => [
                    '4735900',
                    '4736000'
                ]
            ],
            '471022' => [
                'name' => '国頭地区',
                'enName' => 'Kunigami District',
                'parent' => '471020',
                'children' => [
                    '4730100',
                    '4730200',
                    '4730300'
                ]
            ],
            '471023' => [
                'name' => '名護地区',
                'enName' => 'Nago District',
                'parent' => '471020',
                'children' => [
                    '4720900',
                    '4730600',
                    '4730800',
                    '4731500'
                ]
            ],
            '471024' => [
                'name' => '恩納・金武地区',
                'enName' => 'Onna Kin District',
                'parent' => '471020',
                'children' => [
                    '4731100',
                    '4731300',
                    '4731400'
                ]
            ],
            '471030' => [
                'name' => '久米島',
                'enName' => 'Kumejima',
                'parent' => '471030',
                'children' => [
                    '4736100'
                ]
            ],
            '472000' => [
                'name' => '大東島地方',
                'enName' => 'Daitojima Region',
                'parent' => '472000',
                'children' => [
                    '4735700',
                    '4735800'
                ]
            ],
            '473001' => [
                'name' => '宮古島',
                'enName' => 'Miyakojima',
                'parent' => '473000',
                'children' => [
                    '4721400'
                ]
            ],
            '473002' => [
                'name' => '多良間島',
                'enName' => 'Taramajima',
                'parent' => '473000',
                'children' => [
                    '4737500'
                ]
            ],
            '474011' => [
                'name' => '石垣市',
                'enName' => 'Ishigaki City',
                'parent' => '474010',
                'children' => [
                    '4720700'
                ]
            ],
            '474012' => [
                'name' => '竹富町',
                'enName' => 'Taketomi Town',
                'parent' => '474010',
                'children' => [
                    '4738100'
                ]
            ],
            '474020' => [
                'name' => '与那国島地方',
                'enName' => 'Yonagunijima Region',
                'parent' => '474020',
                'children' => [
                    '4738200'
                ]
            ],
            '011011' => [
                'name' => '宗谷北部',
                'enName' => 'Northern Soya',
                'parent' => '011000',
                'children' => [
                    '0121400',
                    '0151100',
                    '0151600',
                    '0152000'
                ]
            ],
            '011012' => [
                'name' => '宗谷南部',
                'enName' => 'Southern Soya',
                'parent' => '011000',
                'children' => [
                    '0151200',
                    '0151300',
                    '0151400'
                ]
            ],
            '011013' => [
                'name' => '利尻・礼文',
                'enName' => 'Rishiri Rebun',
                'parent' => '011000',
                'children' => [
                    '0151700',
                    '0151800',
                    '0151900'
                ]
            ],
            '012011' => [
                'name' => '上川北部',
                'enName' => 'Northern Kamikawa',
                'parent' => '012010',
                'children' => [
                    '0122000',
                    '0122100',
                    '0146400',
                    '0146500',
                    '0146800',
                    '0146900',
                    '0147000',
                    '0147100',
                    '0147200'
                ]
            ],
            '012012' => [
                'name' => '上川中部',
                'enName' => 'Middle Kamikawa',
                'parent' => '012010',
                'children' => [
                    '0120400',
                    '0145200',
                    '0145300',
                    '0145400',
                    '0145500',
                    '0145600',
                    '0145700',
                    '0145800',
                    '0145900'
                ]
            ],
            '012013' => [
                'name' => '上川南部',
                'enName' => 'Southern Kamikawa',
                'parent' => '012010',
                'children' => [
                    '0122900',
                    '0146000',
                    '0146100',
                    '0146200',
                    '0146300'
                ]
            ],
            '012021' => [
                'name' => '留萌北部',
                'enName' => 'Northern Rumoi',
                'parent' => '012020',
                'children' => [
                    '0148600',
                    '0148700'
                ]
            ],
            '012022' => [
                'name' => '留萌中部',
                'enName' => 'Middle Rumoi',
                'parent' => '012020',
                'children' => [
                    '0148300',
                    '0148401',
                    '0148402',
                    '0148500'
                ]
            ],
            '012023' => [
                'name' => '留萌南部',
                'enName' => 'Southern Rumoi',
                'parent' => '012020',
                'children' => [
                    '0121200',
                    '0148100',
                    '0148200'
                ]
            ],
            '013011' => [
                'name' => '網走西部',
                'enName' => 'Western Abashiri',
                'parent' => '013010',
                'children' => [
                    '0120802',
                    '0121100',
                    '0155200',
                    '0156400'
                ]
            ],
            '013012' => [
                'name' => '網走東部',
                'enName' => 'Eastern Abashiri',
                'parent' => '013010',
                'children' => [
                    '0154500',
                    '0154600',
                    '0154700'
                ]
            ],
            '013013' => [
                'name' => '網走南部',
                'enName' => 'Southern Abashiri',
                'parent' => '013010',
                'children' => [
                    '0154300',
                    '0154400'
                ]
            ],
            '013020' => [
                'name' => '北見地方',
                'enName' => 'Kitami Region',
                'parent' => '013020',
                'children' => [
                    '0120801',
                    '0154900',
                    '0155000'
                ]
            ],
            '013031' => [
                'name' => '紋別北部',
                'enName' => 'Northern Mombetsu',
                'parent' => '013030',
                'children' => [
                    '0121900',
                    '0156000',
                    '0156100',
                    '0156200',
                    '0156300'
                ]
            ],
            '013032' => [
                'name' => '紋別南部',
                'enName' => 'Southern Mombetsu',
                'parent' => '013030',
                'children' => [
                    '0155500',
                    '0155900'
                ]
            ],
            '014011' => [
                'name' => '根室北部',
                'enName' => 'Northern Nemuro',
                'parent' => '014010',
                'children' => [
                    '0169200',
                    '0169300',
                    '0169400'
                ]
            ],
            '014012' => [
                'name' => '根室中部',
                'enName' => 'Middle Central',
                'parent' => '014010',
                'children' => [
                    '0169100'
                ]
            ],
            '014013' => [
                'name' => '根室南部',
                'enName' => 'Southern Nemuro',
                'parent' => '014010',
                'children' => [
                    '0122300'
                ]
            ],
            '014021' => [
                'name' => '釧路北部',
                'enName' => 'Northern Kushiro',
                'parent' => '014020',
                'children' => [
                    '0166500'
                ]
            ],
            '014022' => [
                'name' => '釧路中部',
                'enName' => 'Middle Kushiro',
                'parent' => '014020',
                'children' => [
                    '0120602',
                    '0166400',
                    '0166700'
                ]
            ],
            '014023' => [
                'name' => '釧路南東部',
                'enName' => 'South-eastern Kushiro',
                'parent' => '014020',
                'children' => [
                    '0166200',
                    '0166300'
                ]
            ],
            '014024' => [
                'name' => '釧路南西部',
                'enName' => 'South-western Kushiro',
                'parent' => '014020',
                'children' => [
                    '0120601',
                    '0120603',
                    '0166100',
                    '0166800'
                ]
            ],
            '014031' => [
                'name' => '十勝北部',
                'enName' => 'Northern Tokachi',
                'parent' => '014030',
                'children' => [
                    '0163300',
                    '0163400',
                    '0163500',
                    '0164700',
                    '0164800'
                ]
            ],
            '014032' => [
                'name' => '十勝中部',
                'enName' => 'Middle Tokachi',
                'parent' => '014030',
                'children' => [
                    '0120700',
                    '0163100',
                    '0163200',
                    '0163600',
                    '0163700',
                    '0164300',
                    '0164400',
                    '0164500',
                    '0164600',
                    '0164900'
                ]
            ],
            '014033' => [
                'name' => '十勝南部',
                'enName' => 'Southern Tokachi',
                'parent' => '014030',
                'children' => [
                    '0163800',
                    '0163900',
                    '0164100',
                    '0164200'
                ]
            ],
            '015011' => [
                'name' => '胆振西部',
                'enName' => 'Western Iburi',
                'parent' => '015010',
                'children' => [
                    '0123301',
                    '0123302',
                    '0157100',
                    '0157500',
                    '0158400'
                ]
            ],
            '015012' => [
                'name' => '胆振中部',
                'enName' => 'Middle Iburi',
                'parent' => '015010',
                'children' => [
                    '0120500',
                    '0121300',
                    '0123000',
                    '0157800'
                ]
            ],
            '015013' => [
                'name' => '胆振東部',
                'enName' => 'Eastern Iburi',
                'parent' => '015010',
                'children' => [
                    '0158100',
                    '0158500',
                    '0158600'
                ]
            ],
            '015021' => [
                'name' => '日高西部',
                'enName' => 'Western Hidaka',
                'parent' => '015020',
                'children' => [
                    '0160101',
                    '0160102',
                    '0160200'
                ]
            ],
            '015022' => [
                'name' => '日高中部',
                'enName' => 'Middle Hidaka',
                'parent' => '015020',
                'children' => [
                    '0160400',
                    '0161000'
                ]
            ],
            '015023' => [
                'name' => '日高東部',
                'enName' => 'Eastern Hidaka',
                'parent' => '015020',
                'children' => [
                    '0160700',
                    '0160800',
                    '0160900'
                ]
            ],
            '016011' => [
                'name' => '石狩北部',
                'enName' => 'Northern Ishikari',
                'parent' => '016010',
                'children' => [
                    '0123500',
                    '0130300',
                    '0130400'
                ]
            ],
            '016012' => [
                'name' => '石狩中部',
                'enName' => 'Middle Ishikari',
                'parent' => '016010',
                'children' => [
                    '0110000',
                    '0121700'
                ]
            ],
            '016013' => [
                'name' => '石狩南部',
                'enName' => 'Southern Ishikari',
                'parent' => '016010',
                'children' => [
                    '0122400',
                    '0123100',
                    '0123400'
                ]
            ],
            '016021' => [
                'name' => '北空知',
                'enName' => 'Northern Sorachi',
                'parent' => '016020',
                'children' => [
                    '0122800',
                    '0143300',
                    '0143400',
                    '0143700',
                    '0143800'
                ]
            ],
            '016022' => [
                'name' => '中空知',
                'enName' => 'Middle Sorachi',
                'parent' => '016020',
                'children' => [
                    '0121600',
                    '0121800',
                    '0122500',
                    '0122600',
                    '0122700',
                    '0142400',
                    '0142500',
                    '0143100',
                    '0143200',
                    '0143600'
                ]
            ],
            '016023' => [
                'name' => '南空知',
                'enName' => 'Southern Sorachi',
                'parent' => '016020',
                'children' => [
                    '0120900',
                    '0121000',
                    '0121500',
                    '0122200',
                    '0142300',
                    '0142700',
                    '0142800',
                    '0142900',
                    '0143000'
                ]
            ],
            '016031' => [
                'name' => '後志北部',
                'enName' => 'Northern Shiribeshi',
                'parent' => '016030',
                'children' => [
                    '0120300',
                    '0140500',
                    '0140600',
                    '0140700',
                    '0140800',
                    '0140900'
                ]
            ],
            '016032' => [
                'name' => '羊蹄山麓',
                'enName' => 'The foot of Mt. Yotei',
                'parent' => '016030',
                'children' => [
                    '0139500',
                    '0139600',
                    '0139700',
                    '0139800',
                    '0139900',
                    '0140000'
                ]
            ],
            '016033' => [
                'name' => '後志西部',
                'enName' => 'Western Shiribeshi',
                'parent' => '016030',
                'children' => [
                    '0139100',
                    '0139200',
                    '0139300',
                    '0139400',
                    '0140100',
                    '0140200',
                    '0140300',
                    '0140400'
                ]
            ],
            '017011' => [
                'name' => '渡島北部',
                'enName' => 'Northern Oshima',
                'parent' => '017010',
                'children' => [
                    '0134601',
                    '0134700'
                ]
            ],
            '017012' => [
                'name' => '渡島東部',
                'enName' => 'Eastern Oshima',
                'parent' => '017010',
                'children' => [
                    '0120200',
                    '0123600',
                    '0133700',
                    '0134300',
                    '0134500'
                ]
            ],
            '017013' => [
                'name' => '渡島西部',
                'enName' => 'Western Oshima',
                'parent' => '017010',
                'children' => [
                    '0133100',
                    '0133200',
                    '0133300',
                    '0133400'
                ]
            ],
            '017021' => [
                'name' => '檜山北部',
                'enName' => 'Northern Hiyama',
                'parent' => '017020',
                'children' => [
                    '0134602',
                    '0137000',
                    '0137100'
                ]
            ],
            '017022' => [
                'name' => '檜山南部',
                'enName' => 'Southern Hiyama',
                'parent' => '017020',
                'children' => [
                    '0136100',
                    '0136200',
                    '0136300',
                    '0136400'
                ]
            ],
            '017023' => [
                'name' => '檜山奥尻島',
                'enName' => 'Hiyama Okushirito',
                'parent' => '017020',
                'children' => [
                    '0136700'
                ]
            ],
            '020011' => [
                'name' => '東青津軽',
                'enName' => 'Tosei Tsugaru',
                'parent' => '020010',
                'children' => [
                    '0220100',
                    '0230100',
                    '0230300',
                    '0230400',
                    '0230700'
                ]
            ],
            '020012' => [
                'name' => '北五津軽',
                'enName' => 'Kitago Tsugaru',
                'parent' => '020010',
                'children' => [
                    '0220500',
                    '0238100',
                    '0238400',
                    '0238700'
                ]
            ],
            '020013' => [
                'name' => '西津軽',
                'enName' => 'Nishitsugaru',
                'parent' => '020010',
                'children' => [
                    '0220900',
                    '0232100',
                    '0232300'
                ]
            ],
            '020014' => [
                'name' => '中南津軽',
                'enName' => 'Chunan Tsugaru',
                'parent' => '020010',
                'children' => [
                    '0220200',
                    '0220400',
                    '0221000',
                    '0234300',
                    '0236100',
                    '0236200',
                    '0236700'
                ]
            ],
            '020020' => [
                'name' => '下北',
                'enName' => 'Shimokita',
                'parent' => '020020',
                'children' => [
                    '0220800',
                    '0242300',
                    '0242400',
                    '0242500',
                    '0242600'
                ]
            ],
            '020031' => [
                'name' => '三八',
                'enName' => 'Sanpachi',
                'parent' => '020030',
                'children' => [
                    '0220300',
                    '0220700',
                    '0240500',
                    '0241200',
                    '0244100',
                    '0244200',
                    '0244300',
                    '0244500',
                    '0244600',
                    '0245000'
                ]
            ],
            '020032' => [
                'name' => '上北',
                'enName' => 'Kamikita',
                'parent' => '020030',
                'children' => [
                    '0220600',
                    '0240100',
                    '0240200',
                    '0240600',
                    '0240800',
                    '0241100'
                ]
            ],
            '030011' => [
                'name' => '盛岡地域',
                'enName' => 'Morioka Area',
                'parent' => '030010',
                'children' => [
                    '0320100',
                    '0321400',
                    '0321600',
                    '0330100',
                    '0330200',
                    '0330300',
                    '0332100',
                    '0332200'
                ]
            ],
            '030012' => [
                'name' => '二戸地域',
                'enName' => 'Ninohe Area',
                'parent' => '030010',
                'children' => [
                    '0321300',
                    '0350100',
                    '0350600',
                    '0352400'
                ]
            ],
            '030013' => [
                'name' => '花北地域',
                'enName' => 'Hanakita Area',
                'parent' => '030010',
                'children' => [
                    '0320500',
                    '0320600',
                    '0336600'
                ]
            ],
            '030014' => [
                'name' => '遠野地域',
                'enName' => 'Tono Area',
                'parent' => '030010',
                'children' => [
                    '0320800'
                ]
            ],
            '030015' => [
                'name' => '奥州金ケ崎地域',
                'enName' => 'Oshu Kanegasaki Area',
                'parent' => '030010',
                'children' => [
                    '0321500',
                    '0338100'
                ]
            ],
            '030016' => [
                'name' => '両磐地域',
                'enName' => 'Ryoban Area',
                'parent' => '030010',
                'children' => [
                    '0320900',
                    '0340200'
                ]
            ],
            '030021' => [
                'name' => '久慈地域',
                'enName' => 'Kuji Area',
                'parent' => '030020',
                'children' => [
                    '0320700',
                    '0348500',
                    '0350300',
                    '0350700'
                ]
            ],
            '030022' => [
                'name' => '宮古地域',
                'enName' => 'Miyako Area',
                'parent' => '030020',
                'children' => [
                    '0320200',
                    '0348200',
                    '0348300',
                    '0348400'
                ]
            ],
            '030031' => [
                'name' => '釜石地域',
                'enName' => 'Kamaishi Area',
                'parent' => '030030',
                'children' => [
                    '0321100',
                    '0346100'
                ]
            ],
            '030032' => [
                'name' => '大船渡地域',
                'enName' => 'Ofunato Area',
                'parent' => '030030',
                'children' => [
                    '0320300',
                    '0321000',
                    '0344100'
                ]
            ],
            '040011' => [
                'name' => '東部仙台',
                'enName' => 'Eastern Sendai',
                'parent' => '040010',
                'children' => [
                    '0410001',
                    '0420300',
                    '0420700',
                    '0420900',
                    '0421100',
                    '0421600',
                    '0436100',
                    '0436200',
                    '0440100',
                    '0440400',
                    '0440600',
                    '0442101',
                    '0442200'
                ]
            ],
            '040012' => [
                'name' => '石巻地域',
                'enName' => 'Ishinomaki Area',
                'parent' => '040010',
                'children' => [
                    '0420200',
                    '0421400',
                    '0458100'
                ]
            ],
            '040013' => [
                'name' => '東部大崎',
                'enName' => 'Eastern Osaki',
                'parent' => '040010',
                'children' => [
                    '0421501',
                    '0450100',
                    '0450500'
                ]
            ],
            '040014' => [
                'name' => '気仙沼地域',
                'enName' => 'Kesennuma Area',
                'parent' => '040010',
                'children' => [
                    '0420500',
                    '0460600'
                ]
            ],
            '040015' => [
                'name' => '東部仙南',
                'enName' => 'Eastern Sennan',
                'parent' => '040010',
                'children' => [
                    '0420800',
                    '0432100',
                    '0432200',
                    '0432300',
                    '0434100'
                ]
            ],
            '040016' => [
                'name' => '登米・東部栗原',
                'enName' => 'Tome and Eastern Kurihara',
                'parent' => '040010',
                'children' => [
                    '0421200',
                    '0421301'
                ]
            ],
            '040021' => [
                'name' => '西部仙台',
                'enName' => 'Western Sendai',
                'parent' => '040020',
                'children' => [
                    '0410002',
                    '0442102',
                    '0442400'
                ]
            ],
            '040022' => [
                'name' => '西部仙南',
                'enName' => 'Western Sennan',
                'parent' => '040020',
                'children' => [
                    '0420600',
                    '0430100',
                    '0430200',
                    '0432400'
                ]
            ],
            '040023' => [
                'name' => '西部大崎',
                'enName' => 'Western Osaki',
                'parent' => '040020',
                'children' => [
                    '0421502',
                    '0444400',
                    '0444500'
                ]
            ],
            '040024' => [
                'name' => '西部栗原',
                'enName' => 'Western Kurihara',
                'parent' => '040020',
                'children' => [
                    '0421302'
                ]
            ],
            '050011' => [
                'name' => '秋田中央地域',
                'enName' => 'Akita Central Area',
                'parent' => '050010',
                'children' => [
                    '0520100',
                    '0520600',
                    '0521100',
                    '0536100',
                    '0536300',
                    '0536600',
                    '0536800'
                ]
            ],
            '050012' => [
                'name' => '能代山本地域',
                'enName' => 'Noshiro Yamamoto Area',
                'parent' => '050010',
                'children' => [
                    '0520200',
                    '0534600',
                    '0534800',
                    '0534900'
                ]
            ],
            '050013' => [
                'name' => '本荘由利地域',
                'enName' => 'Honjo Yuri Area',
                'parent' => '050010',
                'children' => [
                    '0521000',
                    '0521400'
                ]
            ],
            '050021' => [
                'name' => '北秋鹿角地域',
                'enName' => 'Hokusyu Kazuno Area',
                'parent' => '050020',
                'children' => [
                    '0520400',
                    '0520900',
                    '0521300',
                    '0530300',
                    '0532700'
                ]
            ],
            '050022' => [
                'name' => '仙北平鹿地域',
                'enName' => 'Semboku Hiraka Area',
                'parent' => '050020',
                'children' => [
                    '0520300',
                    '0521200',
                    '0521500',
                    '0543400'
                ]
            ],
            '050023' => [
                'name' => '湯沢雄勝地域',
                'enName' => 'Yuzawa Ogachi Area',
                'parent' => '050020',
                'children' => [
                    '0520700',
                    '0546300',
                    '0546400'
                ]
            ],
            '060011' => [
                'name' => '東南村山',
                'enName' => 'South-eastern Murayama',
                'parent' => '060010',
                'children' => [
                    '0620100',
                    '0620700',
                    '0621000',
                    '0630100',
                    '0630200'
                ]
            ],
            '060012' => [
                'name' => '北村山',
                'enName' => 'Northern Murayama',
                'parent' => '060010',
                'children' => [
                    '0620800',
                    '0621100',
                    '0621200',
                    '0634100'
                ]
            ],
            '060013' => [
                'name' => '西村山',
                'enName' => 'Western Murayama',
                'parent' => '060010',
                'children' => [
                    '0620600',
                    '0632100',
                    '0632200',
                    '0632300',
                    '0632400'
                ]
            ],
            '060021' => [
                'name' => '東南置賜',
                'enName' => 'South-eastern Okitama',
                'parent' => '060020',
                'children' => [
                    '0620200',
                    '0621300',
                    '0638100',
                    '0638200'
                ]
            ],
            '060022' => [
                'name' => '西置賜',
                'enName' => 'Western Okitama',
                'parent' => '060020',
                'children' => [
                    '0620900',
                    '0640100',
                    '0640200',
                    '0640300'
                ]
            ],
            '060031' => [
                'name' => '庄内北部',
                'enName' => 'Northern Shonai',
                'parent' => '060030',
                'children' => [
                    '0620400',
                    '0646100'
                ]
            ],
            '060032' => [
                'name' => '庄内南部',
                'enName' => 'Southern Shonai',
                'parent' => '060030',
                'children' => [
                    '0620300',
                    '0642600',
                    '0642800'
                ]
            ],
            '060040' => [
                'name' => '最上',
                'enName' => 'Mogami',
                'parent' => '060040',
                'children' => [
                    '0620500',
                    '0636100',
                    '0636200',
                    '0636300',
                    '0636400',
                    '0636500',
                    '0636600',
                    '0636700'
                ]
            ],
            '070011' => [
                'name' => '中通り北部',
                'enName' => 'Northern Nakadori',
                'parent' => '070010',
                'children' => [
                    '0720100',
                    '0721300',
                    '0730100',
                    '0730300',
                    '0730800'
                ]
            ],
            '070012' => [
                'name' => '中通り中部',
                'enName' => 'Central Nakadori',
                'parent' => '070010',
                'children' => [
                    '0720301',
                    '0720700',
                    '0721000',
                    '0721100',
                    '0721400',
                    '0732200',
                    '0734200',
                    '0734401',
                    '0752100',
                    '0752200'
                ]
            ],
            '070013' => [
                'name' => '中通り南部',
                'enName' => 'Southern Nakadori',
                'parent' => '070010',
                'children' => [
                    '0720500',
                    '0746100',
                    '0746400',
                    '0746500',
                    '0746600',
                    '0748100',
                    '0748200',
                    '0748300',
                    '0748400',
                    '0750100',
                    '0750200',
                    '0750300',
                    '0750400',
                    '0750500'
                ]
            ],
            '070021' => [
                'name' => '浜通り北部',
                'enName' => 'Northern Hamadori',
                'parent' => '070020',
                'children' => [
                    '0720900',
                    '0721200',
                    '0756100',
                    '0756400'
                ]
            ],
            '070022' => [
                'name' => '浜通り中部',
                'enName' => 'Central Hamadori',
                'parent' => '070020',
                'children' => [
                    '0754100',
                    '0754200',
                    '0754300',
                    '0754400',
                    '0754500',
                    '0754600',
                    '0754700',
                    '0754800'
                ]
            ],
            '070023' => [
                'name' => '浜通り南部',
                'enName' => 'Southern Hamadori',
                'parent' => '070020',
                'children' => [
                    '0720400'
                ]
            ],
            '070031' => [
                'name' => '会津北部',
                'enName' => 'Northern Aizu',
                'parent' => '070030',
                'children' => [
                    '0720800',
                    '0740200',
                    '0740500',
                    '0740700',
                    '0740800'
                ]
            ],
            '070032' => [
                'name' => '会津中部',
                'enName' => 'Central Aizu',
                'parent' => '070030',
                'children' => [
                    '0720200',
                    '0720302',
                    '0742100',
                    '0742200',
                    '0742300',
                    '0744400',
                    '0744500',
                    '0744600',
                    '0744700'
                ]
            ],
            '070033' => [
                'name' => '会津南部',
                'enName' => 'Southern Aizu',
                'parent' => '070030',
                'children' => [
                    '0734402',
                    '0736200',
                    '0736400',
                    '0736700',
                    '0736800'
                ]
            ],
            '080011' => [
                'name' => '県央地域',
                'enName' => 'Ken-o Area',
                'parent' => '080010',
                'children' => [
                    '0820100',
                    '0821600',
                    '0823600',
                    '0830200',
                    '0830900',
                    '0831000'
                ]
            ],
            '080012' => [
                'name' => '県北地域',
                'enName' => 'Kempoku Area',
                'parent' => '080010',
                'children' => [
                    '0820200',
                    '0821200',
                    '0821400',
                    '0821500',
                    '0822100',
                    '0822500',
                    '0822600',
                    '0834100',
                    '0836400'
                ]
            ],
            '080021' => [
                'name' => '鹿行地域',
                'enName' => 'Rokko Area',
                'parent' => '080020',
                'children' => [
                    '0822200',
                    '0822300',
                    '0823200',
                    '0823300',
                    '0823400'
                ]
            ],
            '080022' => [
                'name' => '県南地域',
                'enName' => 'Kennan Area',
                'parent' => '080020',
                'children' => [
                    '0820300',
                    '0820500',
                    '0820800',
                    '0821700',
                    '0821900',
                    '0822000',
                    '0822400',
                    '0822900',
                    '0823000',
                    '0823500',
                    '0844200',
                    '0844300',
                    '0844700',
                    '0856400'
                ]
            ],
            '080023' => [
                'name' => '県西地域',
                'enName' => 'Kensei Area',
                'parent' => '080020',
                'children' => [
                    '0820400',
                    '0820700',
                    '0821000',
                    '0821100',
                    '0822700',
                    '0822800',
                    '0823100',
                    '0852100',
                    '0854200',
                    '0854600'
                ]
            ],
            '090011' => [
                'name' => '県央部',
                'enName' => 'Ken-o part',
                'parent' => '090010',
                'children' => [
                    '0920100',
                    '0921400',
                    '0930100',
                    '0938600'
                ]
            ],
            '090012' => [
                'name' => '南東部',
                'enName' => 'South-eastern Region',
                'parent' => '090010',
                'children' => [
                    '0920900',
                    '0921500',
                    '0934200',
                    '0934300',
                    '0934400',
                    '0934500',
                    '0941100'
                ]
            ],
            '090013' => [
                'name' => '南西部',
                'enName' => 'South-western Region',
                'parent' => '090010',
                'children' => [
                    '0920200',
                    '0920300',
                    '0920400',
                    '0920500',
                    '0920800',
                    '0921600',
                    '0936100',
                    '0936400'
                ]
            ],
            '090021' => [
                'name' => '那須地域',
                'enName' => 'Nasu Area',
                'parent' => '090020',
                'children' => [
                    '0921000',
                    '0921100',
                    '0921300',
                    '0938400',
                    '0940700'
                ]
            ],
            '090022' => [
                'name' => '日光市',
                'enName' => 'Nikko City',
                'parent' => '090020',
                'children' => [
                    '0920601',
                    '0920602',
                    '0920603',
                    '0920604',
                    '0920605'
                ]
            ]
        ],
        'class20s' => [
            '1020100' => [
                'name' => '前橋市',
                'enName' => 'Maebashi City',
                'kana' => 'まえばしし',
                'parent' => '100011'
            ],
            '1020200' => [
                'name' => '高崎市',
                'enName' => 'Takasaki City',
                'kana' => 'たかさきし',
                'parent' => '100013'
            ],
            '1020300' => [
                'name' => '桐生市',
                'enName' => 'Kiryu City',
                'kana' => 'きりゅうし',
                'parent' => '100011'
            ],
            '1020400' => [
                'name' => '伊勢崎市',
                'enName' => 'Isesaki City',
                'kana' => 'いせさきし',
                'parent' => '100012'
            ],
            '1020500' => [
                'name' => '太田市',
                'enName' => 'Ota City',
                'kana' => 'おおたし',
                'parent' => '100012'
            ],
            '1020600' => [
                'name' => '沼田市',
                'enName' => 'Numata City',
                'kana' => 'ぬまたし',
                'parent' => '100021'
            ],
            '1020700' => [
                'name' => '館林市',
                'enName' => 'Tatebayashi City',
                'kana' => 'たてばやしし',
                'parent' => '100012'
            ],
            '1020800' => [
                'name' => '渋川市',
                'enName' => 'Shibukawa City',
                'kana' => 'しぶかわし',
                'parent' => '100011'
            ],
            '1020900' => [
                'name' => '藤岡市',
                'enName' => 'Fujioka City',
                'kana' => 'ふじおかし',
                'parent' => '100013'
            ],
            '1021000' => [
                'name' => '富岡市',
                'enName' => 'Tomioka City',
                'kana' => 'とみおかし',
                'parent' => '100013'
            ],
            '1021100' => [
                'name' => '安中市',
                'enName' => 'Annaka City',
                'kana' => 'あんなかし',
                'parent' => '100013'
            ],
            '1021200' => [
                'name' => 'みどり市',
                'enName' => 'Midori City',
                'kana' => 'みどりし',
                'parent' => '100011'
            ],
            '1034400' => [
                'name' => '榛東村',
                'enName' => 'Shinto Village',
                'kana' => 'しんとうむら',
                'parent' => '100011'
            ],
            '1034500' => [
                'name' => '吉岡町',
                'enName' => 'Yoshioka Town',
                'kana' => 'よしおかまち',
                'parent' => '100011'
            ],
            '1036600' => [
                'name' => '上野村',
                'enName' => 'Ueno Village',
                'kana' => 'うえのむら',
                'parent' => '100013'
            ],
            '1036700' => [
                'name' => '神流町',
                'enName' => 'Kanna Town',
                'kana' => 'かんなまち',
                'parent' => '100013'
            ],
            '1038200' => [
                'name' => '下仁田町',
                'enName' => 'Shimonita Town',
                'kana' => 'しもにたまち',
                'parent' => '100013'
            ],
            '1038300' => [
                'name' => '南牧村',
                'enName' => 'Nammoku Village',
                'kana' => 'なんもくむら',
                'parent' => '100013'
            ],
            '1038400' => [
                'name' => '甘楽町',
                'enName' => 'Kanra Town',
                'kana' => 'かんらまち',
                'parent' => '100013'
            ],
            '1042100' => [
                'name' => '中之条町',
                'enName' => 'Nakanojo Town',
                'kana' => 'なかのじょうまち',
                'parent' => '100022'
            ],
            '1042400' => [
                'name' => '長野原町',
                'enName' => 'Naganohara Town',
                'kana' => 'ながのはらまち',
                'parent' => '100022'
            ],
            '1042500' => [
                'name' => '嬬恋村',
                'enName' => 'Tsumagoi Village',
                'kana' => 'つまごいむら',
                'parent' => '100022'
            ],
            '1042600' => [
                'name' => '草津町',
                'enName' => 'Kusatsu Town',
                'kana' => 'くさつまち',
                'parent' => '100022'
            ],
            '1042800' => [
                'name' => '高山村',
                'enName' => 'Takayama Village',
                'kana' => 'たかやまむら',
                'parent' => '100022'
            ],
            '1042900' => [
                'name' => '東吾妻町',
                'enName' => 'Higashiagatsuma Town',
                'kana' => 'ひがしあがつままち',
                'parent' => '100022'
            ],
            '1044300' => [
                'name' => '片品村',
                'enName' => 'Katashina Village',
                'kana' => 'かたしなむら',
                'parent' => '100021'
            ],
            '1044400' => [
                'name' => '川場村',
                'enName' => 'Kawaba Village',
                'kana' => 'かわばむら',
                'parent' => '100021'
            ],
            '1044800' => [
                'name' => '昭和村',
                'enName' => 'Showa Village',
                'kana' => 'しょうわむら',
                'parent' => '100021'
            ],
            '1044900' => [
                'name' => 'みなかみ町',
                'enName' => 'Minakami Town',
                'kana' => 'みなかみまち',
                'parent' => '100021'
            ],
            '1046400' => [
                'name' => '玉村町',
                'enName' => 'Tamamura Town',
                'kana' => 'たまむらまち',
                'parent' => '100012'
            ],
            '1052100' => [
                'name' => '板倉町',
                'enName' => 'Itakura Town',
                'kana' => 'いたくらまち',
                'parent' => '100012'
            ],
            '1052200' => [
                'name' => '明和町',
                'enName' => 'Meiwa Town',
                'kana' => 'めいわまち',
                'parent' => '100012'
            ],
            '1052300' => [
                'name' => '千代田町',
                'enName' => 'Chiyoda Town',
                'kana' => 'ちよだまち',
                'parent' => '100012'
            ],
            '1052400' => [
                'name' => '大泉町',
                'enName' => 'Oizumi Town',
                'kana' => 'おおいずみまち',
                'parent' => '100012'
            ],
            '1052500' => [
                'name' => '邑楽町',
                'enName' => 'Ora Town',
                'kana' => 'おうらまち',
                'parent' => '100012'
            ],
            '1110000' => [
                'name' => 'さいたま市',
                'enName' => 'Saitama City',
                'kana' => 'さいたまし',
                'parent' => '110011'
            ],
            '1120100' => [
                'name' => '川越市',
                'enName' => 'Kawagoe City',
                'kana' => 'かわごえし',
                'parent' => '110011'
            ],
            '1120200' => [
                'name' => '熊谷市',
                'enName' => 'Kumagaya City',
                'kana' => 'くまがやし',
                'parent' => '110022'
            ],
            '1120300' => [
                'name' => '川口市',
                'enName' => 'Kawaguchi City',
                'kana' => 'かわぐちし',
                'parent' => '110011'
            ],
            '1120600' => [
                'name' => '行田市',
                'enName' => 'Gyoda City',
                'kana' => 'ぎょうだし',
                'parent' => '110021'
            ],
            '1120700' => [
                'name' => '秩父市',
                'enName' => 'Chichibu City',
                'kana' => 'ちちぶし',
                'parent' => '110030'
            ],
            '1120800' => [
                'name' => '所沢市',
                'enName' => 'Tokorozawa City',
                'kana' => 'ところざわし',
                'parent' => '110011'
            ],
            '1120900' => [
                'name' => '飯能市',
                'enName' => 'Hanno City',
                'kana' => 'はんのうし',
                'parent' => '110013'
            ],
            '1121000' => [
                'name' => '加須市',
                'enName' => 'Kazo City',
                'kana' => 'かぞし',
                'parent' => '110021'
            ],
            '1121100' => [
                'name' => '本庄市',
                'enName' => 'Honjo City',
                'kana' => 'ほんじょうし',
                'parent' => '110022'
            ],
            '1121200' => [
                'name' => '東松山市',
                'enName' => 'Higashimatsuyama City',
                'kana' => 'ひがしまつやまし',
                'parent' => '110022'
            ],
            '1121400' => [
                'name' => '春日部市',
                'enName' => 'Kasukabe City',
                'kana' => 'かすかべし',
                'parent' => '110012'
            ],
            '1121500' => [
                'name' => '狭山市',
                'enName' => 'Sayama City',
                'kana' => 'さやまし',
                'parent' => '110011'
            ],
            '1121600' => [
                'name' => '羽生市',
                'enName' => 'Hanyu City',
                'kana' => 'はにゅうし',
                'parent' => '110021'
            ],
            '1121700' => [
                'name' => '鴻巣市',
                'enName' => 'Kounosu City',
                'kana' => 'こうのすし',
                'parent' => '110021'
            ],
            '1121800' => [
                'name' => '深谷市',
                'enName' => 'Fukaya City',
                'kana' => 'ふかやし',
                'parent' => '110022'
            ],
            '1121900' => [
                'name' => '上尾市',
                'enName' => 'Ageo City',
                'kana' => 'あげおし',
                'parent' => '110011'
            ],
            '1122100' => [
                'name' => '草加市',
                'enName' => 'Soka City',
                'kana' => 'そうかし',
                'parent' => '110012'
            ],
            '1122200' => [
                'name' => '越谷市',
                'enName' => 'Koshigaya City',
                'kana' => 'こしがやし',
                'parent' => '110012'
            ],
            '1122300' => [
                'name' => '蕨市',
                'enName' => 'Warabi City',
                'kana' => 'わらびし',
                'parent' => '110011'
            ],
            '1122400' => [
                'name' => '戸田市',
                'enName' => 'Toda City',
                'kana' => 'とだし',
                'parent' => '110011'
            ],
            '1122500' => [
                'name' => '入間市',
                'enName' => 'Iruma City',
                'kana' => 'いるまし',
                'parent' => '110013'
            ],
            '1122700' => [
                'name' => '朝霞市',
                'enName' => 'Asaka City',
                'kana' => 'あさかし',
                'parent' => '110011'
            ],
            '1122800' => [
                'name' => '志木市',
                'enName' => 'Shiki City',
                'kana' => 'しきし',
                'parent' => '110011'
            ],
            '1122900' => [
                'name' => '和光市',
                'enName' => 'Wako City',
                'kana' => 'わこうし',
                'parent' => '110011'
            ],
            '1123000' => [
                'name' => '新座市',
                'enName' => 'Niiza City',
                'kana' => 'にいざし',
                'parent' => '110011'
            ],
            '1123100' => [
                'name' => '桶川市',
                'enName' => 'Okegawa City',
                'kana' => 'おけがわし',
                'parent' => '110011'
            ],
            '1123200' => [
                'name' => '久喜市',
                'enName' => 'Kuki City',
                'kana' => 'くきし',
                'parent' => '110021'
            ],
            '1123300' => [
                'name' => '北本市',
                'enName' => 'Kitamoto City',
                'kana' => 'きたもとし',
                'parent' => '110011'
            ],
            '1123400' => [
                'name' => '八潮市',
                'enName' => 'Yashio City',
                'kana' => 'やしおし',
                'parent' => '110012'
            ],
            '1123500' => [
                'name' => '富士見市',
                'enName' => 'Fujimi City',
                'kana' => 'ふじみし',
                'parent' => '110011'
            ],
            '1123700' => [
                'name' => '三郷市',
                'enName' => 'Misato City',
                'kana' => 'みさとし',
                'parent' => '110012'
            ],
            '1123800' => [
                'name' => '蓮田市',
                'enName' => 'Hasuda City',
                'kana' => 'はすだし',
                'parent' => '110012'
            ],
            '1123900' => [
                'name' => '坂戸市',
                'enName' => 'Sakado City',
                'kana' => 'さかどし',
                'parent' => '110013'
            ],
            '1124000' => [
                'name' => '幸手市',
                'enName' => 'Satte City',
                'kana' => 'さってし',
                'parent' => '110012'
            ],
            '1124100' => [
                'name' => '鶴ヶ島市',
                'enName' => 'Tsurugashima City',
                'kana' => 'つるがしまし',
                'parent' => '110013'
            ],
            '1124200' => [
                'name' => '日高市',
                'enName' => 'Hidaka City',
                'kana' => 'ひだかし',
                'parent' => '110013'
            ],
            '1124300' => [
                'name' => '吉川市',
                'enName' => 'Yoshikawa City',
                'kana' => 'よしかわし',
                'parent' => '110012'
            ],
            '1124500' => [
                'name' => 'ふじみ野市',
                'enName' => 'Fujimino City',
                'kana' => 'ふじみのし',
                'parent' => '110011'
            ],
            '1124600' => [
                'name' => '白岡市',
                'enName' => 'Shiraoka City',
                'kana' => 'しらおかし',
                'parent' => '110012'
            ],
            '1130100' => [
                'name' => '伊奈町',
                'enName' => 'Ina Town',
                'kana' => 'いなまち',
                'parent' => '110011'
            ],
            '1132400' => [
                'name' => '三芳町',
                'enName' => 'Miyoshi Town',
                'kana' => 'みよしまち',
                'parent' => '110011'
            ],
            '1132600' => [
                'name' => '毛呂山町',
                'enName' => 'Moroyama Town',
                'kana' => 'もろやままち',
                'parent' => '110013'
            ],
            '1132700' => [
                'name' => '越生町',
                'enName' => 'Ogose Town',
                'kana' => 'おごせまち',
                'parent' => '110013'
            ],
            '1134100' => [
                'name' => '滑川町',
                'enName' => 'Namegawa Town',
                'kana' => 'なめがわまち',
                'parent' => '110022'
            ],
            '1134200' => [
                'name' => '嵐山町',
                'enName' => 'Ranzan Town',
                'kana' => 'らんざんまち',
                'parent' => '110022'
            ],
            '1134300' => [
                'name' => '小川町',
                'enName' => 'Ogawa Town',
                'kana' => 'おがわまち',
                'parent' => '110022'
            ],
            '1134600' => [
                'name' => '川島町',
                'enName' => 'Kawajima Town',
                'kana' => 'かわじままち',
                'parent' => '110011'
            ],
            '1134700' => [
                'name' => '吉見町',
                'enName' => 'Yoshimi Town',
                'kana' => 'よしみまち',
                'parent' => '110022'
            ],
            '1134800' => [
                'name' => '鳩山町',
                'enName' => 'Hatoyama Town',
                'kana' => 'はとやままち',
                'parent' => '110022'
            ],
            '1134900' => [
                'name' => 'ときがわ町',
                'enName' => 'Tokigawa Town',
                'kana' => 'ときがわまち',
                'parent' => '110022'
            ],
            '1136100' => [
                'name' => '横瀬町',
                'enName' => 'Yokoze Town',
                'kana' => 'よこぜまち',
                'parent' => '110030'
            ],
            '1136200' => [
                'name' => '皆野町',
                'enName' => 'Minano Town',
                'kana' => 'みなのまち',
                'parent' => '110030'
            ],
            '1136300' => [
                'name' => '長瀞町',
                'enName' => 'Nagatoro Town',
                'kana' => 'ながとろまち',
                'parent' => '110030'
            ],
            '1136500' => [
                'name' => '小鹿野町',
                'enName' => 'Ogano Town',
                'kana' => 'おがのまち',
                'parent' => '110030'
            ],
            '1136900' => [
                'name' => '東秩父村',
                'enName' => 'Higashichichibu Village',
                'kana' => 'ひがしちちぶむら',
                'parent' => '110022'
            ],
            '1138100' => [
                'name' => '美里町',
                'enName' => 'Misato Town',
                'kana' => 'みさとまち',
                'parent' => '110022'
            ],
            '1138300' => [
                'name' => '神川町',
                'enName' => 'Kamikawa Town',
                'kana' => 'かみかわまち',
                'parent' => '110022'
            ],
            '1138500' => [
                'name' => '上里町',
                'enName' => 'Kamisato Town',
                'kana' => 'かみさとまち',
                'parent' => '110022'
            ],
            '1140800' => [
                'name' => '寄居町',
                'enName' => 'Yorii Town',
                'kana' => 'よりいまち',
                'parent' => '110022'
            ],
            '1144200' => [
                'name' => '宮代町',
                'enName' => 'Miyashiro Town',
                'kana' => 'みやしろまち',
                'parent' => '110012'
            ],
            '1146400' => [
                'name' => '杉戸町',
                'enName' => 'Sugito Town',
                'kana' => 'すぎとまち',
                'parent' => '110012'
            ],
            '1146500' => [
                'name' => '松伏町',
                'enName' => 'Matsubushi Town',
                'kana' => 'まつぶしまち',
                'parent' => '110012'
            ],
            '1210000' => [
                'name' => '千葉市',
                'enName' => 'Chiba City',
                'kana' => 'ちばし',
                'parent' => '120011'
            ],
            '1220200' => [
                'name' => '銚子市',
                'enName' => 'Choshi City',
                'kana' => 'ちょうしし',
                'parent' => '120021'
            ],
            '1220300' => [
                'name' => '市川市',
                'enName' => 'Ichikawa City',
                'kana' => 'いちかわし',
                'parent' => '120013'
            ],
            '1220400' => [
                'name' => '船橋市',
                'enName' => 'Funabashi City',
                'kana' => 'ふなばしし',
                'parent' => '120013'
            ],
            '1220500' => [
                'name' => '館山市',
                'enName' => 'Tateyama City',
                'kana' => 'たてやまし',
                'parent' => '120032'
            ],
            '1220600' => [
                'name' => '木更津市',
                'enName' => 'Kisarazu City',
                'kana' => 'きさらづし',
                'parent' => '120031'
            ],
            '1220700' => [
                'name' => '松戸市',
                'enName' => 'Matsudo City',
                'kana' => 'まつどし',
                'parent' => '120013'
            ],
            '1220800' => [
                'name' => '野田市',
                'enName' => 'Noda City',
                'kana' => 'のだし',
                'parent' => '120013'
            ],
            '1221000' => [
                'name' => '茂原市',
                'enName' => 'Mobara City',
                'kana' => 'もばらし',
                'parent' => '120022'
            ],
            '1221100' => [
                'name' => '成田市',
                'enName' => 'Narita City',
                'kana' => 'なりたし',
                'parent' => '120012'
            ],
            '1221200' => [
                'name' => '佐倉市',
                'enName' => 'Sakura City',
                'kana' => 'さくらし',
                'parent' => '120012'
            ],
            '1221300' => [
                'name' => '東金市',
                'enName' => 'Togane City',
                'kana' => 'とうがねし',
                'parent' => '120022'
            ],
            '1221500' => [
                'name' => '旭市',
                'enName' => 'Asahi City',
                'kana' => 'あさひし',
                'parent' => '120021'
            ],
            '1221600' => [
                'name' => '習志野市',
                'enName' => 'Narashino City',
                'kana' => 'ならしのし',
                'parent' => '120013'
            ],
            '1221700' => [
                'name' => '柏市',
                'enName' => 'Kashiwa City',
                'kana' => 'かしわし',
                'parent' => '120013'
            ],
            '1221800' => [
                'name' => '勝浦市',
                'enName' => 'Katsuura City',
                'kana' => 'かつうらし',
                'parent' => '120032'
            ],
            '1221900' => [
                'name' => '市原市',
                'enName' => 'Ichihara City',
                'kana' => 'いちはらし',
                'parent' => '120011'
            ],
            '1222000' => [
                'name' => '流山市',
                'enName' => 'Nagareyama City',
                'kana' => 'ながれやまし',
                'parent' => '120013'
            ],
            '1222100' => [
                'name' => '八千代市',
                'enName' => 'Yachiyo City',
                'kana' => 'やちよし',
                'parent' => '120013'
            ],
            '1222200' => [
                'name' => '我孫子市',
                'enName' => 'Abiko City',
                'kana' => 'あびこし',
                'parent' => '120013'
            ],
            '1222300' => [
                'name' => '鴨川市',
                'enName' => 'Kamogawa City',
                'kana' => 'かもがわし',
                'parent' => '120032'
            ],
            '1222400' => [
                'name' => '鎌ケ谷市',
                'enName' => 'Kamagaya City',
                'kana' => 'かまがやし',
                'parent' => '120013'
            ],
            '1222500' => [
                'name' => '君津市',
                'enName' => 'Kimitsu City',
                'kana' => 'きみつし',
                'parent' => '120031'
            ],
            '1222600' => [
                'name' => '富津市',
                'enName' => 'Futtsu City',
                'kana' => 'ふっつし',
                'parent' => '120031'
            ],
            '1222700' => [
                'name' => '浦安市',
                'enName' => 'Urayasu City',
                'kana' => 'うらやすし',
                'parent' => '120013'
            ],
            '1222800' => [
                'name' => '四街道市',
                'enName' => 'Yotsukaido City',
                'kana' => 'よつかいどうし',
                'parent' => '120012'
            ],
            '1222900' => [
                'name' => '袖ケ浦市',
                'enName' => 'Sodegaura City',
                'kana' => 'そでがうらし',
                'parent' => '120031'
            ],
            '1223000' => [
                'name' => '八街市',
                'enName' => 'Yachimata City',
                'kana' => 'やちまたし',
                'parent' => '120012'
            ],
            '1223100' => [
                'name' => '印西市',
                'enName' => 'Inzai City',
                'kana' => 'いんざいし',
                'parent' => '120012'
            ],
            '1223200' => [
                'name' => '白井市',
                'enName' => 'Shiroi City',
                'kana' => 'しろいし',
                'parent' => '120012'
            ],
            '1223300' => [
                'name' => '富里市',
                'enName' => 'Tomisato City',
                'kana' => 'とみさとし',
                'parent' => '120012'
            ],
            '1223400' => [
                'name' => '南房総市',
                'enName' => 'Minamiboso City',
                'kana' => 'みなみぼうそうし',
                'parent' => '120032'
            ],
            '1223500' => [
                'name' => '匝瑳市',
                'enName' => 'Sosa City',
                'kana' => 'そうさし',
                'parent' => '120021'
            ],
            '1223600' => [
                'name' => '香取市',
                'enName' => 'Katori City',
                'kana' => 'かとりし',
                'parent' => '120021'
            ],
            '1223700' => [
                'name' => '山武市',
                'enName' => 'Sammu City',
                'kana' => 'さんむし',
                'parent' => '120022'
            ],
            '1223800' => [
                'name' => 'いすみ市',
                'enName' => 'Isumi City',
                'kana' => 'いすみし',
                'parent' => '120032'
            ],
            '1223900' => [
                'name' => '大網白里市',
                'enName' => 'Oamishirasato City',
                'kana' => 'おおあみしらさとし',
                'parent' => '120022'
            ],
            '1232200' => [
                'name' => '酒々井町',
                'enName' => 'Shisui Town',
                'kana' => 'しすいまち',
                'parent' => '120012'
            ],
            '1232900' => [
                'name' => '栄町',
                'enName' => 'Sakae Town',
                'kana' => 'さかえまち',
                'parent' => '120012'
            ],
            '1234200' => [
                'name' => '神崎町',
                'enName' => 'Kozaki Town',
                'kana' => 'こうざきまち',
                'parent' => '120021'
            ],
            '1234700' => [
                'name' => '多古町',
                'enName' => 'Tako Town',
                'kana' => 'たこまち',
                'parent' => '120021'
            ],
            '1234900' => [
                'name' => '東庄町',
                'enName' => 'Tohnosho Town',
                'kana' => 'とうのしょうまち',
                'parent' => '120021'
            ],
            '1240300' => [
                'name' => '九十九里町',
                'enName' => 'Kujukuri Town',
                'kana' => 'くじゅうくりまち',
                'parent' => '120022'
            ],
            '1240900' => [
                'name' => '芝山町',
                'enName' => 'Shibayama Town',
                'kana' => 'しばやままち',
                'parent' => '120022'
            ],
            '1241000' => [
                'name' => '横芝光町',
                'enName' => 'Yokoshibahikari Town',
                'kana' => 'よこしばひかりまち',
                'parent' => '120022'
            ],
            '1242100' => [
                'name' => '一宮町',
                'enName' => 'Ichinomiya Town',
                'kana' => 'いちのみやまち',
                'parent' => '120022'
            ],
            '1242200' => [
                'name' => '睦沢町',
                'enName' => 'Mutsuzawa Town',
                'kana' => 'むつざわまち',
                'parent' => '120022'
            ],
            '1242300' => [
                'name' => '長生村',
                'enName' => 'Chosei Village',
                'kana' => 'ちょうせいむら',
                'parent' => '120022'
            ],
            '1242400' => [
                'name' => '白子町',
                'enName' => 'Shirako Town',
                'kana' => 'しらこまち',
                'parent' => '120022'
            ],
            '1242600' => [
                'name' => '長柄町',
                'enName' => 'Nagara Town',
                'kana' => 'ながらまち',
                'parent' => '120022'
            ],
            '1242700' => [
                'name' => '長南町',
                'enName' => 'Chonan Town',
                'kana' => 'ちょうなんまち',
                'parent' => '120022'
            ],
            '1244100' => [
                'name' => '大多喜町',
                'enName' => 'Otaki Town',
                'kana' => 'おおたきまち',
                'parent' => '120032'
            ],
            '1244300' => [
                'name' => '御宿町',
                'enName' => 'Onjuku Town',
                'kana' => 'おんじゅくまち',
                'parent' => '120032'
            ],
            '1246300' => [
                'name' => '鋸南町',
                'enName' => 'Kyonan Town',
                'kana' => 'きょなんまち',
                'parent' => '120032'
            ],
            '1310100' => [
                'name' => '千代田区',
                'enName' => 'Chiyoda City',
                'kana' => 'ちよだく',
                'parent' => '130011'
            ],
            '1310200' => [
                'name' => '中央区',
                'enName' => 'Chuo City',
                'kana' => 'ちゅうおうく',
                'parent' => '130011'
            ],
            '1310300' => [
                'name' => '港区',
                'enName' => 'Minato City',
                'kana' => 'みなとく',
                'parent' => '130011'
            ],
            '1310400' => [
                'name' => '新宿区',
                'enName' => 'Shinjuku City',
                'kana' => 'しんじゅくく',
                'parent' => '130011'
            ],
            '1310500' => [
                'name' => '文京区',
                'enName' => 'Bunkyo City',
                'kana' => 'ぶんきょうく',
                'parent' => '130011'
            ],
            '1310600' => [
                'name' => '台東区',
                'enName' => 'Taito City',
                'kana' => 'たいとうく',
                'parent' => '130012'
            ],
            '1310700' => [
                'name' => '墨田区',
                'enName' => 'Sumida City',
                'kana' => 'すみだく',
                'parent' => '130012'
            ],
            '1310800' => [
                'name' => '江東区',
                'enName' => 'Koto City',
                'kana' => 'こうとうく',
                'parent' => '130012'
            ],
            '1310900' => [
                'name' => '品川区',
                'enName' => 'Shinagawa City',
                'kana' => 'しながわく',
                'parent' => '130011'
            ],
            '1311000' => [
                'name' => '目黒区',
                'enName' => 'Meguro City',
                'kana' => 'めぐろく',
                'parent' => '130011'
            ],
            '1311100' => [
                'name' => '大田区',
                'enName' => 'Ota City',
                'kana' => 'おおたく',
                'parent' => '130011'
            ],
            '1311200' => [
                'name' => '世田谷区',
                'enName' => 'Setagaya City',
                'kana' => 'せたがやく',
                'parent' => '130011'
            ],
            '1311300' => [
                'name' => '渋谷区',
                'enName' => 'Shibuya City',
                'kana' => 'しぶやく',
                'parent' => '130011'
            ],
            '1311400' => [
                'name' => '中野区',
                'enName' => 'Nakano City',
                'kana' => 'なかのく',
                'parent' => '130011'
            ],
            '1311500' => [
                'name' => '杉並区',
                'enName' => 'Suginami City',
                'kana' => 'すぎなみく',
                'parent' => '130011'
            ],
            '1311600' => [
                'name' => '豊島区',
                'enName' => 'Toshima City',
                'kana' => 'としまく',
                'parent' => '130011'
            ],
            '1311700' => [
                'name' => '北区',
                'enName' => 'Kita City',
                'kana' => 'きたく',
                'parent' => '130011'
            ],
            '1311800' => [
                'name' => '荒川区',
                'enName' => 'Arakawa City',
                'kana' => 'あらかわく',
                'parent' => '130012'
            ],
            '1311900' => [
                'name' => '板橋区',
                'enName' => 'Itabashi City',
                'kana' => 'いたばしく',
                'parent' => '130011'
            ],
            '1312000' => [
                'name' => '練馬区',
                'enName' => 'Nerima City',
                'kana' => 'ねりまく',
                'parent' => '130011'
            ],
            '1312100' => [
                'name' => '足立区',
                'enName' => 'Adachi City',
                'kana' => 'あだちく',
                'parent' => '130012'
            ],
            '1312200' => [
                'name' => '葛飾区',
                'enName' => 'Katsushika City',
                'kana' => 'かつしかく',
                'parent' => '130012'
            ],
            '1312300' => [
                'name' => '江戸川区',
                'enName' => 'Edogawa City',
                'kana' => 'えどがわく',
                'parent' => '130012'
            ],
            '1320100' => [
                'name' => '八王子市',
                'enName' => 'Hachioji City',
                'kana' => 'はちおうじし',
                'parent' => '130015'
            ],
            '1320200' => [
                'name' => '立川市',
                'enName' => 'Tachikawa City',
                'kana' => 'たちかわし',
                'parent' => '130013'
            ],
            '1320300' => [
                'name' => '武蔵野市',
                'enName' => 'Musashino City',
                'kana' => 'むさしのし',
                'parent' => '130013'
            ],
            '1320400' => [
                'name' => '三鷹市',
                'enName' => 'Mitaka City',
                'kana' => 'みたかし',
                'parent' => '130013'
            ],
            '1320500' => [
                'name' => '青梅市',
                'enName' => 'Ome City',
                'kana' => 'おうめし',
                'parent' => '130014'
            ],
            '1320600' => [
                'name' => '府中市',
                'enName' => 'Fuchu City',
                'kana' => 'ふちゅうし',
                'parent' => '130013'
            ],
            '1320700' => [
                'name' => '昭島市',
                'enName' => 'Akishima City',
                'kana' => 'あきしまし',
                'parent' => '130013'
            ],
            '1320800' => [
                'name' => '調布市',
                'enName' => 'Chofu City',
                'kana' => 'ちょうふし',
                'parent' => '130013'
            ],
            '1320900' => [
                'name' => '町田市',
                'enName' => 'Machida City',
                'kana' => 'まちだし',
                'parent' => '130015'
            ],
            '1321000' => [
                'name' => '小金井市',
                'enName' => 'Koganei City',
                'kana' => 'こがねいし',
                'parent' => '130013'
            ],
            '1321100' => [
                'name' => '小平市',
                'enName' => 'Kodaira City',
                'kana' => 'こだいらし',
                'parent' => '130013'
            ],
            '1321200' => [
                'name' => '日野市',
                'enName' => 'Hino City',
                'kana' => 'ひのし',
                'parent' => '130015'
            ],
            '1321300' => [
                'name' => '東村山市',
                'enName' => 'Higashimurayama City',
                'kana' => 'ひがしむらやまし',
                'parent' => '130013'
            ],
            '1321400' => [
                'name' => '国分寺市',
                'enName' => 'Kokubunji City',
                'kana' => 'こくぶんじし',
                'parent' => '130013'
            ],
            '1321500' => [
                'name' => '国立市',
                'enName' => 'Kunitachi City',
                'kana' => 'くにたちし',
                'parent' => '130013'
            ],
            '1321800' => [
                'name' => '福生市',
                'enName' => 'Fussa City',
                'kana' => 'ふっさし',
                'parent' => '130014'
            ],
            '1321900' => [
                'name' => '狛江市',
                'enName' => 'Komae City',
                'kana' => 'こまえし',
                'parent' => '130013'
            ],
            '1322000' => [
                'name' => '東大和市',
                'enName' => 'Higashiyamato City',
                'kana' => 'ひがしやまとし',
                'parent' => '130013'
            ],
            '1322100' => [
                'name' => '清瀬市',
                'enName' => 'Kiyose City',
                'kana' => 'きよせし',
                'parent' => '130013'
            ],
            '1322200' => [
                'name' => '東久留米市',
                'enName' => 'Higashikurume City',
                'kana' => 'ひがしくるめし',
                'parent' => '130013'
            ],
            '1322300' => [
                'name' => '武蔵村山市',
                'enName' => 'Musashimurayama City',
                'kana' => 'むさしむらやまし',
                'parent' => '130013'
            ],
            '1322400' => [
                'name' => '多摩市',
                'enName' => 'Tama City',
                'kana' => 'たまし',
                'parent' => '130015'
            ],
            '1322500' => [
                'name' => '稲城市',
                'enName' => 'Inagi City',
                'kana' => 'いなぎし',
                'parent' => '130015'
            ],
            '1322700' => [
                'name' => '羽村市',
                'enName' => 'Hamura City',
                'kana' => 'はむらし',
                'parent' => '130014'
            ],
            '1322800' => [
                'name' => 'あきる野市',
                'enName' => 'Akiruno City',
                'kana' => 'あきるのし',
                'parent' => '130014'
            ],
            '1322900' => [
                'name' => '西東京市',
                'enName' => 'Nishitokyo City',
                'kana' => 'にしとうきょうし',
                'parent' => '130013'
            ],
            '1330300' => [
                'name' => '瑞穂町',
                'enName' => 'Mizuho Town',
                'kana' => 'みずほまち',
                'parent' => '130014'
            ],
            '1330500' => [
                'name' => '日の出町',
                'enName' => 'Hinode Town',
                'kana' => 'ひのでまち',
                'parent' => '130014'
            ],
            '1330700' => [
                'name' => '檜原村',
                'enName' => 'Hinohara Village',
                'kana' => 'ひのはらむら',
                'parent' => '130014'
            ],
            '1330800' => [
                'name' => '奥多摩町',
                'enName' => 'Okutama Town',
                'kana' => 'おくたままち',
                'parent' => '130014'
            ],
            '1336100' => [
                'name' => '大島町',
                'enName' => 'Oshima Town',
                'kana' => 'おおしままち',
                'parent' => '130021'
            ],
            '1336200' => [
                'name' => '利島村',
                'enName' => 'Toshima Village',
                'kana' => 'としまむら',
                'parent' => '130022'
            ],
            '1336300' => [
                'name' => '新島村',
                'enName' => 'Niijima Village',
                'kana' => 'にいじまむら',
                'parent' => '130022'
            ],
            '1336400' => [
                'name' => '神津島村',
                'enName' => 'Kouzushima Village',
                'kana' => 'こうづしまむら',
                'parent' => '130022'
            ],
            '1338100' => [
                'name' => '三宅村',
                'enName' => 'Miyake Village',
                'kana' => 'みやけむら',
                'parent' => '130032'
            ],
            '1338200' => [
                'name' => '御蔵島村',
                'enName' => 'Mikurashima Village',
                'kana' => 'みくらじまむら',
                'parent' => '130032'
            ],
            '1340100' => [
                'name' => '八丈町',
                'enName' => 'Hachijo Town',
                'kana' => 'はちじょうまち',
                'parent' => '130031'
            ],
            '1340200' => [
                'name' => '青ヶ島村',
                'enName' => 'Aogashima Village',
                'kana' => 'あおがしまむら',
                'parent' => '130031'
            ],
            '1342100' => [
                'name' => '小笠原村',
                'enName' => 'Ogasawara Village',
                'kana' => 'おがさわらむら',
                'parent' => '130040'
            ],
            '1410000' => [
                'name' => '横浜市',
                'enName' => 'Yokohama City',
                'kana' => 'よこはまし',
                'parent' => '140011'
            ],
            '1413000' => [
                'name' => '川崎市',
                'enName' => 'Kawasaki City',
                'kana' => 'かわさきし',
                'parent' => '140011'
            ],
            '1415000' => [
                'name' => '相模原市',
                'enName' => 'Sagamihara City',
                'kana' => 'さがみはらし',
                'parent' => '140021'
            ],
            '1420100' => [
                'name' => '横須賀市',
                'enName' => 'Yokosuka City',
                'kana' => 'よこすかし',
                'parent' => '140013'
            ],
            '1420300' => [
                'name' => '平塚市',
                'enName' => 'Hiratsuka City',
                'kana' => 'ひらつかし',
                'parent' => '140012'
            ],
            '1420400' => [
                'name' => '鎌倉市',
                'enName' => 'Kamakura City',
                'kana' => 'かまくらし',
                'parent' => '140013'
            ],
            '1420500' => [
                'name' => '藤沢市',
                'enName' => 'Fujisawa City',
                'kana' => 'ふじさわし',
                'parent' => '140012'
            ],
            '1420600' => [
                'name' => '小田原市',
                'enName' => 'Odawara City',
                'kana' => 'おだわらし',
                'parent' => '140024'
            ],
            '1420700' => [
                'name' => '茅ヶ崎市',
                'enName' => 'Chigasaki City',
                'kana' => 'ちがさきし',
                'parent' => '140012'
            ],
            '1420800' => [
                'name' => '逗子市',
                'enName' => 'Zushi City',
                'kana' => 'ずしし',
                'parent' => '140013'
            ],
            '1421000' => [
                'name' => '三浦市',
                'enName' => 'Miura City',
                'kana' => 'みうらし',
                'parent' => '140013'
            ],
            '1421100' => [
                'name' => '秦野市',
                'enName' => 'Hadano City',
                'kana' => 'はだのし',
                'parent' => '140022'
            ],
            '1421200' => [
                'name' => '厚木市',
                'enName' => 'Atsugi City',
                'kana' => 'あつぎし',
                'parent' => '140022'
            ],
            '1421300' => [
                'name' => '大和市',
                'enName' => 'Yamato City',
                'kana' => 'やまとし',
                'parent' => '140012'
            ],
            '1421400' => [
                'name' => '伊勢原市',
                'enName' => 'Isehara City',
                'kana' => 'いせはらし',
                'parent' => '140022'
            ],
            '1421500' => [
                'name' => '海老名市',
                'enName' => 'Ebina City',
                'kana' => 'えびなし',
                'parent' => '140012'
            ],
            '1421600' => [
                'name' => '座間市',
                'enName' => 'Zama City',
                'kana' => 'ざまし',
                'parent' => '140012'
            ],
            '1421700' => [
                'name' => '南足柄市',
                'enName' => 'Minamiashigara City',
                'kana' => 'みなみあしがらし',
                'parent' => '140023'
            ],
            '1421800' => [
                'name' => '綾瀬市',
                'enName' => 'Ayase City',
                'kana' => 'あやせし',
                'parent' => '140012'
            ],
            '1430100' => [
                'name' => '葉山町',
                'enName' => 'Hayama Town',
                'kana' => 'はやままち',
                'parent' => '140013'
            ],
            '1432100' => [
                'name' => '寒川町',
                'enName' => 'Samukawa Town',
                'kana' => 'さむかわまち',
                'parent' => '140012'
            ],
            '1434100' => [
                'name' => '大磯町',
                'enName' => 'Oiso Town',
                'kana' => 'おおいそまち',
                'parent' => '140012'
            ],
            '1434200' => [
                'name' => '二宮町',
                'enName' => 'Ninomiya Town',
                'kana' => 'にのみやまち',
                'parent' => '140012'
            ],
            '1436100' => [
                'name' => '中井町',
                'enName' => 'Nakai Town',
                'kana' => 'なかいまち',
                'parent' => '140023'
            ],
            '1436200' => [
                'name' => '大井町',
                'enName' => 'Oi Town',
                'kana' => 'おおいまち',
                'parent' => '140023'
            ],
            '1436300' => [
                'name' => '松田町',
                'enName' => 'Matsuda Town',
                'kana' => 'まつだまち',
                'parent' => '140023'
            ],
            '1436400' => [
                'name' => '山北町',
                'enName' => 'Yamakita Town',
                'kana' => 'やまきたまち',
                'parent' => '140023'
            ],
            '1436600' => [
                'name' => '開成町',
                'enName' => 'Kaisei Town',
                'kana' => 'かいせいまち',
                'parent' => '140023'
            ],
            '1438200' => [
                'name' => '箱根町',
                'enName' => 'Hakone Town',
                'kana' => 'はこねまち',
                'parent' => '140024'
            ],
            '1438300' => [
                'name' => '真鶴町',
                'enName' => 'Manazuru Town',
                'kana' => 'まなつるまち',
                'parent' => '140024'
            ],
            '1438400' => [
                'name' => '湯河原町',
                'enName' => 'Yugawara Town',
                'kana' => 'ゆがわらまち',
                'parent' => '140024'
            ],
            '1440100' => [
                'name' => '愛川町',
                'enName' => 'Aikawa Town',
                'kana' => 'あいかわまち',
                'parent' => '140022'
            ],
            '1440200' => [
                'name' => '清川村',
                'enName' => 'Kiyokawa Village',
                'kana' => 'きよかわむら',
                'parent' => '140022'
            ],
            '1510000' => [
                'name' => '新潟市',
                'enName' => 'Niigata City',
                'kana' => 'にいがたし',
                'parent' => '150011'
            ],
            '1520200' => [
                'name' => '長岡市',
                'enName' => 'Nagaoka City',
                'kana' => 'ながおかし',
                'parent' => '150021'
            ],
            '1520400' => [
                'name' => '三条市',
                'enName' => 'Sanjo City',
                'kana' => 'さんじょうし',
                'parent' => '150022'
            ],
            '1520500' => [
                'name' => '柏崎市',
                'enName' => 'Kashiwazaki City',
                'kana' => 'かしわざきし',
                'parent' => '150024'
            ],
            '1520600' => [
                'name' => '新発田市',
                'enName' => 'Shibata City',
                'kana' => 'しばたし',
                'parent' => '150013'
            ],
            '1520800' => [
                'name' => '小千谷市',
                'enName' => 'Ojiya City',
                'kana' => 'おぢやし',
                'parent' => '150021'
            ],
            '1520900' => [
                'name' => '加茂市',
                'enName' => 'Kamo City',
                'kana' => 'かもし',
                'parent' => '150022'
            ],
            '1521000' => [
                'name' => '十日町市',
                'enName' => 'Tokamachi City',
                'kana' => 'とおかまちし',
                'parent' => '150026'
            ],
            '1521100' => [
                'name' => '見附市',
                'enName' => 'Mitsuke City',
                'kana' => 'みつけし',
                'parent' => '150021'
            ],
            '1521200' => [
                'name' => '村上市',
                'enName' => 'Murakami City',
                'kana' => 'むらかみし',
                'parent' => '150012'
            ],
            '1521300' => [
                'name' => '燕市',
                'enName' => 'Tsubame City',
                'kana' => 'つばめし',
                'parent' => '150011'
            ],
            '1521600' => [
                'name' => '糸魚川市',
                'enName' => 'Itoigawa City',
                'kana' => 'いといがわし',
                'parent' => '150032'
            ],
            '1521700' => [
                'name' => '妙高市',
                'enName' => 'Myoko City',
                'kana' => 'みょうこうし',
                'parent' => '150033'
            ],
            '1521800' => [
                'name' => '五泉市',
                'enName' => 'Gosen City',
                'kana' => 'ごせんし',
                'parent' => '150014'
            ],
            '1522200' => [
                'name' => '上越市',
                'enName' => 'Joetsu City',
                'kana' => 'じょうえつし',
                'parent' => '150031'
            ],
            '1522300' => [
                'name' => '阿賀野市',
                'enName' => 'Agano City',
                'kana' => 'あがのし',
                'parent' => '150011'
            ],
            '1522400' => [
                'name' => '佐渡市',
                'enName' => 'Sado City',
                'kana' => 'さどし',
                'parent' => '150040'
            ],
            '1522500' => [
                'name' => '魚沼市',
                'enName' => 'Uonuma City',
                'kana' => 'うおぬまし',
                'parent' => '150023'
            ],
            '1522600' => [
                'name' => '南魚沼市',
                'enName' => 'Minamiuonuma City',
                'kana' => 'みなみうおぬまし',
                'parent' => '150025'
            ],
            '1522700' => [
                'name' => '胎内市',
                'enName' => 'Tainai City',
                'kana' => 'たいないし',
                'parent' => '150013'
            ],
            '1530700' => [
                'name' => '聖籠町',
                'enName' => 'Seiro Town',
                'kana' => 'せいろうまち',
                'parent' => '150013'
            ],
            '1534200' => [
                'name' => '弥彦村',
                'enName' => 'Yahiko Village',
                'kana' => 'やひこむら',
                'parent' => '150011'
            ],
            '1536100' => [
                'name' => '田上町',
                'enName' => 'Tagami Town',
                'kana' => 'たがみまち',
                'parent' => '150022'
            ],
            '1538500' => [
                'name' => '阿賀町',
                'enName' => 'Aga Town',
                'kana' => 'あがまち',
                'parent' => '150014'
            ],
            '1540500' => [
                'name' => '出雲崎町',
                'enName' => 'Izumozaki Town',
                'kana' => 'いずもざきまち',
                'parent' => '150021'
            ],
            '1546100' => [
                'name' => '湯沢町',
                'enName' => 'Yuzawa Town',
                'kana' => 'ゆざわまち',
                'parent' => '150025'
            ],
            '1548200' => [
                'name' => '津南町',
                'enName' => 'Tsunan Town',
                'kana' => 'つなんまち',
                'parent' => '150026'
            ],
            '1550400' => [
                'name' => '刈羽村',
                'enName' => 'Kariwa Village',
                'kana' => 'かりわむら',
                'parent' => '150024'
            ],
            '1558100' => [
                'name' => '関川村',
                'enName' => 'Sekikawa Village',
                'kana' => 'せきかわむら',
                'parent' => '150012'
            ],
            '1558600' => [
                'name' => '粟島浦村',
                'enName' => 'Awashimaura Village',
                'kana' => 'あわしまうらむら',
                'parent' => '150012'
            ],
            '1620100' => [
                'name' => '富山市',
                'enName' => 'Toyama City',
                'kana' => 'とやまし',
                'parent' => '160011'
            ],
            '1620200' => [
                'name' => '高岡市',
                'enName' => 'Takaoka City',
                'kana' => 'たかおかし',
                'parent' => '160021'
            ],
            '1620400' => [
                'name' => '魚津市',
                'enName' => 'Uozu City',
                'kana' => 'うおづし',
                'parent' => '160012'
            ],
            '1620500' => [
                'name' => '氷見市',
                'enName' => 'Himi City',
                'kana' => 'ひみし',
                'parent' => '160021'
            ],
            '1620600' => [
                'name' => '滑川市',
                'enName' => 'Namerikawa City',
                'kana' => 'なめりかわし',
                'parent' => '160012'
            ],
            '1620700' => [
                'name' => '黒部市',
                'enName' => 'Kurobe City',
                'kana' => 'くろべし',
                'parent' => '160012'
            ],
            '1620800' => [
                'name' => '砺波市',
                'enName' => 'Tonami City',
                'kana' => 'となみし',
                'parent' => '160022'
            ],
            '1620900' => [
                'name' => '小矢部市',
                'enName' => 'Oyabe City',
                'kana' => 'おやべし',
                'parent' => '160021'
            ],
            '1621000' => [
                'name' => '南砺市',
                'enName' => 'Nanto City',
                'kana' => 'なんとし',
                'parent' => '160022'
            ],
            '1621100' => [
                'name' => '射水市',
                'enName' => 'Imizu City',
                'kana' => 'いみずし',
                'parent' => '160021'
            ],
            '1632100' => [
                'name' => '舟橋村',
                'enName' => 'Funahashi Village',
                'kana' => 'ふなはしむら',
                'parent' => '160011'
            ],
            '1632200' => [
                'name' => '上市町',
                'enName' => 'Kamiichi Town',
                'kana' => 'かみいちまち',
                'parent' => '160011'
            ],
            '1632300' => [
                'name' => '立山町',
                'enName' => 'Tateyama Town',
                'kana' => 'たてやままち',
                'parent' => '160011'
            ],
            '1634200' => [
                'name' => '入善町',
                'enName' => 'Nyuzen Town',
                'kana' => 'にゅうぜんまち',
                'parent' => '160012'
            ],
            '1634300' => [
                'name' => '朝日町',
                'enName' => 'Asahi Town',
                'kana' => 'あさひまち',
                'parent' => '160012'
            ],
            '1720100' => [
                'name' => '金沢市',
                'enName' => 'Kanazawa City',
                'kana' => 'かなざわし',
                'parent' => '170011'
            ],
            '1720200' => [
                'name' => '七尾市',
                'enName' => 'Nanao City',
                'kana' => 'ななおし',
                'parent' => '170022'
            ],
            '1720300' => [
                'name' => '小松市',
                'enName' => 'Komatsu City',
                'kana' => 'こまつし',
                'parent' => '170012'
            ],
            '1720400' => [
                'name' => '輪島市',
                'enName' => 'Wajima City',
                'kana' => 'わじまし',
                'parent' => '170021'
            ],
            '1720500' => [
                'name' => '珠洲市',
                'enName' => 'Suzu City',
                'kana' => 'すずし',
                'parent' => '170021'
            ],
            '1720600' => [
                'name' => '加賀市',
                'enName' => 'Kaga City',
                'kana' => 'かがし',
                'parent' => '170012'
            ],
            '1720700' => [
                'name' => '羽咋市',
                'enName' => 'Hakui City',
                'kana' => 'はくいし',
                'parent' => '170022'
            ],
            '1720900' => [
                'name' => 'かほく市',
                'enName' => 'Kahoku City',
                'kana' => 'かほくし',
                'parent' => '170011'
            ],
            '1721000' => [
                'name' => '白山市',
                'enName' => 'Hakusan City',
                'kana' => 'はくさんし',
                'parent' => '170012'
            ],
            '1721100' => [
                'name' => '能美市',
                'enName' => 'Nomi City',
                'kana' => 'のみし',
                'parent' => '170012'
            ],
            '1721200' => [
                'name' => '野々市市',
                'enName' => 'Nonoichi City',
                'kana' => 'ののいちし',
                'parent' => '170012'
            ],
            '1732400' => [
                'name' => '川北町',
                'enName' => 'Kawakita Town',
                'kana' => 'かわきたまち',
                'parent' => '170012'
            ],
            '1736100' => [
                'name' => '津幡町',
                'enName' => 'Tsubata Town',
                'kana' => 'つばたまち',
                'parent' => '170011'
            ],
            '1736500' => [
                'name' => '内灘町',
                'enName' => 'Uchinada Town',
                'kana' => 'うちなだまち',
                'parent' => '170011'
            ],
            '1738400' => [
                'name' => '志賀町',
                'enName' => 'Shika Town',
                'kana' => 'しかまち',
                'parent' => '170022'
            ],
            '1738600' => [
                'name' => '宝達志水町',
                'enName' => 'Hodatsushimizu Town',
                'kana' => 'ほうだつしみずちょう',
                'parent' => '170022'
            ],
            '1740700' => [
                'name' => '中能登町',
                'enName' => 'Nakanoto Town',
                'kana' => 'なかのとまち',
                'parent' => '170022'
            ],
            '1746100' => [
                'name' => '穴水町',
                'enName' => 'Anamizu Town',
                'kana' => 'あなみずまち',
                'parent' => '170021'
            ],
            '1746300' => [
                'name' => '能登町',
                'enName' => 'Noto Town',
                'kana' => 'のとちょう',
                'parent' => '170021'
            ],
            '1820100' => [
                'name' => '福井市',
                'enName' => 'Fukui City',
                'kana' => 'ふくいし',
                'parent' => '180011'
            ],
            '1820200' => [
                'name' => '敦賀市',
                'enName' => 'Tsuruga City',
                'kana' => 'つるがし',
                'parent' => '180021'
            ],
            '1820400' => [
                'name' => '小浜市',
                'enName' => 'Obama City',
                'kana' => 'おばまし',
                'parent' => '180022'
            ],
            '1820500' => [
                'name' => '大野市',
                'enName' => 'Ono City',
                'kana' => 'おおのし',
                'parent' => '180013'
            ],
            '1820600' => [
                'name' => '勝山市',
                'enName' => 'Katsuyama City',
                'kana' => 'かつやまし',
                'parent' => '180013'
            ],
            '1820700' => [
                'name' => '鯖江市',
                'enName' => 'Sabae City',
                'kana' => 'さばえし',
                'parent' => '180012'
            ],
            '1820800' => [
                'name' => 'あわら市',
                'enName' => 'Awara City',
                'kana' => 'あわらし',
                'parent' => '180011'
            ],
            '1820900' => [
                'name' => '越前市',
                'enName' => 'Echizen City',
                'kana' => 'えちぜんし',
                'parent' => '180012'
            ],
            '1821000' => [
                'name' => '坂井市',
                'enName' => 'Sakai City',
                'kana' => 'さかいし',
                'parent' => '180011'
            ],
            '1832200' => [
                'name' => '永平寺町',
                'enName' => 'Eiheiji Town',
                'kana' => 'えいへいじちょう',
                'parent' => '180011'
            ],
            '1838200' => [
                'name' => '池田町',
                'enName' => 'Ikeda Town',
                'kana' => 'いけだちょう',
                'parent' => '180012'
            ],
            '1840400' => [
                'name' => '南越前町',
                'enName' => 'Minamiechizen Town',
                'kana' => 'みなみえちぜんちょう',
                'parent' => '180012'
            ],
            '1842300' => [
                'name' => '越前町',
                'enName' => 'Echizen Town',
                'kana' => 'えちぜんちょう',
                'parent' => '180011'
            ],
            '1844200' => [
                'name' => '美浜町',
                'enName' => 'Mihama Town',
                'kana' => 'みはまちょう',
                'parent' => '180021'
            ],
            '1848100' => [
                'name' => '高浜町',
                'enName' => 'Takahama Town',
                'kana' => 'たかはまちょう',
                'parent' => '180022'
            ],
            '1848300' => [
                'name' => 'おおい町',
                'enName' => 'Ohi Town',
                'kana' => 'おおいちょう',
                'parent' => '180022'
            ],
            '1850100' => [
                'name' => '若狭町',
                'enName' => 'Wakasa Town',
                'kana' => 'わかさちょう',
                'parent' => '180021'
            ],
            '1920100' => [
                'name' => '甲府市',
                'enName' => 'Kofu City',
                'kana' => 'こうふし',
                'parent' => '190011'
            ],
            '1920200' => [
                'name' => '富士吉田市',
                'enName' => 'Fujiyoshida City',
                'kana' => 'ふじよしだし',
                'parent' => '190022'
            ],
            '1920400' => [
                'name' => '都留市',
                'enName' => 'Tsuru City',
                'kana' => 'つるし',
                'parent' => '190021'
            ],
            '1920500' => [
                'name' => '山梨市',
                'enName' => 'Yamanashi City',
                'kana' => 'やまなしし',
                'parent' => '190012'
            ],
            '1920600' => [
                'name' => '大月市',
                'enName' => 'Otsuki City',
                'kana' => 'おおつきし',
                'parent' => '190021'
            ],
            '1920700' => [
                'name' => '韮崎市',
                'enName' => 'Nirasaki City',
                'kana' => 'にらさきし',
                'parent' => '190011'
            ],
            '1920800' => [
                'name' => '南アルプス市',
                'enName' => 'Minamialps City',
                'kana' => 'みなみあるぷすし',
                'parent' => '190011'
            ],
            '1920900' => [
                'name' => '北杜市',
                'enName' => 'Hokuto City',
                'kana' => 'ほくとし',
                'parent' => '190011'
            ],
            '1921000' => [
                'name' => '甲斐市',
                'enName' => 'Kai City',
                'kana' => 'かいし',
                'parent' => '190011'
            ],
            '1921100' => [
                'name' => '笛吹市',
                'enName' => 'Fuefuki City',
                'kana' => 'ふえふきし',
                'parent' => '190012'
            ],
            '1921200' => [
                'name' => '上野原市',
                'enName' => 'Uenohara City',
                'kana' => 'うえのはらし',
                'parent' => '190021'
            ],
            '1921300' => [
                'name' => '甲州市',
                'enName' => 'Koshu City',
                'kana' => 'こうしゅうし',
                'parent' => '190012'
            ],
            '1921400' => [
                'name' => '中央市',
                'enName' => 'Chuo City',
                'kana' => 'ちゅうおうし',
                'parent' => '190011'
            ],
            '1934600' => [
                'name' => '市川三郷町',
                'enName' => 'Ichikawamisato Town',
                'kana' => 'いちかわみさとちょう',
                'parent' => '190013'
            ],
            '1936400' => [
                'name' => '早川町',
                'enName' => 'Hayakawa Town',
                'kana' => 'はやかわちょう',
                'parent' => '190013'
            ],
            '1936500' => [
                'name' => '身延町',
                'enName' => 'Minobu Town',
                'kana' => 'みのぶちょう',
                'parent' => '190013'
            ],
            '1936600' => [
                'name' => '南部町',
                'enName' => 'Nambu Town',
                'kana' => 'なんぶちょう',
                'parent' => '190013'
            ],
            '1936800' => [
                'name' => '富士川町',
                'enName' => 'Fujikawa Town',
                'kana' => 'ふじかわちょう',
                'parent' => '190013'
            ],
            '1938400' => [
                'name' => '昭和町',
                'enName' => 'Showa Town',
                'kana' => 'しょうわちょう',
                'parent' => '190011'
            ],
            '1942200' => [
                'name' => '道志村',
                'enName' => 'Doshi Village',
                'kana' => 'どうしむら',
                'parent' => '190021'
            ],
            '1942300' => [
                'name' => '西桂町',
                'enName' => 'Nishikatsura Town',
                'kana' => 'にしかつらちょう',
                'parent' => '190022'
            ],
            '1942400' => [
                'name' => '忍野村',
                'enName' => 'Oshino Village',
                'kana' => 'おしのむら',
                'parent' => '190022'
            ],
            '1942500' => [
                'name' => '山中湖村',
                'enName' => 'Yamanakako Village',
                'kana' => 'やまなかこむら',
                'parent' => '190022'
            ],
            '1942900' => [
                'name' => '鳴沢村',
                'enName' => 'Narusawa Village',
                'kana' => 'なるさわむら',
                'parent' => '190022'
            ],
            '1943000' => [
                'name' => '富士河口湖町',
                'enName' => 'Fujikawaguchiko Town',
                'kana' => 'ふじかわぐちこまち',
                'parent' => '190022'
            ],
            '1944200' => [
                'name' => '小菅村',
                'enName' => 'Kosuge Village',
                'kana' => 'こすげむら',
                'parent' => '190021'
            ],
            '1944300' => [
                'name' => '丹波山村',
                'enName' => 'Tabayama Village',
                'kana' => 'たばやまむら',
                'parent' => '190021'
            ],
            '2020100' => [
                'name' => '長野市',
                'enName' => 'Nagano City',
                'kana' => 'ながのし',
                'parent' => '200011'
            ],
            '2020201' => [
                'name' => '松本市松本',
                'enName' => 'Matsumoto, Matsumoto City',
                'kana' => 'まつもとしまつもと',
                'parent' => '200023'
            ],
            '2020202' => [
                'name' => '松本市乗鞍上高地',
                'enName' => 'Norikura Kamikochi, Matsumoto City',
                'kana' => 'まつもとしのりくらかみこうち',
                'parent' => '200024'
            ],
            '2020300' => [
                'name' => '上田市',
                'enName' => 'Ueda City',
                'kana' => 'うえだし',
                'parent' => '200021'
            ],
            '2020400' => [
                'name' => '岡谷市',
                'enName' => 'Okaya City',
                'kana' => 'おかやし',
                'parent' => '200025'
            ],
            '2020500' => [
                'name' => '飯田市',
                'enName' => 'Iida City',
                'kana' => 'いいだし',
                'parent' => '200033'
            ],
            '2020600' => [
                'name' => '諏訪市',
                'enName' => 'Suwa City',
                'kana' => 'すわし',
                'parent' => '200025'
            ],
            '2020700' => [
                'name' => '須坂市',
                'enName' => 'Suzaka City',
                'kana' => 'すざかし',
                'parent' => '200011'
            ],
            '2020800' => [
                'name' => '小諸市',
                'enName' => 'Komoro City',
                'kana' => 'こもろし',
                'parent' => '200022'
            ],
            '2020900' => [
                'name' => '伊那市',
                'enName' => 'Ina City',
                'kana' => 'いなし',
                'parent' => '200031'
            ],
            '2021000' => [
                'name' => '駒ヶ根市',
                'enName' => 'Komagane City',
                'kana' => 'こまがねし',
                'parent' => '200031'
            ],
            '2021100' => [
                'name' => '中野市',
                'enName' => 'Nakano City',
                'kana' => 'なかのし',
                'parent' => '200012'
            ],
            '2021200' => [
                'name' => '大町市',
                'enName' => 'Omachi City',
                'kana' => 'おおまちし',
                'parent' => '200013'
            ],
            '2021300' => [
                'name' => '飯山市',
                'enName' => 'Iiyama City',
                'kana' => 'いいやまし',
                'parent' => '200012'
            ],
            '2021400' => [
                'name' => '茅野市',
                'enName' => 'Chino City',
                'kana' => 'ちのし',
                'parent' => '200025'
            ],
            '2021501' => [
                'name' => '塩尻市塩尻',
                'enName' => 'Shiojiri, Shiojiri City',
                'kana' => 'しおじりししおじり',
                'parent' => '200023'
            ],
            '2021502' => [
                'name' => '塩尻市楢川',
                'enName' => 'Narakawa, Shiojiri City',
                'kana' => 'しおじりしならかわ',
                'parent' => '200032'
            ],
            '2021700' => [
                'name' => '佐久市',
                'enName' => 'Saku City',
                'kana' => 'さくし',
                'parent' => '200022'
            ],
            '2021800' => [
                'name' => '千曲市',
                'enName' => 'Chikuma City',
                'kana' => 'ちくまし',
                'parent' => '200011'
            ],
            '2021900' => [
                'name' => '東御市',
                'enName' => 'Tomi City',
                'kana' => 'とうみし',
                'parent' => '200021'
            ],
            '2022000' => [
                'name' => '安曇野市',
                'enName' => 'Azumino City',
                'kana' => 'あづみのし',
                'parent' => '200023'
            ],
            '2030300' => [
                'name' => '小海町',
                'enName' => 'Koumi Town',
                'kana' => 'こうみまち',
                'parent' => '200022'
            ],
            '2030400' => [
                'name' => '川上村',
                'enName' => 'Kawakami Village',
                'kana' => 'かわかみむら',
                'parent' => '200022'
            ],
            '2030500' => [
                'name' => '南牧村',
                'enName' => 'Minamimaki Village',
                'kana' => 'みなみまきむら',
                'parent' => '200022'
            ],
            '2030600' => [
                'name' => '南相木村',
                'enName' => 'Minamiaiki Village',
                'kana' => 'みなみあいきむら',
                'parent' => '200022'
            ],
            '2030700' => [
                'name' => '北相木村',
                'enName' => 'Kitaaiki Village',
                'kana' => 'きたあいきむら',
                'parent' => '200022'
            ],
            '2030900' => [
                'name' => '佐久穂町',
                'enName' => 'Sakuho Town',
                'kana' => 'さくほまち',
                'parent' => '200022'
            ],
            '2032100' => [
                'name' => '軽井沢町',
                'enName' => 'Karuizawa Town',
                'kana' => 'かるいざわまち',
                'parent' => '200022'
            ],
            '2032300' => [
                'name' => '御代田町',
                'enName' => 'Miyota Town',
                'kana' => 'みよたまち',
                'parent' => '200022'
            ],
            '2032400' => [
                'name' => '立科町',
                'enName' => 'Tateshina Town',
                'kana' => 'たてしなまち',
                'parent' => '200022'
            ],
            '2034900' => [
                'name' => '青木村',
                'enName' => 'Aoki Village',
                'kana' => 'あおきむら',
                'parent' => '200021'
            ],
            '2035000' => [
                'name' => '長和町',
                'enName' => 'Nagawa Town',
                'kana' => 'ながわまち',
                'parent' => '200021'
            ],
            '2036100' => [
                'name' => '下諏訪町',
                'enName' => 'Shimosuwa Town',
                'kana' => 'しもすわまち',
                'parent' => '200025'
            ],
            '2036200' => [
                'name' => '富士見町',
                'enName' => 'Fujimi Town',
                'kana' => 'ふじみまち',
                'parent' => '200025'
            ],
            '2036300' => [
                'name' => '原村',
                'enName' => 'Hara Village',
                'kana' => 'はらむら',
                'parent' => '200025'
            ],
            '2038200' => [
                'name' => '辰野町',
                'enName' => 'Tatsuno Town',
                'kana' => 'たつのまち',
                'parent' => '200031'
            ],
            '2038300' => [
                'name' => '箕輪町',
                'enName' => 'Minowa Town',
                'kana' => 'みのわまち',
                'parent' => '200031'
            ],
            '2038400' => [
                'name' => '飯島町',
                'enName' => 'Iijima Town',
                'kana' => 'いいじままち',
                'parent' => '200031'
            ],
            '2038500' => [
                'name' => '南箕輪村',
                'enName' => 'Minamiminowa Village',
                'kana' => 'みなみみのわむら',
                'parent' => '200031'
            ],
            '2038600' => [
                'name' => '中川村',
                'enName' => 'Nakagawa Village',
                'kana' => 'なかがわむら',
                'parent' => '200031'
            ],
            '2038800' => [
                'name' => '宮田村',
                'enName' => 'Miyada Village',
                'kana' => 'みやだむら',
                'parent' => '200031'
            ],
            '2040200' => [
                'name' => '松川町',
                'enName' => 'Matsukawa Town',
                'kana' => 'まつかわまち',
                'parent' => '200033'
            ],
            '2040300' => [
                'name' => '高森町',
                'enName' => 'Takamori Town',
                'kana' => 'たかもりまち',
                'parent' => '200033'
            ],
            '2040400' => [
                'name' => '阿南町',
                'enName' => 'Anan Town',
                'kana' => 'あなんちょう',
                'parent' => '200033'
            ],
            '2040700' => [
                'name' => '阿智村',
                'enName' => 'Achi Village',
                'kana' => 'あちむら',
                'parent' => '200033'
            ],
            '2040900' => [
                'name' => '平谷村',
                'enName' => 'Hiraya Village',
                'kana' => 'ひらやむら',
                'parent' => '200033'
            ],
            '2041000' => [
                'name' => '根羽村',
                'enName' => 'Neba Village',
                'kana' => 'ねばむら',
                'parent' => '200033'
            ],
            '2041100' => [
                'name' => '下條村',
                'enName' => 'Shimojo Village',
                'kana' => 'しもじょうむら',
                'parent' => '200033'
            ],
            '2041200' => [
                'name' => '売木村',
                'enName' => 'Urugi Village',
                'kana' => 'うるぎむら',
                'parent' => '200033'
            ],
            '2041300' => [
                'name' => '天龍村',
                'enName' => 'Tenryu Village',
                'kana' => 'てんりゅうむら',
                'parent' => '200033'
            ],
            '2041400' => [
                'name' => '泰阜村',
                'enName' => 'Yasuoka Village',
                'kana' => 'やすおかむら',
                'parent' => '200033'
            ],
            '2041500' => [
                'name' => '喬木村',
                'enName' => 'Takagi Village',
                'kana' => 'たかぎむら',
                'parent' => '200033'
            ],
            '2041600' => [
                'name' => '豊丘村',
                'enName' => 'Toyooka Village',
                'kana' => 'とよおかむら',
                'parent' => '200033'
            ],
            '2041700' => [
                'name' => '大鹿村',
                'enName' => 'Oshika Village',
                'kana' => 'おおしかむら',
                'parent' => '200033'
            ],
            '2042200' => [
                'name' => '上松町',
                'enName' => 'Agematsu Town',
                'kana' => 'あげまつまち',
                'parent' => '200032'
            ],
            '2042300' => [
                'name' => '南木曽町',
                'enName' => 'Nagiso Town',
                'kana' => 'なぎそまち',
                'parent' => '200032'
            ],
            '2042500' => [
                'name' => '木祖村',
                'enName' => 'Kiso Village',
                'kana' => 'きそむら',
                'parent' => '200032'
            ],
            '2042900' => [
                'name' => '王滝村',
                'enName' => 'Otaki Village',
                'kana' => 'おうたきむら',
                'parent' => '200032'
            ],
            '2043000' => [
                'name' => '大桑村',
                'enName' => 'Okuwa Village',
                'kana' => 'おおくわむら',
                'parent' => '200032'
            ],
            '2043200' => [
                'name' => '木曽町',
                'enName' => 'Kiso Town',
                'kana' => 'きそまち',
                'parent' => '200032'
            ],
            '2044600' => [
                'name' => '麻績村',
                'enName' => 'Omi Village',
                'kana' => 'おみむら',
                'parent' => '200023'
            ],
            '2044800' => [
                'name' => '生坂村',
                'enName' => 'Ikusaka Village',
                'kana' => 'いくさかむら',
                'parent' => '200023'
            ],
            '2045000' => [
                'name' => '山形村',
                'enName' => 'Yamagata Village',
                'kana' => 'やまがたむら',
                'parent' => '200023'
            ],
            '2045100' => [
                'name' => '朝日村',
                'enName' => 'Asahi Village',
                'kana' => 'あさひむら',
                'parent' => '200023'
            ],
            '2045200' => [
                'name' => '筑北村',
                'enName' => 'Chikuhoku Village',
                'kana' => 'ちくほくむら',
                'parent' => '200023'
            ],
            '2048100' => [
                'name' => '池田町',
                'enName' => 'Ikeda Town',
                'kana' => 'いけだまち',
                'parent' => '200013'
            ],
            '2048200' => [
                'name' => '松川村',
                'enName' => 'Matsukawa Village',
                'kana' => 'まつかわむら',
                'parent' => '200013'
            ],
            '2048500' => [
                'name' => '白馬村',
                'enName' => 'Hakuba Village',
                'kana' => 'はくばむら',
                'parent' => '200013'
            ],
            '2048600' => [
                'name' => '小谷村',
                'enName' => 'Otari Village',
                'kana' => 'おたりむら',
                'parent' => '200013'
            ],
            '2052100' => [
                'name' => '坂城町',
                'enName' => 'Sakaki Town',
                'kana' => 'さかきまち',
                'parent' => '200011'
            ],
            '2054100' => [
                'name' => '小布施町',
                'enName' => 'Obuse Town',
                'kana' => 'おぶせまち',
                'parent' => '200011'
            ],
            '2054300' => [
                'name' => '高山村',
                'enName' => 'Takayama Village',
                'kana' => 'たかやまむら',
                'parent' => '200011'
            ],
            '2056100' => [
                'name' => '山ノ内町',
                'enName' => 'Yamanouchi Town',
                'kana' => 'やまのうちまち',
                'parent' => '200012'
            ],
            '2056200' => [
                'name' => '木島平村',
                'enName' => 'Kijimadaira Village',
                'kana' => 'きじまだいらむら',
                'parent' => '200012'
            ],
            '2056300' => [
                'name' => '野沢温泉村',
                'enName' => 'Nozawaonsen Village',
                'kana' => 'のざわおんせんむら',
                'parent' => '200012'
            ],
            '2058300' => [
                'name' => '信濃町',
                'enName' => 'Shinano Town',
                'kana' => 'しなのまち',
                'parent' => '200011'
            ],
            '2058800' => [
                'name' => '小川村',
                'enName' => 'Ogawa Village',
                'kana' => 'おがわむら',
                'parent' => '200011'
            ],
            '2059000' => [
                'name' => '飯綱町',
                'enName' => 'Iizuna Town',
                'kana' => 'いいづなまち',
                'parent' => '200011'
            ],
            '2060200' => [
                'name' => '栄村',
                'enName' => 'Sakae Village',
                'kana' => 'さかえむら',
                'parent' => '200012'
            ],
            '2120100' => [
                'name' => '岐阜市',
                'enName' => 'Gifu City',
                'kana' => 'ぎふし',
                'parent' => '210011'
            ],
            '2120200' => [
                'name' => '大垣市',
                'enName' => 'Ogaki City',
                'kana' => 'おおがきし',
                'parent' => '210011'
            ],
            '2120300' => [
                'name' => '高山市',
                'enName' => 'Takayama City',
                'kana' => 'たかやまし',
                'parent' => '210021'
            ],
            '2120400' => [
                'name' => '多治見市',
                'enName' => 'Tajimi City',
                'kana' => 'たじみし',
                'parent' => '210012'
            ],
            '2120500' => [
                'name' => '関市',
                'enName' => 'Seki City',
                'kana' => 'せきし',
                'parent' => '210013'
            ],
            '2120600' => [
                'name' => '中津川市',
                'enName' => 'Nakatsugawa City',
                'kana' => 'なかつがわし',
                'parent' => '210012'
            ],
            '2120700' => [
                'name' => '美濃市',
                'enName' => 'Mino City',
                'kana' => 'みのし',
                'parent' => '210013'
            ],
            '2120800' => [
                'name' => '瑞浪市',
                'enName' => 'Mizunami City',
                'kana' => 'みずなみし',
                'parent' => '210012'
            ],
            '2120900' => [
                'name' => '羽島市',
                'enName' => 'Hashima City',
                'kana' => 'はしまし',
                'parent' => '210011'
            ],
            '2121000' => [
                'name' => '恵那市',
                'enName' => 'Ena City',
                'kana' => 'えなし',
                'parent' => '210012'
            ],
            '2121100' => [
                'name' => '美濃加茂市',
                'enName' => 'Minokamo City',
                'kana' => 'みのかもし',
                'parent' => '210013'
            ],
            '2121200' => [
                'name' => '土岐市',
                'enName' => 'Toki City',
                'kana' => 'ときし',
                'parent' => '210012'
            ],
            '2121300' => [
                'name' => '各務原市',
                'enName' => 'Kakamigahara City',
                'kana' => 'かかみがはらし',
                'parent' => '210011'
            ],
            '2121400' => [
                'name' => '可児市',
                'enName' => 'Kani City',
                'kana' => 'かにし',
                'parent' => '210013'
            ],
            '2121500' => [
                'name' => '山県市',
                'enName' => 'Yamagata City',
                'kana' => 'やまがたし',
                'parent' => '210011'
            ],
            '2121600' => [
                'name' => '瑞穂市',
                'enName' => 'Mizuho City',
                'kana' => 'みずほし',
                'parent' => '210011'
            ],
            '2121700' => [
                'name' => '飛騨市',
                'enName' => 'Hida City',
                'kana' => 'ひだし',
                'parent' => '210021'
            ],
            '2121800' => [
                'name' => '本巣市',
                'enName' => 'Motosu City',
                'kana' => 'もとすし',
                'parent' => '210011'
            ],
            '2121900' => [
                'name' => '郡上市',
                'enName' => 'Gujo City',
                'kana' => 'ぐじょうし',
                'parent' => '210013'
            ],
            '2122000' => [
                'name' => '下呂市',
                'enName' => 'Gero City',
                'kana' => 'げろし',
                'parent' => '210022'
            ],
            '2122100' => [
                'name' => '海津市',
                'enName' => 'Kaizu City',
                'kana' => 'かいづし',
                'parent' => '210011'
            ],
            '2130200' => [
                'name' => '岐南町',
                'enName' => 'Ginan Town',
                'kana' => 'ぎなんちょう',
                'parent' => '210011'
            ],
            '2130300' => [
                'name' => '笠松町',
                'enName' => 'Kasamatsu Town',
                'kana' => 'かさまつちょう',
                'parent' => '210011'
            ],
            '2134100' => [
                'name' => '養老町',
                'enName' => 'Yoro Town',
                'kana' => 'ようろうちょう',
                'parent' => '210011'
            ],
            '2136100' => [
                'name' => '垂井町',
                'enName' => 'Tarui Town',
                'kana' => 'たるいちょう',
                'parent' => '210011'
            ],
            '2136200' => [
                'name' => '関ケ原町',
                'enName' => 'Sekigahara Town',
                'kana' => 'せきがはらちょう',
                'parent' => '210011'
            ],
            '2138100' => [
                'name' => '神戸町',
                'enName' => 'Godo Town',
                'kana' => 'ごうどちょう',
                'parent' => '210011'
            ],
            '2138200' => [
                'name' => '輪之内町',
                'enName' => 'Wanouchi Town',
                'kana' => 'わのうちちょう',
                'parent' => '210011'
            ],
            '2138300' => [
                'name' => '安八町',
                'enName' => 'Ampachi Town',
                'kana' => 'あんぱちちょう',
                'parent' => '210011'
            ],
            '2140100' => [
                'name' => '揖斐川町',
                'enName' => 'Ibigawa Town',
                'kana' => 'いびがわちょう',
                'parent' => '210011'
            ],
            '2140300' => [
                'name' => '大野町',
                'enName' => 'Ono Town',
                'kana' => 'おおのちょう',
                'parent' => '210011'
            ],
            '2140400' => [
                'name' => '池田町',
                'enName' => 'Ikeda Town',
                'kana' => 'いけだちょう',
                'parent' => '210011'
            ],
            '2142100' => [
                'name' => '北方町',
                'enName' => 'Kitagata Town',
                'kana' => 'きたがたちょう',
                'parent' => '210011'
            ],
            '2150100' => [
                'name' => '坂祝町',
                'enName' => 'Sakahogi Town',
                'kana' => 'さかほぎちょう',
                'parent' => '210013'
            ],
            '2150200' => [
                'name' => '富加町',
                'enName' => 'Tomika Town',
                'kana' => 'とみかちょう',
                'parent' => '210013'
            ],
            '2150300' => [
                'name' => '川辺町',
                'enName' => 'Kawabe Town',
                'kana' => 'かわべちょう',
                'parent' => '210013'
            ],
            '2150400' => [
                'name' => '七宗町',
                'enName' => 'Hichiso Town',
                'kana' => 'ひちそうちょう',
                'parent' => '210013'
            ],
            '2150500' => [
                'name' => '八百津町',
                'enName' => 'Yaotsu Town',
                'kana' => 'やおつちょう',
                'parent' => '210013'
            ],
            '2150600' => [
                'name' => '白川町',
                'enName' => 'Shirakawa Town',
                'kana' => 'しらかわちょう',
                'parent' => '210013'
            ],
            '2150700' => [
                'name' => '東白川村',
                'enName' => 'Higashishirakawa Village',
                'kana' => 'ひがししらかわむら',
                'parent' => '210013'
            ],
            '2152100' => [
                'name' => '御嵩町',
                'enName' => 'Mitake Town',
                'kana' => 'みたけちょう',
                'parent' => '210013'
            ],
            '2160400' => [
                'name' => '白川村',
                'enName' => 'Shirakawa Village',
                'kana' => 'しらかわむら',
                'parent' => '210021'
            ],
            '2210001' => [
                'name' => '静岡市南部',
                'enName' => 'Southern Shizuoka City',
                'kana' => 'しずおかしなんぶ',
                'parent' => '220011'
            ],
            '2210002' => [
                'name' => '静岡市北部',
                'enName' => 'Northern Shizuoka City',
                'kana' => 'しずおかしほうぶ',
                'parent' => '220012'
            ],
            '2213001' => [
                'name' => '浜松市南部',
                'enName' => 'Southern Hamamatsu City',
                'kana' => 'はままつしなんぶ',
                'parent' => '220042'
            ],
            '2213002' => [
                'name' => '浜松市北部',
                'enName' => 'Northern Hamamatsu City',
                'kana' => 'はままつしほくぶ',
                'parent' => '220041'
            ],
            '2220300' => [
                'name' => '沼津市',
                'enName' => 'Numazu City',
                'kana' => 'ぬまづし',
                'parent' => '220031'
            ],
            '2220500' => [
                'name' => '熱海市',
                'enName' => 'Atami City',
                'kana' => 'あたみし',
                'parent' => '220021'
            ],
            '2220600' => [
                'name' => '三島市',
                'enName' => 'Mishima City',
                'kana' => 'みしまし',
                'parent' => '220031'
            ],
            '2220700' => [
                'name' => '富士宮市',
                'enName' => 'Fujinomiya City',
                'kana' => 'ふじのみやし',
                'parent' => '220032'
            ],
            '2220800' => [
                'name' => '伊東市',
                'enName' => 'Ito City',
                'kana' => 'いとうし',
                'parent' => '220021'
            ],
            '2220900' => [
                'name' => '島田市',
                'enName' => 'Shimada City',
                'kana' => 'しまだし',
                'parent' => '220011'
            ],
            '2221000' => [
                'name' => '富士市',
                'enName' => 'Fuji City',
                'kana' => 'ふじし',
                'parent' => '220032'
            ],
            '2221100' => [
                'name' => '磐田市',
                'enName' => 'Iwata City',
                'kana' => 'いわたし',
                'parent' => '220042'
            ],
            '2221200' => [
                'name' => '焼津市',
                'enName' => 'Yaizu City',
                'kana' => 'やいづし',
                'parent' => '220011'
            ],
            '2221300' => [
                'name' => '掛川市',
                'enName' => 'Kakegawa City',
                'kana' => 'かけがわし',
                'parent' => '220042'
            ],
            '2221400' => [
                'name' => '藤枝市',
                'enName' => 'Fujieda City',
                'kana' => 'ふじえだし',
                'parent' => '220011'
            ],
            '2221500' => [
                'name' => '御殿場市',
                'enName' => 'Gotemba City',
                'kana' => 'ごてんばし',
                'parent' => '220031'
            ],
            '2221600' => [
                'name' => '袋井市',
                'enName' => 'Fukuroi City',
                'kana' => 'ふくろいし',
                'parent' => '220042'
            ],
            '2221900' => [
                'name' => '下田市',
                'enName' => 'Shimoda City',
                'kana' => 'しもだし',
                'parent' => '220022'
            ],
            '2222000' => [
                'name' => '裾野市',
                'enName' => 'Susono City',
                'kana' => 'すそのし',
                'parent' => '220031'
            ],
            '2222100' => [
                'name' => '湖西市',
                'enName' => 'Kosai City',
                'kana' => 'こさいし',
                'parent' => '220042'
            ],
            '2222200' => [
                'name' => '伊豆市',
                'enName' => 'Izu City',
                'kana' => 'いずし',
                'parent' => '220021'
            ],
            '2222300' => [
                'name' => '御前崎市',
                'enName' => 'Omaezaki City',
                'kana' => 'おまえざきし',
                'parent' => '220042'
            ],
            '2222400' => [
                'name' => '菊川市',
                'enName' => 'Kikugawa City',
                'kana' => 'きくがわし',
                'parent' => '220042'
            ],
            '2222500' => [
                'name' => '伊豆の国市',
                'enName' => 'Izunokuni City',
                'kana' => 'いずのくにし',
                'parent' => '220021'
            ],
            '2222600' => [
                'name' => '牧之原市',
                'enName' => 'Makinohara City',
                'kana' => 'まきのはらし',
                'parent' => '220011'
            ],
            '2230100' => [
                'name' => '東伊豆町',
                'enName' => 'Higashiizu Town',
                'kana' => 'ひがしいずちょう',
                'parent' => '220022'
            ],
            '2230200' => [
                'name' => '河津町',
                'enName' => 'Kawazu Town',
                'kana' => 'かわづちょう',
                'parent' => '220022'
            ],
            '2230400' => [
                'name' => '南伊豆町',
                'enName' => 'Miamiizu Town',
                'kana' => 'みなみいずちょう',
                'parent' => '220022'
            ],
            '2230500' => [
                'name' => '松崎町',
                'enName' => 'Matsuzaki Town',
                'kana' => 'まつざきちょう',
                'parent' => '220022'
            ],
            '2230600' => [
                'name' => '西伊豆町',
                'enName' => 'Nishiizu Town',
                'kana' => 'にしいずちょう',
                'parent' => '220022'
            ],
            '2232500' => [
                'name' => '函南町',
                'enName' => 'Kannami Town',
                'kana' => 'かんなみちょう',
                'parent' => '220021'
            ],
            '2234100' => [
                'name' => '清水町',
                'enName' => 'Shimizu Town',
                'kana' => 'しみずちょう',
                'parent' => '220031'
            ],
            '2234200' => [
                'name' => '長泉町',
                'enName' => 'Nagaizumi Town',
                'kana' => 'ながいずみちょう',
                'parent' => '220031'
            ],
            '2234400' => [
                'name' => '小山町',
                'enName' => 'Oyama Town',
                'kana' => 'おやまちょう',
                'parent' => '220031'
            ],
            '2242400' => [
                'name' => '吉田町',
                'enName' => 'Yoshida Town',
                'kana' => 'よしだちょう',
                'parent' => '220011'
            ],
            '2242900' => [
                'name' => '川根本町',
                'enName' => 'Kawanehoncho Town',
                'kana' => 'かわねほんちょう',
                'parent' => '220012'
            ],
            '2246100' => [
                'name' => '森町',
                'enName' => 'Mori Town',
                'kana' => 'もりまち',
                'parent' => '220042'
            ],
            '2310000' => [
                'name' => '名古屋市',
                'enName' => 'Nagoya City',
                'kana' => 'なごやし',
                'parent' => '230011'
            ],
            '2320100' => [
                'name' => '豊橋市',
                'enName' => 'Toyohashi City',
                'kana' => 'とよはしし',
                'parent' => '230023'
            ],
            '2320200' => [
                'name' => '岡崎市',
                'enName' => 'Okazaki City',
                'kana' => 'おかざきし',
                'parent' => '230014'
            ],
            '2320300' => [
                'name' => '一宮市',
                'enName' => 'Ichinomiya City',
                'kana' => 'いちのみやし',
                'parent' => '230012'
            ],
            '2320400' => [
                'name' => '瀬戸市',
                'enName' => 'Seto City',
                'kana' => 'せとし',
                'parent' => '230011'
            ],
            '2320500' => [
                'name' => '半田市',
                'enName' => 'Handa City',
                'kana' => 'はんだし',
                'parent' => '230013'
            ],
            '2320600' => [
                'name' => '春日井市',
                'enName' => 'Kasugai City',
                'kana' => 'かすがいし',
                'parent' => '230011'
            ],
            '2320700' => [
                'name' => '豊川市',
                'enName' => 'Toyokawa City',
                'kana' => 'とよかわし',
                'parent' => '230023'
            ],
            '2320800' => [
                'name' => '津島市',
                'enName' => 'Tsushima City',
                'kana' => 'つしまし',
                'parent' => '230012'
            ],
            '2320900' => [
                'name' => '碧南市',
                'enName' => 'Hekinan City',
                'kana' => 'へきなんし',
                'parent' => '230014'
            ],
            '2321000' => [
                'name' => '刈谷市',
                'enName' => 'Kariya City',
                'kana' => 'かりやし',
                'parent' => '230014'
            ],
            '2321101' => [
                'name' => '豊田市西部',
                'enName' => 'Western Toyota City',
                'kana' => 'とよたしせいぶ',
                'parent' => '230015'
            ],
            '2321102' => [
                'name' => '豊田市東部',
                'enName' => 'Eastern Toyota City',
                'kana' => 'とよたしとうぶ',
                'parent' => '230021'
            ],
            '2321200' => [
                'name' => '安城市',
                'enName' => 'Anjo City',
                'kana' => 'あんじょうし',
                'parent' => '230014'
            ],
            '2321300' => [
                'name' => '西尾市',
                'enName' => 'Nishio City',
                'kana' => 'にしおし',
                'parent' => '230014'
            ],
            '2321400' => [
                'name' => '蒲郡市',
                'enName' => 'Gamagori City',
                'kana' => 'がまごおりし',
                'parent' => '230023'
            ],
            '2321500' => [
                'name' => '犬山市',
                'enName' => 'Inuyama City',
                'kana' => 'いぬやまし',
                'parent' => '230011'
            ],
            '2321600' => [
                'name' => '常滑市',
                'enName' => 'Tokoname City',
                'kana' => 'とこなめし',
                'parent' => '230013'
            ],
            '2321700' => [
                'name' => '江南市',
                'enName' => 'Konan City',
                'kana' => 'こうなんし',
                'parent' => '230012'
            ],
            '2321900' => [
                'name' => '小牧市',
                'enName' => 'Komaki City',
                'kana' => 'こまきし',
                'parent' => '230011'
            ],
            '2322000' => [
                'name' => '稲沢市',
                'enName' => 'Inazawa City',
                'kana' => 'いなざわし',
                'parent' => '230012'
            ],
            '2322100' => [
                'name' => '新城市',
                'enName' => 'Shinshiro City',
                'kana' => 'しんしろし',
                'parent' => '230022'
            ],
            '2322200' => [
                'name' => '東海市',
                'enName' => 'Tokai City',
                'kana' => 'とうかいし',
                'parent' => '230013'
            ],
            '2322300' => [
                'name' => '大府市',
                'enName' => 'Obu City',
                'kana' => 'おおぶし',
                'parent' => '230013'
            ],
            '2322400' => [
                'name' => '知多市',
                'enName' => 'Chita City',
                'kana' => 'ちたし',
                'parent' => '230013'
            ],
            '2322500' => [
                'name' => '知立市',
                'enName' => 'Chiryu City',
                'kana' => 'ちりゅうし',
                'parent' => '230014'
            ],
            '2322600' => [
                'name' => '尾張旭市',
                'enName' => 'Owariasahi City',
                'kana' => 'おわりあさひし',
                'parent' => '230011'
            ],
            '2322700' => [
                'name' => '高浜市',
                'enName' => 'Takahama City',
                'kana' => 'たかはまし',
                'parent' => '230014'
            ],
            '2322800' => [
                'name' => '岩倉市',
                'enName' => 'Iwakura City',
                'kana' => 'いわくらし',
                'parent' => '230012'
            ],
            '2322900' => [
                'name' => '豊明市',
                'enName' => 'Toyoake City',
                'kana' => 'とよあけし',
                'parent' => '230011'
            ],
            '2323000' => [
                'name' => '日進市',
                'enName' => 'Nisshin City',
                'kana' => 'にっしんし',
                'parent' => '230011'
            ],
            '2323100' => [
                'name' => '田原市',
                'enName' => 'Tahara City',
                'kana' => 'たはらし',
                'parent' => '230023'
            ],
            '2323200' => [
                'name' => '愛西市',
                'enName' => 'Aisai City',
                'kana' => 'あいさいし',
                'parent' => '230012'
            ],
            '2323300' => [
                'name' => '清須市',
                'enName' => 'Kiyosu City',
                'kana' => 'きよすし',
                'parent' => '230012'
            ],
            '2323400' => [
                'name' => '北名古屋市',
                'enName' => 'Kitanagoya City',
                'kana' => 'きたなごやし',
                'parent' => '230012'
            ],
            '2323500' => [
                'name' => '弥富市',
                'enName' => 'Yatomi City',
                'kana' => 'やとみし',
                'parent' => '230012'
            ],
            '2323600' => [
                'name' => 'みよし市',
                'enName' => 'Miyoshi City',
                'kana' => 'みよしし',
                'parent' => '230015'
            ],
            '2323700' => [
                'name' => 'あま市',
                'enName' => 'Ama City',
                'kana' => 'あまし',
                'parent' => '230012'
            ],
            '2323800' => [
                'name' => '長久手市',
                'enName' => 'Nagakute City',
                'kana' => 'ながくてし',
                'parent' => '230011'
            ],
            '2330200' => [
                'name' => '東郷町',
                'enName' => 'Togo Town',
                'kana' => 'とうごうちょう',
                'parent' => '230011'
            ],
            '2334200' => [
                'name' => '豊山町',
                'enName' => 'Toyoyama Town',
                'kana' => 'とよやまちょう',
                'parent' => '230012'
            ],
            '2336100' => [
                'name' => '大口町',
                'enName' => 'Oguchi Town',
                'kana' => 'おおぐちちょう',
                'parent' => '230012'
            ],
            '2336200' => [
                'name' => '扶桑町',
                'enName' => 'Fuso Town',
                'kana' => 'ふそうちょう',
                'parent' => '230012'
            ],
            '2342400' => [
                'name' => '大治町',
                'enName' => 'Oharu Town',
                'kana' => 'おおはるちょう',
                'parent' => '230012'
            ],
            '2342500' => [
                'name' => '蟹江町',
                'enName' => 'Kanie Town',
                'kana' => 'かにえちょう',
                'parent' => '230012'
            ],
            '2342700' => [
                'name' => '飛島村',
                'enName' => 'Tobishima Village',
                'kana' => 'とびしまむら',
                'parent' => '230012'
            ],
            '2344100' => [
                'name' => '阿久比町',
                'enName' => 'Agui Town',
                'kana' => 'あぐいちょう',
                'parent' => '230013'
            ],
            '2344200' => [
                'name' => '東浦町',
                'enName' => 'Higashiura Town',
                'kana' => 'ひがしうらちょう',
                'parent' => '230013'
            ],
            '2344500' => [
                'name' => '南知多町',
                'enName' => 'Minamichita Town',
                'kana' => 'みなみちたちょう',
                'parent' => '230013'
            ],
            '2344600' => [
                'name' => '美浜町',
                'enName' => 'Mihama Town',
                'kana' => 'みはまちょう',
                'parent' => '230013'
            ],
            '2344700' => [
                'name' => '武豊町',
                'enName' => 'Taketoyo Town',
                'kana' => 'たけとよちょう',
                'parent' => '230013'
            ],
            '2350100' => [
                'name' => '幸田町',
                'enName' => 'Kota Town',
                'kana' => 'こうたちょう',
                'parent' => '230014'
            ],
            '2356100' => [
                'name' => '設楽町',
                'enName' => 'Shitara Town',
                'kana' => 'したらちょう',
                'parent' => '230022'
            ],
            '2356200' => [
                'name' => '東栄町',
                'enName' => 'Toei Town',
                'kana' => 'とうえいちょう',
                'parent' => '230022'
            ],
            '2356300' => [
                'name' => '豊根村',
                'enName' => 'Toyone Village',
                'kana' => 'とよねむら',
                'parent' => '230022'
            ],
            '2420100' => [
                'name' => '津市',
                'enName' => 'Tsu City',
                'kana' => 'つし',
                'parent' => '240011'
            ],
            '2420200' => [
                'name' => '四日市市',
                'enName' => 'Yokkaichi City',
                'kana' => 'よっかいちし',
                'parent' => '240012'
            ],
            '2420300' => [
                'name' => '伊勢市',
                'enName' => 'Ise City',
                'kana' => 'いせし',
                'parent' => '240021'
            ],
            '2420400' => [
                'name' => '松阪市',
                'enName' => 'Matsusaka City',
                'kana' => 'まつさかし',
                'parent' => '240011'
            ],
            '2420500' => [
                'name' => '桑名市',
                'enName' => 'Kuwana City',
                'kana' => 'くわなし',
                'parent' => '240012'
            ],
            '2420700' => [
                'name' => '鈴鹿市',
                'enName' => 'Suzuka City',
                'kana' => 'すずかし',
                'parent' => '240012'
            ],
            '2420800' => [
                'name' => '名張市',
                'enName' => 'Nabari City',
                'kana' => 'なばりし',
                'parent' => '240013'
            ],
            '2420900' => [
                'name' => '尾鷲市',
                'enName' => 'Owase City',
                'kana' => 'おわせし',
                'parent' => '240022'
            ],
            '2421000' => [
                'name' => '亀山市',
                'enName' => 'Kameyama City',
                'kana' => 'かめやまし',
                'parent' => '240012'
            ],
            '2421100' => [
                'name' => '鳥羽市',
                'enName' => 'Toba City',
                'kana' => 'とばし',
                'parent' => '240021'
            ],
            '2421200' => [
                'name' => '熊野市',
                'enName' => 'Kumano City',
                'kana' => 'くまのし',
                'parent' => '240022'
            ],
            '2421400' => [
                'name' => 'いなべ市',
                'enName' => 'Inabe City',
                'kana' => 'いなべし',
                'parent' => '240012'
            ],
            '2421500' => [
                'name' => '志摩市',
                'enName' => 'Shima City',
                'kana' => 'しまし',
                'parent' => '240021'
            ],
            '2421600' => [
                'name' => '伊賀市',
                'enName' => 'Iga City',
                'kana' => 'いがし',
                'parent' => '240013'
            ],
            '2430300' => [
                'name' => '木曽岬町',
                'enName' => 'Kisosaki Town',
                'kana' => 'きそさきちょう',
                'parent' => '240012'
            ],
            '2432400' => [
                'name' => '東員町',
                'enName' => 'Toin Town',
                'kana' => 'とういんちょう',
                'parent' => '240012'
            ],
            '2434100' => [
                'name' => '菰野町',
                'enName' => 'Komono Town',
                'kana' => 'こものちょう',
                'parent' => '240012'
            ],
            '2434300' => [
                'name' => '朝日町',
                'enName' => 'Asahi Town',
                'kana' => 'あさひちょう',
                'parent' => '240012'
            ],
            '2434400' => [
                'name' => '川越町',
                'enName' => 'Kawagoe Town',
                'kana' => 'かわごえちょう',
                'parent' => '240012'
            ],
            '2444100' => [
                'name' => '多気町',
                'enName' => 'Taki Town',
                'kana' => 'たきちょう',
                'parent' => '240011'
            ],
            '2444200' => [
                'name' => '明和町',
                'enName' => 'Meiwa Town',
                'kana' => 'めいわちょう',
                'parent' => '240011'
            ],
            '2444300' => [
                'name' => '大台町',
                'enName' => 'Odai Town',
                'kana' => 'おおだいちょう',
                'parent' => '240022'
            ],
            '2446100' => [
                'name' => '玉城町',
                'enName' => 'Tamaki Town',
                'kana' => 'たまきちょう',
                'parent' => '240021'
            ],
            '2447000' => [
                'name' => '度会町',
                'enName' => 'Watarai Town',
                'kana' => 'わたらいちょう',
                'parent' => '240021'
            ],
            '2447100' => [
                'name' => '大紀町',
                'enName' => 'Taiki Town',
                'kana' => 'たいきちょう',
                'parent' => '240022'
            ],
            '2447200' => [
                'name' => '南伊勢町',
                'enName' => 'Minamiise Town',
                'kana' => 'みなみいせちょう',
                'parent' => '240021'
            ],
            '2454300' => [
                'name' => '紀北町',
                'enName' => 'Kihoku Town',
                'kana' => 'きほくちょう',
                'parent' => '240022'
            ],
            '2456100' => [
                'name' => '御浜町',
                'enName' => 'Mihama Town',
                'kana' => 'みはまちょう',
                'parent' => '240022'
            ],
            '2456200' => [
                'name' => '紀宝町',
                'enName' => 'Kiho Town',
                'kana' => 'きほうちょう',
                'parent' => '240022'
            ],
            '2520101' => [
                'name' => '大津市南部',
                'enName' => 'Southern Otsu City',
                'kana' => 'おおつしなんぶ',
                'parent' => '250011'
            ],
            '2520102' => [
                'name' => '大津市北部',
                'enName' => 'Northern Otsu City',
                'kana' => 'おおつしほくぶ',
                'parent' => '250021'
            ],
            '2520200' => [
                'name' => '彦根市',
                'enName' => 'Hikone City',
                'kana' => 'ひこねし',
                'parent' => '250023'
            ],
            '2520300' => [
                'name' => '長浜市',
                'enName' => 'Nagahama City',
                'kana' => 'ながはまし',
                'parent' => '250022'
            ],
            '2520400' => [
                'name' => '近江八幡市',
                'enName' => 'Omihachiman City',
                'kana' => 'おうみはちまんし',
                'parent' => '250012'
            ],
            '2520600' => [
                'name' => '草津市',
                'enName' => 'Kusatsu City',
                'kana' => 'くさつし',
                'parent' => '250011'
            ],
            '2520700' => [
                'name' => '守山市',
                'enName' => 'Moriyama City',
                'kana' => 'もりやまし',
                'parent' => '250011'
            ],
            '2520800' => [
                'name' => '栗東市',
                'enName' => 'Ritto City',
                'kana' => 'りっとうし',
                'parent' => '250011'
            ],
            '2520900' => [
                'name' => '甲賀市',
                'enName' => 'Koka City',
                'kana' => 'こうかし',
                'parent' => '250013'
            ],
            '2521000' => [
                'name' => '野洲市',
                'enName' => 'Yasu City',
                'kana' => 'やすし',
                'parent' => '250011'
            ],
            '2521100' => [
                'name' => '湖南市',
                'enName' => 'Konan City',
                'kana' => 'こなんし',
                'parent' => '250013'
            ],
            '2521200' => [
                'name' => '高島市',
                'enName' => 'Takashima City',
                'kana' => 'たかしまし',
                'parent' => '250021'
            ],
            '2521300' => [
                'name' => '東近江市',
                'enName' => 'Higashiomi City',
                'kana' => 'ひがしおうみし',
                'parent' => '250012'
            ],
            '2521400' => [
                'name' => '米原市',
                'enName' => 'Maibara City',
                'kana' => 'まいばらし',
                'parent' => '250022'
            ],
            '2538300' => [
                'name' => '日野町',
                'enName' => 'Hino Town',
                'kana' => 'ひのちょう',
                'parent' => '250012'
            ],
            '2538400' => [
                'name' => '竜王町',
                'enName' => 'Ryuoh Town',
                'kana' => 'りゅうおうちょう',
                'parent' => '250012'
            ],
            '2542500' => [
                'name' => '愛荘町',
                'enName' => 'Aisho Town',
                'kana' => 'あいしょうちょう',
                'parent' => '250023'
            ],
            '2544100' => [
                'name' => '豊郷町',
                'enName' => 'Toyosato Town',
                'kana' => 'とよさとちょう',
                'parent' => '250023'
            ],
            '2544200' => [
                'name' => '甲良町',
                'enName' => 'Kora Town',
                'kana' => 'こうらちょう',
                'parent' => '250023'
            ],
            '2544300' => [
                'name' => '多賀町',
                'enName' => 'Taga Town',
                'kana' => 'たがちょう',
                'parent' => '250023'
            ],
            '2610000' => [
                'name' => '京都市',
                'enName' => 'Kyoto City',
                'kana' => 'きょうとし',
                'parent' => '260011'
            ],
            '2620100' => [
                'name' => '福知山市',
                'enName' => 'Fukuchiyama City',
                'kana' => 'ふくちやまし',
                'parent' => '260023'
            ],
            '2620200' => [
                'name' => '舞鶴市',
                'enName' => 'Maizuru City',
                'kana' => 'まいづるし',
                'parent' => '260022'
            ],
            '2620300' => [
                'name' => '綾部市',
                'enName' => 'Ayabe City',
                'kana' => 'あやべし',
                'parent' => '260022'
            ],
            '2620400' => [
                'name' => '宇治市',
                'enName' => 'Uji City',
                'kana' => 'うじし',
                'parent' => '260013'
            ],
            '2620500' => [
                'name' => '宮津市',
                'enName' => 'Miyazu City',
                'kana' => 'みやづし',
                'parent' => '260021'
            ],
            '2620600' => [
                'name' => '亀岡市',
                'enName' => 'Kameoka City',
                'kana' => 'かめおかし',
                'parent' => '260011'
            ],
            '2620700' => [
                'name' => '城陽市',
                'enName' => 'Joyo City',
                'kana' => 'じょうようし',
                'parent' => '260013'
            ],
            '2620800' => [
                'name' => '向日市',
                'enName' => 'Muko City',
                'kana' => 'むこうし',
                'parent' => '260011'
            ],
            '2620900' => [
                'name' => '長岡京市',
                'enName' => 'Nagaokakyo City',
                'kana' => 'ながおかきょうし',
                'parent' => '260011'
            ],
            '2621000' => [
                'name' => '八幡市',
                'enName' => 'Yawata City',
                'kana' => 'やわたし',
                'parent' => '260013'
            ],
            '2621100' => [
                'name' => '京田辺市',
                'enName' => 'Kyotanabe City',
                'kana' => 'きょうたなべし',
                'parent' => '260013'
            ],
            '2621200' => [
                'name' => '京丹後市',
                'enName' => 'Kyotango City',
                'kana' => 'きょうたんごし',
                'parent' => '260021'
            ],
            '2621300' => [
                'name' => '南丹市',
                'enName' => 'Nantan City',
                'kana' => 'なんたんし',
                'parent' => '260012'
            ],
            '2621400' => [
                'name' => '木津川市',
                'enName' => 'Kizugawa City',
                'kana' => 'きづがわし',
                'parent' => '260014'
            ],
            '2630300' => [
                'name' => '大山崎町',
                'enName' => 'Oyamazaki Town',
                'kana' => 'おおやまざきちょう',
                'parent' => '260011'
            ],
            '2632200' => [
                'name' => '久御山町',
                'enName' => 'Kumiyama Town',
                'kana' => 'くみやまちょう',
                'parent' => '260013'
            ],
            '2634300' => [
                'name' => '井手町',
                'enName' => 'Ide Town',
                'kana' => 'いでちょう',
                'parent' => '260013'
            ],
            '2634400' => [
                'name' => '宇治田原町',
                'enName' => 'Ujitawara Town',
                'kana' => 'うじたわらちょう',
                'parent' => '260013'
            ],
            '2636400' => [
                'name' => '笠置町',
                'enName' => 'Kasagi Town',
                'kana' => 'かさぎちょう',
                'parent' => '260014'
            ],
            '2636500' => [
                'name' => '和束町',
                'enName' => 'Wazuka Town',
                'kana' => 'わづかちょう',
                'parent' => '260014'
            ],
            '2636600' => [
                'name' => '精華町',
                'enName' => 'Seika Town',
                'kana' => 'せいかちょう',
                'parent' => '260014'
            ],
            '2636700' => [
                'name' => '南山城村',
                'enName' => 'Minamiyamashiro Village',
                'kana' => 'みなみやましろむら',
                'parent' => '260014'
            ],
            '2640700' => [
                'name' => '京丹波町',
                'enName' => 'Kyotamba Town',
                'kana' => 'きょうたんばちょう',
                'parent' => '260012'
            ],
            '2646300' => [
                'name' => '伊根町',
                'enName' => 'Ine Town',
                'kana' => 'いねちょう',
                'parent' => '260021'
            ],
            '2646500' => [
                'name' => '与謝野町',
                'enName' => 'Yosano Town',
                'kana' => 'よさのちょう',
                'parent' => '260021'
            ],
            '2710000' => [
                'name' => '大阪市',
                'enName' => 'Osaka City',
                'kana' => 'おおさかし',
                'parent' => '270001'
            ],
            '2714000' => [
                'name' => '堺市',
                'enName' => 'Sakai City',
                'kana' => 'さかいし',
                'parent' => '270005'
            ],
            '2720200' => [
                'name' => '岸和田市',
                'enName' => 'Kishiwada City',
                'kana' => 'きしわだし',
                'parent' => '270005'
            ],
            '2720300' => [
                'name' => '豊中市',
                'enName' => 'Toyonaka City',
                'kana' => 'とよなかし',
                'parent' => '270002'
            ],
            '2720400' => [
                'name' => '池田市',
                'enName' => 'Ikeda City',
                'kana' => 'いけだし',
                'parent' => '270002'
            ],
            '2720500' => [
                'name' => '吹田市',
                'enName' => 'Suita City',
                'kana' => 'すいたし',
                'parent' => '270002'
            ],
            '2720600' => [
                'name' => '泉大津市',
                'enName' => 'Izumiotsu City',
                'kana' => 'いずみおおつし',
                'parent' => '270005'
            ],
            '2720700' => [
                'name' => '高槻市',
                'enName' => 'Takatsuki City',
                'kana' => 'たかつきし',
                'parent' => '270002'
            ],
            '2720800' => [
                'name' => '貝塚市',
                'enName' => 'Kaizuka City',
                'kana' => 'かいづかし',
                'parent' => '270005'
            ],
            '2720900' => [
                'name' => '守口市',
                'enName' => 'Moriguchi City',
                'kana' => 'もりぐちし',
                'parent' => '270003'
            ],
            '2721000' => [
                'name' => '枚方市',
                'enName' => 'Hirakata City',
                'kana' => 'ひらかたし',
                'parent' => '270003'
            ],
            '2721100' => [
                'name' => '茨木市',
                'enName' => 'Ibaraki City',
                'kana' => 'いばらきし',
                'parent' => '270002'
            ],
            '2721200' => [
                'name' => '八尾市',
                'enName' => 'Yao City',
                'kana' => 'やおし',
                'parent' => '270003'
            ],
            '2721300' => [
                'name' => '泉佐野市',
                'enName' => 'Izumisano City',
                'kana' => 'いずみさのし',
                'parent' => '270005'
            ],
            '2721400' => [
                'name' => '富田林市',
                'enName' => 'Tondabayashi City',
                'kana' => 'とんだばやしし',
                'parent' => '270004'
            ],
            '2721500' => [
                'name' => '寝屋川市',
                'enName' => 'Neyagawa City',
                'kana' => 'ねやがわし',
                'parent' => '270003'
            ],
            '2721600' => [
                'name' => '河内長野市',
                'enName' => 'Kawachinagano City',
                'kana' => 'かわちながのし',
                'parent' => '270004'
            ],
            '2721700' => [
                'name' => '松原市',
                'enName' => 'Matsubara City',
                'kana' => 'まつばらし',
                'parent' => '270004'
            ],
            '2721800' => [
                'name' => '大東市',
                'enName' => 'Daito City',
                'kana' => 'だいとうし',
                'parent' => '270003'
            ],
            '2721900' => [
                'name' => '和泉市',
                'enName' => 'Izumi City',
                'kana' => 'いずみし',
                'parent' => '270005'
            ],
            '2722000' => [
                'name' => '箕面市',
                'enName' => 'Minoh City',
                'kana' => 'みのおし',
                'parent' => '270002'
            ],
            '2722100' => [
                'name' => '柏原市',
                'enName' => 'Kashiwara City',
                'kana' => 'かしわらし',
                'parent' => '270003'
            ],
            '2722200' => [
                'name' => '羽曳野市',
                'enName' => 'Habikino City',
                'kana' => 'はびきのし',
                'parent' => '270004'
            ],
            '2722300' => [
                'name' => '門真市',
                'enName' => 'Kadoma City',
                'kana' => 'かどまし',
                'parent' => '270003'
            ],
            '2722400' => [
                'name' => '摂津市',
                'enName' => 'Settsu City',
                'kana' => 'せっつし',
                'parent' => '270002'
            ],
            '2722500' => [
                'name' => '高石市',
                'enName' => 'Takaishi City',
                'kana' => 'たかいしし',
                'parent' => '270005'
            ],
            '2722600' => [
                'name' => '藤井寺市',
                'enName' => 'Fujiidera City',
                'kana' => 'ふじいでらし',
                'parent' => '270004'
            ],
            '2722700' => [
                'name' => '東大阪市',
                'enName' => 'Higashiosaka City',
                'kana' => 'ひがしおおさかし',
                'parent' => '270003'
            ],
            '2722800' => [
                'name' => '泉南市',
                'enName' => 'Sennan City',
                'kana' => 'せんなんし',
                'parent' => '270005'
            ],
            '2722900' => [
                'name' => '四條畷市',
                'enName' => 'Shijonawate City',
                'kana' => 'しじょうなわてし',
                'parent' => '270003'
            ],
            '2723000' => [
                'name' => '交野市',
                'enName' => 'Katano City',
                'kana' => 'かたのし',
                'parent' => '270003'
            ],
            '2723100' => [
                'name' => '大阪狭山市',
                'enName' => 'Osakasayama City',
                'kana' => 'おおさかさやまし',
                'parent' => '270004'
            ],
            '2723200' => [
                'name' => '阪南市',
                'enName' => 'Hannan City',
                'kana' => 'はんなんし',
                'parent' => '270005'
            ],
            '2730100' => [
                'name' => '島本町',
                'enName' => 'Shimamoto Town',
                'kana' => 'しまもとちょう',
                'parent' => '270002'
            ],
            '2732100' => [
                'name' => '豊能町',
                'enName' => 'Toyono Town',
                'kana' => 'とよのちょう',
                'parent' => '270002'
            ],
            '2732200' => [
                'name' => '能勢町',
                'enName' => 'Nose Town',
                'kana' => 'のせちょう',
                'parent' => '270002'
            ],
            '2734100' => [
                'name' => '忠岡町',
                'enName' => 'Tadaoka Town',
                'kana' => 'ただおかちょう',
                'parent' => '270005'
            ],
            '2736100' => [
                'name' => '熊取町',
                'enName' => 'Kumatori Town',
                'kana' => 'くまとりちょう',
                'parent' => '270005'
            ],
            '2736200' => [
                'name' => '田尻町',
                'enName' => 'Tajiri Town',
                'kana' => 'たじりちょう',
                'parent' => '270005'
            ],
            '2736600' => [
                'name' => '岬町',
                'enName' => 'Misaki Town',
                'kana' => 'みさきちょう',
                'parent' => '270005'
            ],
            '2738100' => [
                'name' => '太子町',
                'enName' => 'Taishi Town',
                'kana' => 'たいしちょう',
                'parent' => '270004'
            ],
            '2738200' => [
                'name' => '河南町',
                'enName' => 'Kanan Town',
                'kana' => 'かなんちょう',
                'parent' => '270004'
            ],
            '2738300' => [
                'name' => '千早赤阪村',
                'enName' => 'Chihayaakasaka Village',
                'kana' => 'ちはやあかさかむら',
                'parent' => '270004'
            ],
            '2810000' => [
                'name' => '神戸市',
                'enName' => 'Kobe City',
                'kana' => 'こうべし',
                'parent' => '280011'
            ],
            '2820100' => [
                'name' => '姫路市',
                'enName' => 'Himeji City',
                'kana' => 'ひめじし',
                'parent' => '280015'
            ],
            '2820200' => [
                'name' => '尼崎市',
                'enName' => 'Amagasaki City',
                'kana' => 'あまがさきし',
                'parent' => '280011'
            ],
            '2820300' => [
                'name' => '明石市',
                'enName' => 'Akashi City',
                'kana' => 'あかしし',
                'parent' => '280014'
            ],
            '2820400' => [
                'name' => '西宮市',
                'enName' => 'Nishinomiya City',
                'kana' => 'にしのみやし',
                'parent' => '280011'
            ],
            '2820500' => [
                'name' => '洲本市',
                'enName' => 'Sumoto City',
                'kana' => 'すもとし',
                'parent' => '280016'
            ],
            '2820600' => [
                'name' => '芦屋市',
                'enName' => 'Ashiya City',
                'kana' => 'あしやし',
                'parent' => '280011'
            ],
            '2820700' => [
                'name' => '伊丹市',
                'enName' => 'Itami City',
                'kana' => 'いたみし',
                'parent' => '280011'
            ],
            '2820800' => [
                'name' => '相生市',
                'enName' => 'Aioi City',
                'kana' => 'あいおいし',
                'parent' => '280015'
            ],
            '2820900' => [
                'name' => '豊岡市',
                'enName' => 'Toyooka City',
                'kana' => 'とよおかし',
                'parent' => '280021'
            ],
            '2821000' => [
                'name' => '加古川市',
                'enName' => 'Kakogawa City',
                'kana' => 'かこがわし',
                'parent' => '280014'
            ],
            '2821200' => [
                'name' => '赤穂市',
                'enName' => 'Ako City',
                'kana' => 'あこうし',
                'parent' => '280015'
            ],
            '2821300' => [
                'name' => '西脇市',
                'enName' => 'Nishiwaki City',
                'kana' => 'にしわきし',
                'parent' => '280012'
            ],
            '2821400' => [
                'name' => '宝塚市',
                'enName' => 'Takarazuka City',
                'kana' => 'たからづかし',
                'parent' => '280011'
            ],
            '2821500' => [
                'name' => '三木市',
                'enName' => 'Miki City',
                'kana' => 'みきし',
                'parent' => '280014'
            ],
            '2821600' => [
                'name' => '高砂市',
                'enName' => 'Takasago City',
                'kana' => 'たかさごし',
                'parent' => '280014'
            ],
            '2821700' => [
                'name' => '川西市',
                'enName' => 'Kawanishi City',
                'kana' => 'かわにしし',
                'parent' => '280011'
            ],
            '2821800' => [
                'name' => '小野市',
                'enName' => 'Ono City',
                'kana' => 'おのし',
                'parent' => '280014'
            ],
            '2821900' => [
                'name' => '三田市',
                'enName' => 'Sanda City',
                'kana' => 'さんだし',
                'parent' => '280011'
            ],
            '2822000' => [
                'name' => '加西市',
                'enName' => 'Kasai City',
                'kana' => 'かさいし',
                'parent' => '280014'
            ],
            '2822100' => [
                'name' => '丹波篠山市',
                'enName' => 'Tanba Sasayama City',
                'kana' => 'たんばささやまし',
                'parent' => '280012'
            ],
            '2822200' => [
                'name' => '養父市',
                'enName' => 'Yabu City',
                'kana' => 'やぶし',
                'parent' => '280022'
            ],
            '2822300' => [
                'name' => '丹波市',
                'enName' => 'Tamba City',
                'kana' => 'たんばし',
                'parent' => '280012'
            ],
            '2822400' => [
                'name' => '南あわじ市',
                'enName' => 'Minamiawaji City',
                'kana' => 'みなみあわじし',
                'parent' => '280016'
            ],
            '2822500' => [
                'name' => '朝来市',
                'enName' => 'Asago City',
                'kana' => 'あさごし',
                'parent' => '280022'
            ],
            '2822600' => [
                'name' => '淡路市',
                'enName' => 'Awaji City',
                'kana' => 'あわじし',
                'parent' => '280016'
            ],
            '2822700' => [
                'name' => '宍粟市',
                'enName' => 'Shiso City',
                'kana' => 'しそうし',
                'parent' => '280013'
            ],
            '2822800' => [
                'name' => '加東市',
                'enName' => 'Kato City',
                'kana' => 'かとうし',
                'parent' => '280014'
            ],
            '2822900' => [
                'name' => 'たつの市',
                'enName' => 'Tatsuno City',
                'kana' => 'たつのし',
                'parent' => '280015'
            ],
            '2830100' => [
                'name' => '猪名川町',
                'enName' => 'Inagawa Town',
                'kana' => 'いながわちょう',
                'parent' => '280011'
            ],
            '2836500' => [
                'name' => '多可町',
                'enName' => 'Taka Town',
                'kana' => 'たかちょう',
                'parent' => '280012'
            ],
            '2838100' => [
                'name' => '稲美町',
                'enName' => 'Inami Town',
                'kana' => 'いなみちょう',
                'parent' => '280014'
            ],
            '2838200' => [
                'name' => '播磨町',
                'enName' => 'Harima Town',
                'kana' => 'はりまちょう',
                'parent' => '280014'
            ],
            '2844200' => [
                'name' => '市川町',
                'enName' => 'Ichikawa Town',
                'kana' => 'いちかわちょう',
                'parent' => '280013'
            ],
            '2844300' => [
                'name' => '福崎町',
                'enName' => 'Fukusaki Town',
                'kana' => 'ふくさきちょう',
                'parent' => '280013'
            ],
            '2844600' => [
                'name' => '神河町',
                'enName' => 'Kamikawa Town',
                'kana' => 'かみかわちょう',
                'parent' => '280013'
            ],
            '2846400' => [
                'name' => '太子町',
                'enName' => 'Taishi Town',
                'kana' => 'たいしちょう',
                'parent' => '280015'
            ],
            '2848100' => [
                'name' => '上郡町',
                'enName' => 'Kamigori Town',
                'kana' => 'かみごおりちょう',
                'parent' => '280015'
            ],
            '2850100' => [
                'name' => '佐用町',
                'enName' => 'Sayo Town',
                'kana' => 'さようちょう',
                'parent' => '280013'
            ],
            '2858500' => [
                'name' => '香美町',
                'enName' => 'Kami Town',
                'kana' => 'かみちょう',
                'parent' => '280021'
            ],
            '2858600' => [
                'name' => '新温泉町',
                'enName' => 'Shinonsen Town',
                'kana' => 'しんおんせんちょう',
                'parent' => '280021'
            ],
            '2920100' => [
                'name' => '奈良市',
                'enName' => 'Nara City',
                'kana' => 'ならし',
                'parent' => '290011'
            ],
            '2920200' => [
                'name' => '大和高田市',
                'enName' => 'Yamatotakada City',
                'kana' => 'やまとたかだし',
                'parent' => '290011'
            ],
            '2920300' => [
                'name' => '大和郡山市',
                'enName' => 'Yamatokoriyama City',
                'kana' => 'やまとこおりやまし',
                'parent' => '290011'
            ],
            '2920400' => [
                'name' => '天理市',
                'enName' => 'Tenri City',
                'kana' => 'てんりし',
                'parent' => '290011'
            ],
            '2920500' => [
                'name' => '橿原市',
                'enName' => 'Kashihara City',
                'kana' => 'かしはらし',
                'parent' => '290011'
            ],
            '2920600' => [
                'name' => '桜井市',
                'enName' => 'Sakurai City',
                'kana' => 'さくらいし',
                'parent' => '290011'
            ],
            '2920701' => [
                'name' => '五條市北部',
                'enName' => 'Northern Gojo City',
                'kana' => 'ごじょうしほくぶ',
                'parent' => '290013'
            ],
            '2920702' => [
                'name' => '五條市南部',
                'enName' => 'Southern Gojo City',
                'kana' => 'ごじょうしなんぶ',
                'parent' => '290022'
            ],
            '2920800' => [
                'name' => '御所市',
                'enName' => 'Gose City',
                'kana' => 'ごせし',
                'parent' => '290011'
            ],
            '2920900' => [
                'name' => '生駒市',
                'enName' => 'Ikoma City',
                'kana' => 'いこまし',
                'parent' => '290011'
            ],
            '2921000' => [
                'name' => '香芝市',
                'enName' => 'Kashiba City',
                'kana' => 'かしばし',
                'parent' => '290011'
            ],
            '2921100' => [
                'name' => '葛城市',
                'enName' => 'Katsuragi City',
                'kana' => 'かつらぎし',
                'parent' => '290011'
            ],
            '2921200' => [
                'name' => '宇陀市',
                'enName' => 'Uda City',
                'kana' => 'うだし',
                'parent' => '290012'
            ],
            '2932200' => [
                'name' => '山添村',
                'enName' => 'Yamazoe Village',
                'kana' => 'やまぞえむら',
                'parent' => '290012'
            ],
            '2934200' => [
                'name' => '平群町',
                'enName' => 'Heguri Town',
                'kana' => 'へぐりちょう',
                'parent' => '290011'
            ],
            '2934300' => [
                'name' => '三郷町',
                'enName' => 'Sango Town',
                'kana' => 'さんごうちょう',
                'parent' => '290011'
            ],
            '2934400' => [
                'name' => '斑鳩町',
                'enName' => 'Ikaruga Town',
                'kana' => 'いかるがちょう',
                'parent' => '290011'
            ],
            '2934500' => [
                'name' => '安堵町',
                'enName' => 'Ando Town',
                'kana' => 'あんどちょう',
                'parent' => '290011'
            ],
            '2936100' => [
                'name' => '川西町',
                'enName' => 'Kawanishi Town',
                'kana' => 'かわにしちょう',
                'parent' => '290011'
            ],
            '2936200' => [
                'name' => '三宅町',
                'enName' => 'Miyake Town',
                'kana' => 'みやけちょう',
                'parent' => '290011'
            ],
            '2936300' => [
                'name' => '田原本町',
                'enName' => 'Tawaramoto Town',
                'kana' => 'たわらもとちょう',
                'parent' => '290011'
            ],
            '2938500' => [
                'name' => '曽爾村',
                'enName' => 'Soni Village',
                'kana' => 'そにむら',
                'parent' => '290021'
            ],
            '2938600' => [
                'name' => '御杖村',
                'enName' => 'Mitsue Village',
                'kana' => 'みつえむら',
                'parent' => '290021'
            ],
            '2940100' => [
                'name' => '高取町',
                'enName' => 'Takatori Town',
                'kana' => 'たかとりちょう',
                'parent' => '290011'
            ],
            '2940200' => [
                'name' => '明日香村',
                'enName' => 'Asuka Village',
                'kana' => 'あすかむら',
                'parent' => '290011'
            ],
            '2942400' => [
                'name' => '上牧町',
                'enName' => 'Kammaki Town',
                'kana' => 'かんまきちょう',
                'parent' => '290011'
            ],
            '2942500' => [
                'name' => '王寺町',
                'enName' => 'Oji Town',
                'kana' => 'おうじちょう',
                'parent' => '290011'
            ],
            '2942600' => [
                'name' => '広陵町',
                'enName' => 'Koryo Town',
                'kana' => 'こうりょうちょう',
                'parent' => '290011'
            ],
            '2942700' => [
                'name' => '河合町',
                'enName' => 'Kawai Town',
                'kana' => 'かわいちょう',
                'parent' => '290011'
            ],
            '2944100' => [
                'name' => '吉野町',
                'enName' => 'Yoshino Town',
                'kana' => 'よしのちょう',
                'parent' => '290013'
            ],
            '2944200' => [
                'name' => '大淀町',
                'enName' => 'Oyodo Town',
                'kana' => 'おおよどちょう',
                'parent' => '290013'
            ],
            '2944300' => [
                'name' => '下市町',
                'enName' => 'Shimoichi Town',
                'kana' => 'しもいちちょう',
                'parent' => '290013'
            ],
            '2944400' => [
                'name' => '黒滝村',
                'enName' => 'Kurotaki Village',
                'kana' => 'くろたきむら',
                'parent' => '290021'
            ],
            '2944600' => [
                'name' => '天川村',
                'enName' => 'Tenkawa Village',
                'kana' => 'てんかわむら',
                'parent' => '290021'
            ],
            '2944700' => [
                'name' => '野迫川村',
                'enName' => 'Nosegawa Village',
                'kana' => 'のせがわむら',
                'parent' => '290022'
            ],
            '2944900' => [
                'name' => '十津川村',
                'enName' => 'Totsukawa Village',
                'kana' => 'とつかわむら',
                'parent' => '290022'
            ],
            '2945000' => [
                'name' => '下北山村',
                'enName' => 'Shimokitayama Village',
                'kana' => 'しもきたやまむら',
                'parent' => '290021'
            ],
            '2945100' => [
                'name' => '上北山村',
                'enName' => 'Kamikitayama Village',
                'kana' => 'かみきたやまむら',
                'parent' => '290021'
            ],
            '2945200' => [
                'name' => '川上村',
                'enName' => 'Kawakami Village',
                'kana' => 'かわかみむら',
                'parent' => '290021'
            ],
            '2945300' => [
                'name' => '東吉野村',
                'enName' => 'Higashiyoshino Village',
                'kana' => 'ひがしよしのむら',
                'parent' => '290021'
            ],
            '3020100' => [
                'name' => '和歌山市',
                'enName' => 'Wakayama City',
                'kana' => 'わかやまし',
                'parent' => '300011'
            ],
            '3020200' => [
                'name' => '海南市',
                'enName' => 'Kainan City',
                'kana' => 'かいなんし',
                'parent' => '300011'
            ],
            '3020300' => [
                'name' => '橋本市',
                'enName' => 'Hashimoto City',
                'kana' => 'はしもとし',
                'parent' => '300011'
            ],
            '3020400' => [
                'name' => '有田市',
                'enName' => 'Arida City',
                'kana' => 'ありだし',
                'parent' => '300012'
            ],
            '3020500' => [
                'name' => '御坊市',
                'enName' => 'Gobo City',
                'kana' => 'ごぼうし',
                'parent' => '300012'
            ],
            '3020601' => [
                'name' => '田辺市田辺',
                'enName' => 'Tanabe, Tanabe City',
                'kana' => 'たなべしたなべ',
                'parent' => '300021'
            ],
            '3020602' => [
                'name' => '田辺市龍神',
                'enName' => 'Ryujin, Tanabe City',
                'kana' => 'たなべしりゅうじん',
                'parent' => '300021'
            ],
            '3020603' => [
                'name' => '田辺市中辺路',
                'enName' => 'Nakahechi, Tanabe City',
                'kana' => 'たなべしなかへち',
                'parent' => '300021'
            ],
            '3020604' => [
                'name' => '田辺市大塔',
                'enName' => 'Oto, Tanabe City',
                'kana' => 'たなべしおおとう',
                'parent' => '300021'
            ],
            '3020605' => [
                'name' => '田辺市本宮',
                'enName' => 'Hongu, Tanabe City',
                'kana' => 'たなべしほんぐう',
                'parent' => '300021'
            ],
            '3020700' => [
                'name' => '新宮市',
                'enName' => 'Shingu City',
                'kana' => 'しんぐうし',
                'parent' => '300022'
            ],
            '3020800' => [
                'name' => '紀の川市',
                'enName' => 'Kinokawa City',
                'kana' => 'きのかわし',
                'parent' => '300011'
            ],
            '3020900' => [
                'name' => '岩出市',
                'enName' => 'Iwade City',
                'kana' => 'いわでし',
                'parent' => '300011'
            ],
            '3030400' => [
                'name' => '紀美野町',
                'enName' => 'Kimino Town',
                'kana' => 'きみのちょう',
                'parent' => '300011'
            ],
            '3034100' => [
                'name' => 'かつらぎ町',
                'enName' => 'Katsuragi Town',
                'kana' => 'かつらぎちょう',
                'parent' => '300011'
            ],
            '3034300' => [
                'name' => '九度山町',
                'enName' => 'Kudoyama Town',
                'kana' => 'くどやまちょう',
                'parent' => '300011'
            ],
            '3034400' => [
                'name' => '高野町',
                'enName' => 'Koya Town',
                'kana' => 'こうやちょう',
                'parent' => '300011'
            ],
            '3036100' => [
                'name' => '湯浅町',
                'enName' => 'Yuasa Town',
                'kana' => 'ゆあさちょう',
                'parent' => '300012'
            ],
            '3036200' => [
                'name' => '広川町',
                'enName' => 'Hirogawa Town',
                'kana' => 'ひろがわちょう',
                'parent' => '300012'
            ],
            '3036600' => [
                'name' => '有田川町',
                'enName' => 'Aridagawa Town',
                'kana' => 'ありだがわちょう',
                'parent' => '300012'
            ],
            '3038100' => [
                'name' => '美浜町',
                'enName' => 'Mihama Town',
                'kana' => 'みはまちょう',
                'parent' => '300012'
            ],
            '3038200' => [
                'name' => '日高町',
                'enName' => 'Hidaka Town',
                'kana' => 'ひだかちょう',
                'parent' => '300012'
            ],
            '3038300' => [
                'name' => '由良町',
                'enName' => 'Yura Town',
                'kana' => 'ゆらちょう',
                'parent' => '300012'
            ],
            '3039000' => [
                'name' => '印南町',
                'enName' => 'Inami Town',
                'kana' => 'いなみちょう',
                'parent' => '300012'
            ],
            '3039100' => [
                'name' => 'みなべ町',
                'enName' => 'Minabe Town',
                'kana' => 'みなべちょう',
                'parent' => '300012'
            ],
            '3039200' => [
                'name' => '日高川町',
                'enName' => 'Hidakagawa Town',
                'kana' => 'ひだかがわちょう',
                'parent' => '300012'
            ],
            '3040100' => [
                'name' => '白浜町',
                'enName' => 'Shirahama Town',
                'kana' => 'しらはまちょう',
                'parent' => '300021'
            ],
            '3040400' => [
                'name' => '上富田町',
                'enName' => 'Kamitonda Town',
                'kana' => 'かみとんだちょう',
                'parent' => '300021'
            ],
            '3040600' => [
                'name' => 'すさみ町',
                'enName' => 'Susami Town',
                'kana' => 'すさみちょう',
                'parent' => '300021'
            ],
            '3042100' => [
                'name' => '那智勝浦町',
                'enName' => 'Nachikatsuura Town',
                'kana' => 'なちかつうらちょう',
                'parent' => '300022'
            ],
            '3042200' => [
                'name' => '太地町',
                'enName' => 'Taiji Town',
                'kana' => 'たいじちょう',
                'parent' => '300022'
            ],
            '3042400' => [
                'name' => '古座川町',
                'enName' => 'Kozagawa Town',
                'kana' => 'こざがわちょう',
                'parent' => '300022'
            ],
            '3042700' => [
                'name' => '北山村',
                'enName' => 'Kitayama Village',
                'kana' => 'きたやまむら',
                'parent' => '300022'
            ],
            '3042800' => [
                'name' => '串本町',
                'enName' => 'Kushimoto Town',
                'kana' => 'くしもとちょう',
                'parent' => '300022'
            ],
            '3120101' => [
                'name' => '鳥取市北部',
                'enName' => 'Northern Tottori City',
                'kana' => 'とっとりしほくぶ',
                'parent' => '310011'
            ],
            '3120102' => [
                'name' => '鳥取市南部',
                'enName' => 'Southern Tottori City',
                'kana' => 'とっとりしなんぶ',
                'parent' => '310012'
            ],
            '3120200' => [
                'name' => '米子市',
                'enName' => 'Yonago City',
                'kana' => 'よなごし',
                'parent' => '310022'
            ],
            '3120300' => [
                'name' => '倉吉市',
                'enName' => 'Kurayoshi City',
                'kana' => 'くらよしし',
                'parent' => '310021'
            ],
            '3120400' => [
                'name' => '境港市',
                'enName' => 'Sakaiminato City',
                'kana' => 'さかいみなとし',
                'parent' => '310022'
            ],
            '3130200' => [
                'name' => '岩美町',
                'enName' => 'Iwami Town',
                'kana' => 'いわみちょう',
                'parent' => '310011'
            ],
            '3132500' => [
                'name' => '若桜町',
                'enName' => 'Wakasa Town',
                'kana' => 'わかさちょう',
                'parent' => '310012'
            ],
            '3132800' => [
                'name' => '智頭町',
                'enName' => 'Chizu Town',
                'kana' => 'ちづちょう',
                'parent' => '310012'
            ],
            '3132900' => [
                'name' => '八頭町',
                'enName' => 'Yazu Town',
                'kana' => 'やずちょう',
                'parent' => '310012'
            ],
            '3136400' => [
                'name' => '三朝町',
                'enName' => 'Misasa Town',
                'kana' => 'みささちょう',
                'parent' => '310021'
            ],
            '3137000' => [
                'name' => '湯梨浜町',
                'enName' => 'Yurihama Town',
                'kana' => 'ゆりはまちょう',
                'parent' => '310021'
            ],
            '3137100' => [
                'name' => '琴浦町',
                'enName' => 'Kotoura Town',
                'kana' => 'ことうらちょう',
                'parent' => '310021'
            ],
            '3137200' => [
                'name' => '北栄町',
                'enName' => 'Hokuei Town',
                'kana' => 'ほくえいちょう',
                'parent' => '310021'
            ],
            '3138400' => [
                'name' => '日吉津村',
                'enName' => 'Hiezu Village',
                'kana' => 'ひえづそん',
                'parent' => '310022'
            ],
            '3138600' => [
                'name' => '大山町',
                'enName' => 'Daisen Town',
                'kana' => 'だいせんちょう',
                'parent' => '310022'
            ],
            '3138900' => [
                'name' => '南部町',
                'enName' => 'Nambu Town',
                'kana' => 'なんぶちょう',
                'parent' => '310022'
            ],
            '3139000' => [
                'name' => '伯耆町',
                'enName' => 'Hoki Town',
                'kana' => 'ほうきちょう',
                'parent' => '310022'
            ],
            '3140100' => [
                'name' => '日南町',
                'enName' => 'Nichinan Town',
                'kana' => 'にちなんちょう',
                'parent' => '310023'
            ],
            '3140200' => [
                'name' => '日野町',
                'enName' => 'Hino Town',
                'kana' => 'ひのちょう',
                'parent' => '310023'
            ],
            '3140300' => [
                'name' => '江府町',
                'enName' => 'Kofu Town',
                'kana' => 'こうふちょう',
                'parent' => '310023'
            ],
            '3220100' => [
                'name' => '松江市',
                'enName' => 'Matsue City',
                'kana' => 'まつえし',
                'parent' => '320011'
            ],
            '3220200' => [
                'name' => '浜田市',
                'enName' => 'Hamada City',
                'kana' => 'はまだし',
                'parent' => '320022'
            ],
            '3220300' => [
                'name' => '出雲市',
                'enName' => 'Izumo City',
                'kana' => 'いずもし',
                'parent' => '320012'
            ],
            '3220400' => [
                'name' => '益田市',
                'enName' => 'Masuda City',
                'kana' => 'ますだし',
                'parent' => '320023'
            ],
            '3220500' => [
                'name' => '大田市',
                'enName' => 'Ohda City',
                'kana' => 'おおだし',
                'parent' => '320021'
            ],
            '3220600' => [
                'name' => '安来市',
                'enName' => 'Yasugi City',
                'kana' => 'やすぎし',
                'parent' => '320011'
            ],
            '3220700' => [
                'name' => '江津市',
                'enName' => 'Gotsu City',
                'kana' => 'ごうつし',
                'parent' => '320022'
            ],
            '3220900' => [
                'name' => '雲南市',
                'enName' => 'Unnan City',
                'kana' => 'うんなんし',
                'parent' => '320013'
            ],
            '3234300' => [
                'name' => '奥出雲町',
                'enName' => 'Okuizumo Town',
                'kana' => 'おくいずもちょう',
                'parent' => '320013'
            ],
            '3238600' => [
                'name' => '飯南町',
                'enName' => 'Iinan Town',
                'kana' => 'いいなんちょう',
                'parent' => '320013'
            ],
            '3244100' => [
                'name' => '川本町',
                'enName' => 'Kawamoto Town',
                'kana' => 'かわもとまち',
                'parent' => '320021'
            ],
            '3244800' => [
                'name' => '美郷町',
                'enName' => 'Misato Town',
                'kana' => 'みさとちょう',
                'parent' => '320021'
            ],
            '3244900' => [
                'name' => '邑南町',
                'enName' => 'Onan Town',
                'kana' => 'おおなんちょう',
                'parent' => '320021'
            ],
            '3250100' => [
                'name' => '津和野町',
                'enName' => 'Tsuwano Town',
                'kana' => 'つわのちょう',
                'parent' => '320023'
            ],
            '3250500' => [
                'name' => '吉賀町',
                'enName' => 'Yoshika Town',
                'kana' => 'よしかちょう',
                'parent' => '320023'
            ],
            '3252500' => [
                'name' => '海士町',
                'enName' => 'Ama Town',
                'kana' => 'あまちょう',
                'parent' => '320030'
            ],
            '3252600' => [
                'name' => '西ノ島町',
                'enName' => 'Nishinoshima Town',
                'kana' => 'にしのしまちょう',
                'parent' => '320030'
            ],
            '3252700' => [
                'name' => '知夫村',
                'enName' => 'Chibu Village',
                'kana' => 'ちぶむら',
                'parent' => '320030'
            ],
            '3252800' => [
                'name' => '隠岐の島町',
                'enName' => 'Okinoshima Town',
                'kana' => 'おきのしまちょう',
                'parent' => '320030'
            ],
            '3310000' => [
                'name' => '岡山市',
                'enName' => 'Okayama City',
                'kana' => 'おかやまし',
                'parent' => '330011'
            ],
            '3320200' => [
                'name' => '倉敷市',
                'enName' => 'Kurashiki City',
                'kana' => 'くらしきし',
                'parent' => '330013'
            ],
            '3320300' => [
                'name' => '津山市',
                'enName' => 'Tsuyama City',
                'kana' => 'つやまし',
                'parent' => '330023'
            ],
            '3320400' => [
                'name' => '玉野市',
                'enName' => 'Tamano City',
                'kana' => 'たまのし',
                'parent' => '330011'
            ],
            '3320500' => [
                'name' => '笠岡市',
                'enName' => 'Kasaoka City',
                'kana' => 'かさおかし',
                'parent' => '330014'
            ],
            '3320700' => [
                'name' => '井原市',
                'enName' => 'Ibara City',
                'kana' => 'いばらし',
                'parent' => '330014'
            ],
            '3320800' => [
                'name' => '総社市',
                'enName' => 'Soja City',
                'kana' => 'そうじゃし',
                'parent' => '330013'
            ],
            '3320900' => [
                'name' => '高梁市',
                'enName' => 'Takahashi City',
                'kana' => 'たかはしし',
                'parent' => '330015'
            ],
            '3321000' => [
                'name' => '新見市',
                'enName' => 'Niimi City',
                'kana' => 'にいみし',
                'parent' => '330021'
            ],
            '3321100' => [
                'name' => '備前市',
                'enName' => 'Bizen City',
                'kana' => 'びぜんし',
                'parent' => '330012'
            ],
            '3321200' => [
                'name' => '瀬戸内市',
                'enName' => 'Setouchi City',
                'kana' => 'せとうちし',
                'parent' => '330011'
            ],
            '3321300' => [
                'name' => '赤磐市',
                'enName' => 'Akaiwa City',
                'kana' => 'あかいわし',
                'parent' => '330012'
            ],
            '3321400' => [
                'name' => '真庭市',
                'enName' => 'Maniwa City',
                'kana' => 'まにわし',
                'parent' => '330022'
            ],
            '3321500' => [
                'name' => '美作市',
                'enName' => 'Mimasaka City',
                'kana' => 'みまさかし',
                'parent' => '330024'
            ],
            '3321600' => [
                'name' => '浅口市',
                'enName' => 'Asakuchi City',
                'kana' => 'あさくちし',
                'parent' => '330014'
            ],
            '3334600' => [
                'name' => '和気町',
                'enName' => 'Wake Town',
                'kana' => 'わけちょう',
                'parent' => '330012'
            ],
            '3342300' => [
                'name' => '早島町',
                'enName' => 'Hayashima Town',
                'kana' => 'はやしまちょう',
                'parent' => '330013'
            ],
            '3344500' => [
                'name' => '里庄町',
                'enName' => 'Satosho Town',
                'kana' => 'さとしょうちょう',
                'parent' => '330014'
            ],
            '3346100' => [
                'name' => '矢掛町',
                'enName' => 'Yakage Town',
                'kana' => 'やかげちょう',
                'parent' => '330014'
            ],
            '3358600' => [
                'name' => '新庄村',
                'enName' => 'Shinjo Village',
                'kana' => 'しんじょうそん',
                'parent' => '330022'
            ],
            '3360600' => [
                'name' => '鏡野町',
                'enName' => 'Kagamino Town',
                'kana' => 'かがみのちょう',
                'parent' => '330023'
            ],
            '3362200' => [
                'name' => '勝央町',
                'enName' => 'Shoo Town',
                'kana' => 'しょうおうちょう',
                'parent' => '330024'
            ],
            '3362300' => [
                'name' => '奈義町',
                'enName' => 'Nagi Town',
                'kana' => 'なぎちょう',
                'parent' => '330024'
            ],
            '3364300' => [
                'name' => '西粟倉村',
                'enName' => 'Nishiawakura Village',
                'kana' => 'にしあわくらそん',
                'parent' => '330024'
            ],
            '3366300' => [
                'name' => '久米南町',
                'enName' => 'Kumenan Town',
                'kana' => 'くめなんちょう',
                'parent' => '330023'
            ],
            '3366600' => [
                'name' => '美咲町',
                'enName' => 'Misaki Town',
                'kana' => 'みさきちょう',
                'parent' => '330023'
            ],
            '3368100' => [
                'name' => '吉備中央町',
                'enName' => 'Kibichuo Town',
                'kana' => 'きびちゅうおうちょう',
                'parent' => '330011'
            ],
            '3410000' => [
                'name' => '広島市',
                'enName' => 'Hiroshima City',
                'kana' => 'ひろしまし',
                'parent' => '340011'
            ],
            '3420200' => [
                'name' => '呉市',
                'enName' => 'Kure City',
                'kana' => 'くれし',
                'parent' => '340011'
            ],
            '3420300' => [
                'name' => '竹原市',
                'enName' => 'Takehara City',
                'kana' => 'たけはらし',
                'parent' => '340013'
            ],
            '3420400' => [
                'name' => '三原市',
                'enName' => 'Mihara City',
                'kana' => 'みはらし',
                'parent' => '340012'
            ],
            '3420500' => [
                'name' => '尾道市',
                'enName' => 'Onomichi City',
                'kana' => 'おのみちし',
                'parent' => '340012'
            ],
            '3420700' => [
                'name' => '福山市',
                'enName' => 'Fukuyama City',
                'kana' => 'ふくやまし',
                'parent' => '340012'
            ],
            '3420800' => [
                'name' => '府中市',
                'enName' => 'Fuchu City',
                'kana' => 'ふちゅうし',
                'parent' => '340012'
            ],
            '3420900' => [
                'name' => '三次市',
                'enName' => 'Miyoshi City',
                'kana' => 'みよしし',
                'parent' => '340021'
            ],
            '3421000' => [
                'name' => '庄原市',
                'enName' => 'Shobara City',
                'kana' => 'しょうばらし',
                'parent' => '340021'
            ],
            '3421100' => [
                'name' => '大竹市',
                'enName' => 'Otake City',
                'kana' => 'おおたけし',
                'parent' => '340011'
            ],
            '3421200' => [
                'name' => '東広島市',
                'enName' => 'Higashihiroshima City',
                'kana' => 'ひがしひろしまし',
                'parent' => '340013'
            ],
            '3421300' => [
                'name' => '廿日市市',
                'enName' => 'Hatsukaichi City',
                'kana' => 'はつかいちし',
                'parent' => '340011'
            ],
            '3421400' => [
                'name' => '安芸高田市',
                'enName' => 'Akitakata City',
                'kana' => 'あきたかたし',
                'parent' => '340022'
            ],
            '3421500' => [
                'name' => '江田島市',
                'enName' => 'Etajima City',
                'kana' => 'えたじまし',
                'parent' => '340011'
            ],
            '3430200' => [
                'name' => '府中町',
                'enName' => 'Fuchu Town',
                'kana' => 'ふちゅうちょう',
                'parent' => '340011'
            ],
            '3430400' => [
                'name' => '海田町',
                'enName' => 'Kaita Town',
                'kana' => 'かいたちょう',
                'parent' => '340011'
            ],
            '3430700' => [
                'name' => '熊野町',
                'enName' => 'Kumano Town',
                'kana' => 'くまのちょう',
                'parent' => '340011'
            ],
            '3430900' => [
                'name' => '坂町',
                'enName' => 'Saka Town',
                'kana' => 'さかちょう',
                'parent' => '340011'
            ],
            '3436800' => [
                'name' => '安芸太田町',
                'enName' => 'Akiota Town',
                'kana' => 'あきおおたちょう',
                'parent' => '340022'
            ],
            '3436900' => [
                'name' => '北広島町',
                'enName' => 'Kitahiroshima Town',
                'kana' => 'きたひろしまちょう',
                'parent' => '340022'
            ],
            '3443100' => [
                'name' => '大崎上島町',
                'enName' => 'Osakikamijima Town',
                'kana' => 'おおさきかみじまちょう',
                'parent' => '340013'
            ],
            '3446200' => [
                'name' => '世羅町',
                'enName' => 'Sera Town',
                'kana' => 'せらちょう',
                'parent' => '340012'
            ],
            '3454500' => [
                'name' => '神石高原町',
                'enName' => 'Jinsekikogen Town',
                'kana' => 'じんせきこうげんちょう',
                'parent' => '340012'
            ],
            '3520100' => [
                'name' => '下関市',
                'enName' => 'Shimonoseki City',
                'kana' => 'しものせきし',
                'parent' => '350011'
            ],
            '3520200' => [
                'name' => '宇部市',
                'enName' => 'Ube City',
                'kana' => 'うべし',
                'parent' => '350012'
            ],
            '3520300' => [
                'name' => '山口市',
                'enName' => 'Yamaguchi City',
                'kana' => 'やまぐちし',
                'parent' => '350021'
            ],
            '3520400' => [
                'name' => '萩市',
                'enName' => 'Hagi City',
                'kana' => 'はぎし',
                'parent' => '350041'
            ],
            '3520600' => [
                'name' => '防府市',
                'enName' => 'Hofu City',
                'kana' => 'ほうふし',
                'parent' => '350021'
            ],
            '3520700' => [
                'name' => '下松市',
                'enName' => 'Kudamatsu City',
                'kana' => 'くだまつし',
                'parent' => '350022'
            ],
            '3520800' => [
                'name' => '岩国市',
                'enName' => 'Iwakuni City',
                'kana' => 'いわくにし',
                'parent' => '350031'
            ],
            '3521000' => [
                'name' => '光市',
                'enName' => 'Hikari City',
                'kana' => 'ひかりし',
                'parent' => '350032'
            ],
            '3521100' => [
                'name' => '長門市',
                'enName' => 'Nagato City',
                'kana' => 'ながとし',
                'parent' => '350042'
            ],
            '3521200' => [
                'name' => '柳井市',
                'enName' => 'Yanai City',
                'kana' => 'やないし',
                'parent' => '350032'
            ],
            '3521300' => [
                'name' => '美祢市',
                'enName' => 'Mine City',
                'kana' => 'みねし',
                'parent' => '350041'
            ],
            '3521500' => [
                'name' => '周南市',
                'enName' => 'Shunan City',
                'kana' => 'しゅうなんし',
                'parent' => '350022'
            ],
            '3521600' => [
                'name' => '山陽小野田市',
                'enName' => 'Sanyo Onoda City',
                'kana' => 'さんようおのだし',
                'parent' => '350012'
            ],
            '3530500' => [
                'name' => '周防大島町',
                'enName' => 'Suo Oshima Town',
                'kana' => 'すおうおおしまちょう',
                'parent' => '350032'
            ],
            '3532100' => [
                'name' => '和木町',
                'enName' => 'Waki Town',
                'kana' => 'わきちょう',
                'parent' => '350031'
            ],
            '3534100' => [
                'name' => '上関町',
                'enName' => 'Kaminoseki Town',
                'kana' => 'かみのせきちょう',
                'parent' => '350032'
            ],
            '3534300' => [
                'name' => '田布施町',
                'enName' => 'Tabuse Town',
                'kana' => 'たぶせちょう',
                'parent' => '350032'
            ],
            '3534400' => [
                'name' => '平生町',
                'enName' => 'Hirao Town',
                'kana' => 'ひらおちょう',
                'parent' => '350032'
            ],
            '3550200' => [
                'name' => '阿武町',
                'enName' => 'Abu Town',
                'kana' => 'あぶちょう',
                'parent' => '350041'
            ],
            '3620100' => [
                'name' => '徳島市',
                'enName' => 'Tokushima City',
                'kana' => 'とくしまし',
                'parent' => '360011'
            ],
            '3620200' => [
                'name' => '鳴門市',
                'enName' => 'Naruto City',
                'kana' => 'なるとし',
                'parent' => '360011'
            ],
            '3620300' => [
                'name' => '小松島市',
                'enName' => 'Komatsushima City',
                'kana' => 'こまつしまし',
                'parent' => '360011'
            ],
            '3620400' => [
                'name' => '阿南市',
                'enName' => 'Anan City',
                'kana' => 'あなんし',
                'parent' => '360021'
            ],
            '3620500' => [
                'name' => '吉野川市',
                'enName' => 'Yoshinogawa City',
                'kana' => 'よしのがわし',
                'parent' => '360012'
            ],
            '3620600' => [
                'name' => '阿波市',
                'enName' => 'Awa City',
                'kana' => 'あわし',
                'parent' => '360012'
            ],
            '3620701' => [
                'name' => '美馬市脇・美馬・穴吹',
                'enName' => 'Waki Mima Anabuki, Mima City',
                'kana' => 'みましわき・みま・あなぶき',
                'parent' => '360012'
            ],
            '3620702' => [
                'name' => '美馬市木屋平',
                'enName' => 'Koyadaira, Mima City',
                'kana' => 'みましこやだいら',
                'parent' => '360013'
            ],
            '3620800' => [
                'name' => '三好市',
                'enName' => 'Miyoshi City',
                'kana' => 'みよしし',
                'parent' => '360014'
            ],
            '3630100' => [
                'name' => '勝浦町',
                'enName' => 'Katsuura Town',
                'kana' => 'かつうらちょう',
                'parent' => '360022'
            ],
            '3630200' => [
                'name' => '上勝町',
                'enName' => 'Kamikatsu Town',
                'kana' => 'かみかつちょう',
                'parent' => '360022'
            ],
            '3632100' => [
                'name' => '佐那河内村',
                'enName' => 'Sanagochi Village',
                'kana' => 'さなごうちそん',
                'parent' => '360013'
            ],
            '3634100' => [
                'name' => '石井町',
                'enName' => 'Ishii Town',
                'kana' => 'いしいちょう',
                'parent' => '360012'
            ],
            '3634200' => [
                'name' => '神山町',
                'enName' => 'Kamiyama Town',
                'kana' => 'かみやまちょう',
                'parent' => '360013'
            ],
            '3636800' => [
                'name' => '那賀町',
                'enName' => 'Naka Town',
                'kana' => 'なかちょう',
                'parent' => '360022'
            ],
            '3638300' => [
                'name' => '牟岐町',
                'enName' => 'Mugi Town',
                'kana' => 'むぎちょう',
                'parent' => '360023'
            ],
            '3638700' => [
                'name' => '美波町',
                'enName' => 'Minami Town',
                'kana' => 'みなみちょう',
                'parent' => '360023'
            ],
            '3638800' => [
                'name' => '海陽町',
                'enName' => 'Kaiyo Town',
                'kana' => 'かいようちょう',
                'parent' => '360023'
            ],
            '3640100' => [
                'name' => '松茂町',
                'enName' => 'Matsushige Town',
                'kana' => 'まつしげちょう',
                'parent' => '360011'
            ],
            '3640200' => [
                'name' => '北島町',
                'enName' => 'Kitajima Town',
                'kana' => 'きたじまちょう',
                'parent' => '360011'
            ],
            '3640300' => [
                'name' => '藍住町',
                'enName' => 'Aizumi Town',
                'kana' => 'あいずみちょう',
                'parent' => '360011'
            ],
            '3640400' => [
                'name' => '板野町',
                'enName' => 'Itano Town',
                'kana' => 'いたのちょう',
                'parent' => '360011'
            ],
            '3640500' => [
                'name' => '上板町',
                'enName' => 'Kamiita Town',
                'kana' => 'かみいたちょう',
                'parent' => '360012'
            ],
            '3646801' => [
                'name' => 'つるぎ町半田・貞光',
                'enName' => 'Handa Sadamitsu, Tsurugi Town',
                'kana' => 'つるぎちょうはんだ・さだみつ',
                'parent' => '360012'
            ],
            '3646802' => [
                'name' => 'つるぎ町一宇',
                'enName' => 'Ichiu, Tsurugi Town',
                'kana' => 'つるぎちょういちう',
                'parent' => '360013'
            ],
            '3648900' => [
                'name' => '東みよし町',
                'enName' => 'Higashimiyoshi Town',
                'kana' => 'ひがしみよしちょう',
                'parent' => '360014'
            ],
            '3720100' => [
                'name' => '高松市',
                'enName' => 'Takamatsu City',
                'kana' => 'たかまつし',
                'parent' => '370001'
            ],
            '3720200' => [
                'name' => '丸亀市',
                'enName' => 'Marugame City',
                'kana' => 'まるがめし',
                'parent' => '370004'
            ],
            '3720300' => [
                'name' => '坂出市',
                'enName' => 'Sakaide City',
                'kana' => 'さかいでし',
                'parent' => '370004'
            ],
            '3720400' => [
                'name' => '善通寺市',
                'enName' => 'Zentsuji City',
                'kana' => 'ぜんつうじし',
                'parent' => '370004'
            ],
            '3720500' => [
                'name' => '観音寺市',
                'enName' => 'Kanonji City',
                'kana' => 'かんおんじし',
                'parent' => '370005'
            ],
            '3720600' => [
                'name' => 'さぬき市',
                'enName' => 'Sanuki City',
                'kana' => 'さぬきし',
                'parent' => '370003'
            ],
            '3720700' => [
                'name' => '東かがわ市',
                'enName' => 'Higashikagawa City',
                'kana' => 'ひがしかがわし',
                'parent' => '370003'
            ],
            '3720800' => [
                'name' => '三豊市',
                'enName' => 'Mitoyo City',
                'kana' => 'みとよし',
                'parent' => '370005'
            ],
            '3732200' => [
                'name' => '土庄町',
                'enName' => 'Tonosho Town',
                'kana' => 'とのしょうちょう',
                'parent' => '370002'
            ],
            '3732400' => [
                'name' => '小豆島町',
                'enName' => 'Shodoshima Town',
                'kana' => 'しょうどしまちょう',
                'parent' => '370002'
            ],
            '3734100' => [
                'name' => '三木町',
                'enName' => 'Miki Town',
                'kana' => 'みきちょう',
                'parent' => '370003'
            ],
            '3736400' => [
                'name' => '直島町',
                'enName' => 'Naoshima Town',
                'kana' => 'なおしまちょう',
                'parent' => '370001'
            ],
            '3738600' => [
                'name' => '宇多津町',
                'enName' => 'Utazu Town',
                'kana' => 'うたづちょう',
                'parent' => '370004'
            ],
            '3738700' => [
                'name' => '綾川町',
                'enName' => 'Ayagawa Town',
                'kana' => 'あやがわちょう',
                'parent' => '370004'
            ],
            '3740300' => [
                'name' => '琴平町',
                'enName' => 'Kotohira Town',
                'kana' => 'ことひらちょう',
                'parent' => '370004'
            ],
            '3740400' => [
                'name' => '多度津町',
                'enName' => 'Tadotsu Town',
                'kana' => 'たどつちょう',
                'parent' => '370004'
            ],
            '3740600' => [
                'name' => 'まんのう町',
                'enName' => 'Manno Town',
                'kana' => 'まんのうちょう',
                'parent' => '370004'
            ],
            '3820100' => [
                'name' => '松山市',
                'enName' => 'Matsuyama City',
                'kana' => 'まつやまし',
                'parent' => '380010'
            ],
            '3820200' => [
                'name' => '今治市',
                'enName' => 'Imabari City',
                'kana' => 'いまばりし',
                'parent' => '380022'
            ],
            '3820300' => [
                'name' => '宇和島市',
                'enName' => 'Uwajima City',
                'kana' => 'うわじまし',
                'parent' => '380032'
            ],
            '3820400' => [
                'name' => '八幡浜市',
                'enName' => 'Yawatahama City',
                'kana' => 'やわたはまし',
                'parent' => '380031'
            ],
            '3820500' => [
                'name' => '新居浜市',
                'enName' => 'Niihama City',
                'kana' => 'にいはまし',
                'parent' => '380021'
            ],
            '3820600' => [
                'name' => '西条市',
                'enName' => 'Saijo City',
                'kana' => 'さいじょうし',
                'parent' => '380021'
            ],
            '3820700' => [
                'name' => '大洲市',
                'enName' => 'Ozu City',
                'kana' => 'おおずし',
                'parent' => '380031'
            ],
            '3821000' => [
                'name' => '伊予市',
                'enName' => 'Iyo City',
                'kana' => 'いよし',
                'parent' => '380010'
            ],
            '3821300' => [
                'name' => '四国中央市',
                'enName' => 'Shikokuchuo City',
                'kana' => 'しこくちゅうおうし',
                'parent' => '380021'
            ],
            '3821400' => [
                'name' => '西予市',
                'enName' => 'Seiyo City',
                'kana' => 'せいよし',
                'parent' => '380031'
            ],
            '3821500' => [
                'name' => '東温市',
                'enName' => 'Toon City',
                'kana' => 'とうおんし',
                'parent' => '380010'
            ],
            '3835600' => [
                'name' => '上島町',
                'enName' => 'Kamijima Town',
                'kana' => 'かみじまちょう',
                'parent' => '380022'
            ],
            '3838600' => [
                'name' => '久万高原町',
                'enName' => 'Kumakogen Town',
                'kana' => 'くまこうげんちょう',
                'parent' => '380010'
            ],
            '3840100' => [
                'name' => '松前町',
                'enName' => 'Masaki Town',
                'kana' => 'まさきちょう',
                'parent' => '380010'
            ],
            '3840200' => [
                'name' => '砥部町',
                'enName' => 'Tobe Town',
                'kana' => 'とべちょう',
                'parent' => '380010'
            ],
            '3842200' => [
                'name' => '内子町',
                'enName' => 'Uchiko Town',
                'kana' => 'うちこちょう',
                'parent' => '380031'
            ],
            '3844200' => [
                'name' => '伊方町',
                'enName' => 'Ikata Town',
                'kana' => 'いかたちょう',
                'parent' => '380031'
            ],
            '3848400' => [
                'name' => '松野町',
                'enName' => 'Matsuno Town',
                'kana' => 'まつのちょう',
                'parent' => '380032'
            ],
            '3848800' => [
                'name' => '鬼北町',
                'enName' => 'Kihoku Town',
                'kana' => 'きほくちょう',
                'parent' => '380032'
            ],
            '3850600' => [
                'name' => '愛南町',
                'enName' => 'Ainan Town',
                'kana' => 'あいなんちょう',
                'parent' => '380032'
            ],
            '3920100' => [
                'name' => '高知市',
                'enName' => 'Kochi City',
                'kana' => 'こうちし',
                'parent' => '390011'
            ],
            '3920200' => [
                'name' => '室戸市',
                'enName' => 'Muroto City',
                'kana' => 'むろとし',
                'parent' => '390021'
            ],
            '3920300' => [
                'name' => '安芸市',
                'enName' => 'Aki City',
                'kana' => 'あきし',
                'parent' => '390022'
            ],
            '3920400' => [
                'name' => '南国市',
                'enName' => 'Nankoku City',
                'kana' => 'なんこくし',
                'parent' => '390011'
            ],
            '3920500' => [
                'name' => '土佐市',
                'enName' => 'Tosa City',
                'kana' => 'とさし',
                'parent' => '390011'
            ],
            '3920600' => [
                'name' => '須崎市',
                'enName' => 'Susaki City',
                'kana' => 'すさきし',
                'parent' => '390011'
            ],
            '3920800' => [
                'name' => '宿毛市',
                'enName' => 'Sukumo City',
                'kana' => 'すくもし',
                'parent' => '390031'
            ],
            '3920900' => [
                'name' => '土佐清水市',
                'enName' => 'Tosashimizu City',
                'kana' => 'とさしみずし',
                'parent' => '390031'
            ],
            '3921000' => [
                'name' => '四万十市',
                'enName' => 'Shimanto City',
                'kana' => 'しまんとし',
                'parent' => '390031'
            ],
            '3921100' => [
                'name' => '香南市',
                'enName' => 'Konan City',
                'kana' => 'こうなんし',
                'parent' => '390011'
            ],
            '3921200' => [
                'name' => '香美市',
                'enName' => 'Kami City',
                'kana' => 'かみし',
                'parent' => '390011'
            ],
            '3930100' => [
                'name' => '東洋町',
                'enName' => 'Toyo Town',
                'kana' => 'とうようちょう',
                'parent' => '390021'
            ],
            '3930200' => [
                'name' => '奈半利町',
                'enName' => 'Nahari Town',
                'kana' => 'なはりちょう',
                'parent' => '390022'
            ],
            '3930300' => [
                'name' => '田野町',
                'enName' => 'Tano Town',
                'kana' => 'たのちょう',
                'parent' => '390022'
            ],
            '3930400' => [
                'name' => '安田町',
                'enName' => 'Yasuda Town',
                'kana' => 'やすだちょう',
                'parent' => '390022'
            ],
            '3930500' => [
                'name' => '北川村',
                'enName' => 'Kitagawa Village',
                'kana' => 'きたがわむら',
                'parent' => '390022'
            ],
            '3930600' => [
                'name' => '馬路村',
                'enName' => 'Umaji Village',
                'kana' => 'うまじむら',
                'parent' => '390022'
            ],
            '3930700' => [
                'name' => '芸西村',
                'enName' => 'Geisei Village',
                'kana' => 'げいせいむら',
                'parent' => '390022'
            ],
            '3934100' => [
                'name' => '本山町',
                'enName' => 'Motoyama Town',
                'kana' => 'もとやまちょう',
                'parent' => '390012'
            ],
            '3934400' => [
                'name' => '大豊町',
                'enName' => 'Otoyo Town',
                'kana' => 'おおとよちょう',
                'parent' => '390012'
            ],
            '3936300' => [
                'name' => '土佐町',
                'enName' => 'Tosa Town',
                'kana' => 'とさちょう',
                'parent' => '390012'
            ],
            '3936400' => [
                'name' => '大川村',
                'enName' => 'Okawa Village',
                'kana' => 'おおかわむら',
                'parent' => '390012'
            ],
            '3938600' => [
                'name' => 'いの町',
                'enName' => 'Ino Town',
                'kana' => 'いのちょう',
                'parent' => '390011'
            ],
            '3938700' => [
                'name' => '仁淀川町',
                'enName' => 'Niyodogawa Town',
                'kana' => 'によどがわちょう',
                'parent' => '390013'
            ],
            '3940100' => [
                'name' => '中土佐町',
                'enName' => 'Nakatosa Town',
                'kana' => 'なかとさちょう',
                'parent' => '390032'
            ],
            '3940200' => [
                'name' => '佐川町',
                'enName' => 'Sakawa Town',
                'kana' => 'さかわちょう',
                'parent' => '390013'
            ],
            '3940300' => [
                'name' => '越知町',
                'enName' => 'Ochi Town',
                'kana' => 'おちちょう',
                'parent' => '390013'
            ],
            '3940500' => [
                'name' => '檮原町',
                'enName' => 'Yusuhara Town',
                'kana' => 'ゆすはらちょう',
                'parent' => '390032'
            ],
            '3941000' => [
                'name' => '日高村',
                'enName' => 'Hidaka Village',
                'kana' => 'ひだかむら',
                'parent' => '390011'
            ],
            '3941100' => [
                'name' => '津野町',
                'enName' => 'Tsuno Town',
                'kana' => 'つのちょう',
                'parent' => '390032'
            ],
            '3941200' => [
                'name' => '四万十町',
                'enName' => 'Shimanto Town',
                'kana' => 'しまんとちょう',
                'parent' => '390032'
            ],
            '3942400' => [
                'name' => '大月町',
                'enName' => 'Otsuki Town',
                'kana' => 'おおつきちょう',
                'parent' => '390031'
            ],
            '3942700' => [
                'name' => '三原村',
                'enName' => 'Mihara Village',
                'kana' => 'みはらむら',
                'parent' => '390031'
            ],
            '3942800' => [
                'name' => '黒潮町',
                'enName' => 'Kuroshio Town',
                'kana' => 'くろしおちょう',
                'parent' => '390031'
            ],
            '4010000' => [
                'name' => '北九州市',
                'enName' => 'Kitakyushu City',
                'kana' => 'きたきゅうしゅうし',
                'parent' => '400021'
            ],
            '4013000' => [
                'name' => '福岡市',
                'enName' => 'Fukuoka City',
                'kana' => 'ふくおかし',
                'parent' => '400010'
            ],
            '4020200' => [
                'name' => '大牟田市',
                'enName' => 'Omuta City',
                'kana' => 'おおむたし',
                'parent' => '400042'
            ],
            '4020300' => [
                'name' => '久留米市',
                'enName' => 'Kurume City',
                'kana' => 'くるめし',
                'parent' => '400041'
            ],
            '4020400' => [
                'name' => '直方市',
                'enName' => 'Nogata City',
                'kana' => 'のおがたし',
                'parent' => '400030'
            ],
            '4020500' => [
                'name' => '飯塚市',
                'enName' => 'Iizuka City',
                'kana' => 'いいづかし',
                'parent' => '400030'
            ],
            '4020600' => [
                'name' => '田川市',
                'enName' => 'Tagawa City',
                'kana' => 'たがわし',
                'parent' => '400030'
            ],
            '4020700' => [
                'name' => '柳川市',
                'enName' => 'Yanagawa City',
                'kana' => 'やながわし',
                'parent' => '400042'
            ],
            '4021000' => [
                'name' => '八女市',
                'enName' => 'Yame City',
                'kana' => 'やめし',
                'parent' => '400042'
            ],
            '4021100' => [
                'name' => '筑後市',
                'enName' => 'Chikugo City',
                'kana' => 'ちくごし',
                'parent' => '400042'
            ],
            '4021200' => [
                'name' => '大川市',
                'enName' => 'Okawa City',
                'kana' => 'おおかわし',
                'parent' => '400042'
            ],
            '4021300' => [
                'name' => '行橋市',
                'enName' => 'Yukuhashi City',
                'kana' => 'ゆくはしし',
                'parent' => '400022'
            ],
            '4021400' => [
                'name' => '豊前市',
                'enName' => 'Buzen City',
                'kana' => 'ぶぜんし',
                'parent' => '400022'
            ],
            '4021500' => [
                'name' => '中間市',
                'enName' => 'Nakama City',
                'kana' => 'なかまし',
                'parent' => '400021'
            ],
            '4021600' => [
                'name' => '小郡市',
                'enName' => 'Ogori City',
                'kana' => 'おごおりし',
                'parent' => '400041'
            ],
            '4021700' => [
                'name' => '筑紫野市',
                'enName' => 'Chikushino City',
                'kana' => 'ちくしのし',
                'parent' => '400010'
            ],
            '4021800' => [
                'name' => '春日市',
                'enName' => 'Kasuga City',
                'kana' => 'かすがし',
                'parent' => '400010'
            ],
            '4021900' => [
                'name' => '大野城市',
                'enName' => 'Onojo City',
                'kana' => 'おおのじょうし',
                'parent' => '400010'
            ],
            '4022000' => [
                'name' => '宗像市',
                'enName' => 'Munakata City',
                'kana' => 'むなかたし',
                'parent' => '400010'
            ],
            '4022100' => [
                'name' => '太宰府市',
                'enName' => 'Dazaifu City',
                'kana' => 'だざいふし',
                'parent' => '400010'
            ],
            '4022300' => [
                'name' => '古賀市',
                'enName' => 'Koga City',
                'kana' => 'こがし',
                'parent' => '400010'
            ],
            '4022400' => [
                'name' => '福津市',
                'enName' => 'Fukutsu City',
                'kana' => 'ふくつし',
                'parent' => '400010'
            ],
            '4022500' => [
                'name' => 'うきは市',
                'enName' => 'Ukiha City',
                'kana' => 'うきはし',
                'parent' => '400041'
            ],
            '4022600' => [
                'name' => '宮若市',
                'enName' => 'Miyawaka City',
                'kana' => 'みやわかし',
                'parent' => '400030'
            ],
            '4022700' => [
                'name' => '嘉麻市',
                'enName' => 'Kama City',
                'kana' => 'かまし',
                'parent' => '400030'
            ],
            '4022800' => [
                'name' => '朝倉市',
                'enName' => 'Asakura City',
                'kana' => 'あさくらし',
                'parent' => '400041'
            ],
            '4022900' => [
                'name' => 'みやま市',
                'enName' => 'Miyama City',
                'kana' => 'みやまし',
                'parent' => '400042'
            ],
            '4023000' => [
                'name' => '糸島市',
                'enName' => 'Itoshima City',
                'kana' => 'いとしまし',
                'parent' => '400010'
            ],
            '4023100' => [
                'name' => '那珂川市',
                'enName' => 'Nakagawa City',
                'kana' => 'なかがわし',
                'parent' => '400010'
            ],
            '4034100' => [
                'name' => '宇美町',
                'enName' => 'Umi Town',
                'kana' => 'うみまち',
                'parent' => '400010'
            ],
            '4034200' => [
                'name' => '篠栗町',
                'enName' => 'Sasaguri Town',
                'kana' => 'ささぐりまち',
                'parent' => '400010'
            ],
            '4034300' => [
                'name' => '志免町',
                'enName' => 'Shime Town',
                'kana' => 'しめまち',
                'parent' => '400010'
            ],
            '4034400' => [
                'name' => '須恵町',
                'enName' => 'Sue Town',
                'kana' => 'すえまち',
                'parent' => '400010'
            ],
            '4034500' => [
                'name' => '新宮町',
                'enName' => 'Shingu Town',
                'kana' => 'しんぐうまち',
                'parent' => '400010'
            ],
            '4034800' => [
                'name' => '久山町',
                'enName' => 'Hisayama Town',
                'kana' => 'ひさやままち',
                'parent' => '400010'
            ],
            '4034900' => [
                'name' => '粕屋町',
                'enName' => 'Kasuya Town',
                'kana' => 'かすやまち',
                'parent' => '400010'
            ],
            '4038100' => [
                'name' => '芦屋町',
                'enName' => 'Ashiya Town',
                'kana' => 'あしやまち',
                'parent' => '400021'
            ],
            '4038200' => [
                'name' => '水巻町',
                'enName' => 'Mizumaki Town',
                'kana' => 'みずまきまち',
                'parent' => '400021'
            ],
            '4038300' => [
                'name' => '岡垣町',
                'enName' => 'Okagaki Town',
                'kana' => 'おかがきまち',
                'parent' => '400021'
            ],
            '4038400' => [
                'name' => '遠賀町',
                'enName' => 'Onga Town',
                'kana' => 'おんがちょう',
                'parent' => '400021'
            ],
            '4040100' => [
                'name' => '小竹町',
                'enName' => 'Kotake Town',
                'kana' => 'こたけまち',
                'parent' => '400030'
            ],
            '4040200' => [
                'name' => '鞍手町',
                'enName' => 'Kurate Town',
                'kana' => 'くらてまち',
                'parent' => '400030'
            ],
            '4042100' => [
                'name' => '桂川町',
                'enName' => 'Keisen Town',
                'kana' => 'けいせんまち',
                'parent' => '400030'
            ],
            '4044700' => [
                'name' => '筑前町',
                'enName' => 'Chikuzen Town',
                'kana' => 'ちくぜんまち',
                'parent' => '400041'
            ],
            '4044800' => [
                'name' => '東峰村',
                'enName' => 'Toho Village',
                'kana' => 'とうほうむら',
                'parent' => '400041'
            ],
            '4050300' => [
                'name' => '大刀洗町',
                'enName' => 'Tachiarai Town',
                'kana' => 'たちあらいまち',
                'parent' => '400041'
            ],
            '4052200' => [
                'name' => '大木町',
                'enName' => 'Oki Town',
                'kana' => 'おおきまち',
                'parent' => '400042'
            ],
            '4054400' => [
                'name' => '広川町',
                'enName' => 'Hirokawa Town',
                'kana' => 'ひろかわまち',
                'parent' => '400042'
            ],
            '4060100' => [
                'name' => '香春町',
                'enName' => 'Kawara Town',
                'kana' => 'かわらまち',
                'parent' => '400030'
            ],
            '4060200' => [
                'name' => '添田町',
                'enName' => 'Soeda Town',
                'kana' => 'そえだまち',
                'parent' => '400030'
            ],
            '4060400' => [
                'name' => '糸田町',
                'enName' => 'Itoda Town',
                'kana' => 'いとだまち',
                'parent' => '400030'
            ],
            '4060500' => [
                'name' => '川崎町',
                'enName' => 'Kawasaki Town',
                'kana' => 'かわさきまち',
                'parent' => '400030'
            ],
            '4060800' => [
                'name' => '大任町',
                'enName' => 'Oto Town',
                'kana' => 'おおとうまち',
                'parent' => '400030'
            ],
            '4060900' => [
                'name' => '赤村',
                'enName' => 'Aka Village',
                'kana' => 'あかむら',
                'parent' => '400030'
            ],
            '4061000' => [
                'name' => '福智町',
                'enName' => 'Fukuchi Town',
                'kana' => 'ふくちまち',
                'parent' => '400030'
            ],
            '4062100' => [
                'name' => '苅田町',
                'enName' => 'Kanda Town',
                'kana' => 'かんだまち',
                'parent' => '400022'
            ],
            '4062500' => [
                'name' => 'みやこ町',
                'enName' => 'Miyako Town',
                'kana' => 'みやこまち',
                'parent' => '400022'
            ],
            '4064200' => [
                'name' => '吉富町',
                'enName' => 'Yoshitomi Town',
                'kana' => 'よしとみまち',
                'parent' => '400022'
            ],
            '4064600' => [
                'name' => '上毛町',
                'enName' => 'Koge Town',
                'kana' => 'こうげまち',
                'parent' => '400022'
            ],
            '4064700' => [
                'name' => '築上町',
                'enName' => 'Chikujo Town',
                'kana' => 'ちくじょうまち',
                'parent' => '400022'
            ],
            '4120100' => [
                'name' => '佐賀市',
                'enName' => 'Saga City',
                'kana' => 'さがし',
                'parent' => '410011'
            ],
            '4120200' => [
                'name' => '唐津市',
                'enName' => 'Karatsu City',
                'kana' => 'からつし',
                'parent' => '410021'
            ],
            '4120300' => [
                'name' => '鳥栖市',
                'enName' => 'Tosu City',
                'kana' => 'とすし',
                'parent' => '410012'
            ],
            '4120400' => [
                'name' => '多久市',
                'enName' => 'Taku City',
                'kana' => 'たくし',
                'parent' => '410011'
            ],
            '4120500' => [
                'name' => '伊万里市',
                'enName' => 'Imari City',
                'kana' => 'いまりし',
                'parent' => '410022'
            ],
            '4120600' => [
                'name' => '武雄市',
                'enName' => 'Takeo City',
                'kana' => 'たけおし',
                'parent' => '410013'
            ],
            '4120700' => [
                'name' => '鹿島市',
                'enName' => 'Kashima City',
                'kana' => 'かしまし',
                'parent' => '410014'
            ],
            '4120800' => [
                'name' => '小城市',
                'enName' => 'Ogi City',
                'kana' => 'おぎし',
                'parent' => '410011'
            ],
            '4120900' => [
                'name' => '嬉野市',
                'enName' => 'Ureshino City',
                'kana' => 'うれしのし',
                'parent' => '410014'
            ],
            '4121000' => [
                'name' => '神埼市',
                'enName' => 'Kanzaki City',
                'kana' => 'かんざきし',
                'parent' => '410012'
            ],
            '4132700' => [
                'name' => '吉野ヶ里町',
                'enName' => 'Yoshinogari Town',
                'kana' => 'よしのがりちょう',
                'parent' => '410012'
            ],
            '4134100' => [
                'name' => '基山町',
                'enName' => 'Kiyama Town',
                'kana' => 'きやまちょう',
                'parent' => '410012'
            ],
            '4134500' => [
                'name' => '上峰町',
                'enName' => 'Kamimine Town',
                'kana' => 'かみみねちょう',
                'parent' => '410012'
            ],
            '4134600' => [
                'name' => 'みやき町',
                'enName' => 'Miyaki Town',
                'kana' => 'みやきちょう',
                'parent' => '410012'
            ],
            '4138700' => [
                'name' => '玄海町',
                'enName' => 'Genkai Town',
                'kana' => 'げんかいちょう',
                'parent' => '410021'
            ],
            '4140100' => [
                'name' => '有田町',
                'enName' => 'Arita Town',
                'kana' => 'ありたちょう',
                'parent' => '410022'
            ],
            '4142300' => [
                'name' => '大町町',
                'enName' => 'Omachi Town',
                'kana' => 'おおまちちょう',
                'parent' => '410013'
            ],
            '4142400' => [
                'name' => '江北町',
                'enName' => 'Kohoku Town',
                'kana' => 'こうほくまち',
                'parent' => '410013'
            ],
            '4142500' => [
                'name' => '白石町',
                'enName' => 'Shiroishi Town',
                'kana' => 'しろいしちょう',
                'parent' => '410013'
            ],
            '4144100' => [
                'name' => '太良町',
                'enName' => 'Tara Town',
                'kana' => 'たらちょう',
                'parent' => '410014'
            ],
            '4220100' => [
                'name' => '長崎市',
                'enName' => 'Nagasaki City',
                'kana' => 'ながさきし',
                'parent' => '420012'
            ],
            '4220201' => [
                'name' => '佐世保市（宇久地域を除く）',
                'enName' => 'Sasebo City (Excluding Uku Area]',
                'kana' => 'させぼし',
                'parent' => '420022'
            ],
            '4220202' => [
                'name' => '佐世保市（宇久地域）',
                'enName' => 'Sasebo City (Uku Area]',
                'kana' => 'させぼし',
                'parent' => '420041'
            ],
            '4220300' => [
                'name' => '島原市',
                'enName' => 'Shimabara City',
                'kana' => 'しまばらし',
                'parent' => '420011'
            ],
            '4220400' => [
                'name' => '諫早市',
                'enName' => 'Isahaya City',
                'kana' => 'いさはやし',
                'parent' => '420013'
            ],
            '4220500' => [
                'name' => '大村市',
                'enName' => 'Omura City',
                'kana' => 'おおむらし',
                'parent' => '420013'
            ],
            '4220700' => [
                'name' => '平戸市',
                'enName' => 'Hirado City',
                'kana' => 'ひらどし',
                'parent' => '420021'
            ],
            '4220800' => [
                'name' => '松浦市',
                'enName' => 'Matsuura City',
                'kana' => 'まつうらし',
                'parent' => '420021'
            ],
            '4220901' => [
                'name' => '対馬市下対馬',
                'enName' => 'Shimotsushima, Tsushima City',
                'kana' => 'つしまししもつしま',
                'parent' => '420033'
            ],
            '4220902' => [
                'name' => '対馬市上対馬',
                'enName' => 'Kamitsushima, Tsushima City',
                'kana' => 'つしましかみつしま',
                'parent' => '420032'
            ],
            '4221000' => [
                'name' => '壱岐市',
                'enName' => 'Iki City',
                'kana' => 'いきし',
                'parent' => '420031'
            ],
            '4221100' => [
                'name' => '五島市',
                'enName' => 'Goto City',
                'kana' => 'ごとうし',
                'parent' => '420042'
            ],
            '4221201' => [
                'name' => '西海市（江島・平島を除く）',
                'enName' => 'Saikai City (Excluding Enoshima and Tairashima）',
                'kana' => 'さいかいし',
                'parent' => '420014'
            ],
            '4221202' => [
                'name' => '西海市（江島・平島）',
                'enName' => 'Saikai City (Enoshima and Tairashima]',
                'kana' => 'さいかいし',
                'parent' => '420041'
            ],
            '4221300' => [
                'name' => '雲仙市',
                'enName' => 'Unzen City',
                'kana' => 'うんぜんし',
                'parent' => '420011'
            ],
            '4221400' => [
                'name' => '南島原市',
                'enName' => 'Minamishimabara City',
                'kana' => 'みなみしまばらし',
                'parent' => '420011'
            ],
            '4230700' => [
                'name' => '長与町',
                'enName' => 'Nagayo Town',
                'kana' => 'ながよちょう',
                'parent' => '420012'
            ],
            '4230800' => [
                'name' => '時津町',
                'enName' => 'Togitsu Town',
                'kana' => 'とぎつちょう',
                'parent' => '420012'
            ],
            '4232100' => [
                'name' => '東彼杵町',
                'enName' => 'Higashisonogi Town',
                'kana' => 'ひがしそのぎちょう',
                'parent' => '420022'
            ],
            '4232200' => [
                'name' => '川棚町',
                'enName' => 'Kawatana Town',
                'kana' => 'かわたなちょう',
                'parent' => '420022'
            ],
            '4232300' => [
                'name' => '波佐見町',
                'enName' => 'Hasami Town',
                'kana' => 'はさみちょう',
                'parent' => '420022'
            ],
            '4238300' => [
                'name' => '小値賀町',
                'enName' => 'Ojika Town',
                'kana' => 'おぢかちょう',
                'parent' => '420041'
            ],
            '4239100' => [
                'name' => '佐々町',
                'enName' => 'Saza Town',
                'kana' => 'さざちょう',
                'parent' => '420022'
            ],
            '4241100' => [
                'name' => '新上五島町',
                'enName' => 'Shinkamigoto Town',
                'kana' => 'しんかみごとうちょう',
                'parent' => '420041'
            ],
            '4310000' => [
                'name' => '熊本市',
                'enName' => 'Kumamoto City',
                'kana' => 'くまもとし',
                'parent' => '430011'
            ],
            '4320200' => [
                'name' => '八代市',
                'enName' => 'Yatsushiro City',
                'kana' => 'やつしろし',
                'parent' => '430015'
            ],
            '4320300' => [
                'name' => '人吉市',
                'enName' => 'Hitoyoshi City',
                'kana' => 'ひとよしし',
                'parent' => '430040'
            ],
            '4320400' => [
                'name' => '荒尾市',
                'enName' => 'Arao City',
                'kana' => 'あらおし',
                'parent' => '430013'
            ],
            '4320500' => [
                'name' => '水俣市',
                'enName' => 'Minamata City',
                'kana' => 'みなまたし',
                'parent' => '430032'
            ],
            '4320600' => [
                'name' => '玉名市',
                'enName' => 'Tamana City',
                'kana' => 'たまなし',
                'parent' => '430013'
            ],
            '4320800' => [
                'name' => '山鹿市',
                'enName' => 'Yamaga City',
                'kana' => 'やまがし',
                'parent' => '430012'
            ],
            '4321000' => [
                'name' => '菊池市',
                'enName' => 'Kikuchi City',
                'kana' => 'きくちし',
                'parent' => '430012'
            ],
            '4321100' => [
                'name' => '宇土市',
                'enName' => 'Uto City',
                'kana' => 'うとし',
                'parent' => '430015'
            ],
            '4321200' => [
                'name' => '上天草市',
                'enName' => 'Kamiamakusa City',
                'kana' => 'かみあまくさし',
                'parent' => '430031'
            ],
            '4321300' => [
                'name' => '宇城市',
                'enName' => 'Uki City',
                'kana' => 'うきし',
                'parent' => '430015'
            ],
            '4321400' => [
                'name' => '阿蘇市',
                'enName' => 'Aso City',
                'kana' => 'あそし',
                'parent' => '430020'
            ],
            '4321500' => [
                'name' => '天草市',
                'enName' => 'Amakusa City',
                'kana' => 'あまくさし',
                'parent' => '430031'
            ],
            '4321600' => [
                'name' => '合志市',
                'enName' => 'Koshi City',
                'kana' => 'こうしし',
                'parent' => '430012'
            ],
            '4334800' => [
                'name' => '美里町',
                'enName' => 'Misato Town',
                'kana' => 'みさとまち',
                'parent' => '430015'
            ],
            '4336400' => [
                'name' => '玉東町',
                'enName' => 'Gyokuto Town',
                'kana' => 'ぎょくとうまち',
                'parent' => '430013'
            ],
            '4336700' => [
                'name' => '南関町',
                'enName' => 'Nankan Town',
                'kana' => 'なんかんまち',
                'parent' => '430013'
            ],
            '4336800' => [
                'name' => '長洲町',
                'enName' => 'Nagasu Town',
                'kana' => 'ながすまち',
                'parent' => '430013'
            ],
            '4336900' => [
                'name' => '和水町',
                'enName' => 'Nagomi Town',
                'kana' => 'なごみまち',
                'parent' => '430013'
            ],
            '4340300' => [
                'name' => '大津町',
                'enName' => 'Ozu Town',
                'kana' => 'おおづまち',
                'parent' => '430012'
            ],
            '4340400' => [
                'name' => '菊陽町',
                'enName' => 'Kikuyo Town',
                'kana' => 'きくようまち',
                'parent' => '430012'
            ],
            '4342300' => [
                'name' => '南小国町',
                'enName' => 'Minamioguni Town',
                'kana' => 'みなみおぐにまち',
                'parent' => '430020'
            ],
            '4342400' => [
                'name' => '小国町',
                'enName' => 'Oguni Town',
                'kana' => 'おぐにまち',
                'parent' => '430020'
            ],
            '4342500' => [
                'name' => '産山村',
                'enName' => 'Ubuyama Village',
                'kana' => 'うぶやまむら',
                'parent' => '430020'
            ],
            '4342800' => [
                'name' => '高森町',
                'enName' => 'Takamori Town',
                'kana' => 'たかもりまち',
                'parent' => '430020'
            ],
            '4343200' => [
                'name' => '西原村',
                'enName' => 'Nishihara Village',
                'kana' => 'にしはらむら',
                'parent' => '430014'
            ],
            '4343300' => [
                'name' => '南阿蘇村',
                'enName' => 'Minamiaso Village',
                'kana' => 'みなみあそむら',
                'parent' => '430020'
            ],
            '4344100' => [
                'name' => '御船町',
                'enName' => 'Mifune Town',
                'kana' => 'みふねまち',
                'parent' => '430014'
            ],
            '4344200' => [
                'name' => '嘉島町',
                'enName' => 'Kashima Town',
                'kana' => 'かしままち',
                'parent' => '430014'
            ],
            '4344300' => [
                'name' => '益城町',
                'enName' => 'Mashiki Town',
                'kana' => 'ましきまち',
                'parent' => '430014'
            ],
            '4344400' => [
                'name' => '甲佐町',
                'enName' => 'Kosa Town',
                'kana' => 'こうさまち',
                'parent' => '430014'
            ],
            '4344700' => [
                'name' => '山都町',
                'enName' => 'Yamato Town',
                'kana' => 'やまとちょう',
                'parent' => '430014'
            ],
            '4346800' => [
                'name' => '氷川町',
                'enName' => 'Hikawa Town',
                'kana' => 'ひかわちょう',
                'parent' => '430015'
            ],
            '4348200' => [
                'name' => '芦北町',
                'enName' => 'Ashikita Town',
                'kana' => 'あしきたまち',
                'parent' => '430032'
            ],
            '4348400' => [
                'name' => '津奈木町',
                'enName' => 'Tsunagi Town',
                'kana' => 'つなぎまち',
                'parent' => '430032'
            ],
            '4350100' => [
                'name' => '錦町',
                'enName' => 'Nishiki Town',
                'kana' => 'にしきまち',
                'parent' => '430040'
            ],
            '4350500' => [
                'name' => '多良木町',
                'enName' => 'Taragi Town',
                'kana' => 'たらぎまち',
                'parent' => '430040'
            ],
            '4350600' => [
                'name' => '湯前町',
                'enName' => 'Yunomae Town',
                'kana' => 'ゆのまえまち',
                'parent' => '430040'
            ],
            '4350700' => [
                'name' => '水上村',
                'enName' => 'Mizukami Village',
                'kana' => 'みずかみむら',
                'parent' => '430040'
            ],
            '4351000' => [
                'name' => '相良村',
                'enName' => 'Sagara Village',
                'kana' => 'さがらむら',
                'parent' => '430040'
            ],
            '4351100' => [
                'name' => '五木村',
                'enName' => 'Itsuki Village',
                'kana' => 'いつきむら',
                'parent' => '430040'
            ],
            '4351200' => [
                'name' => '山江村',
                'enName' => 'Yamae Village',
                'kana' => 'やまえむら',
                'parent' => '430040'
            ],
            '4351300' => [
                'name' => '球磨村',
                'enName' => 'Kuma Village',
                'kana' => 'くまむら',
                'parent' => '430040'
            ],
            '4351400' => [
                'name' => 'あさぎり町',
                'enName' => 'Asagiri Town',
                'kana' => 'あさぎりちょう',
                'parent' => '430040'
            ],
            '4353100' => [
                'name' => '苓北町',
                'enName' => 'Reihoku Town',
                'kana' => 'れいほくまち',
                'parent' => '430031'
            ],
            '4420100' => [
                'name' => '大分市',
                'enName' => 'Oita City',
                'kana' => 'おおいたし',
                'parent' => '440010'
            ],
            '4420200' => [
                'name' => '別府市',
                'enName' => 'Beppu City',
                'kana' => 'べっぷし',
                'parent' => '440010'
            ],
            '4420300' => [
                'name' => '中津市',
                'enName' => 'Nakatsu City',
                'kana' => 'なかつし',
                'parent' => '440020'
            ],
            '4420400' => [
                'name' => '日田市',
                'enName' => 'Hita City',
                'kana' => 'ひたし',
                'parent' => '440031'
            ],
            '4420500' => [
                'name' => '佐伯市',
                'enName' => 'Saiki City',
                'kana' => 'さいきし',
                'parent' => '440041'
            ],
            '4420600' => [
                'name' => '臼杵市',
                'enName' => 'Usuki City',
                'kana' => 'うすきし',
                'parent' => '440010'
            ],
            '4420700' => [
                'name' => '津久見市',
                'enName' => 'Tsukumi City',
                'kana' => 'つくみし',
                'parent' => '440010'
            ],
            '4420800' => [
                'name' => '竹田市',
                'enName' => 'Taketa City',
                'kana' => 'たけたし',
                'parent' => '440032'
            ],
            '4420900' => [
                'name' => '豊後高田市',
                'enName' => 'Bungotakada City',
                'kana' => 'ぶんごたかだし',
                'parent' => '440020'
            ],
            '4421000' => [
                'name' => '杵築市',
                'enName' => 'Kitsuki City',
                'kana' => 'きつきし',
                'parent' => '440010'
            ],
            '4421100' => [
                'name' => '宇佐市',
                'enName' => 'Usa City',
                'kana' => 'うさし',
                'parent' => '440020'
            ],
            '4421200' => [
                'name' => '豊後大野市',
                'enName' => 'Bungo Ohno City',
                'kana' => 'ぶんごおおのし',
                'parent' => '440042'
            ],
            '4421300' => [
                'name' => '由布市',
                'enName' => 'Yufu City',
                'kana' => 'ゆふし',
                'parent' => '440010'
            ],
            '4421400' => [
                'name' => '国東市',
                'enName' => 'Kunisaki City',
                'kana' => 'くにさきし',
                'parent' => '440020'
            ],
            '4432200' => [
                'name' => '姫島村',
                'enName' => 'Himeshima Village',
                'kana' => 'ひめしまむら',
                'parent' => '440020'
            ],
            '4434100' => [
                'name' => '日出町',
                'enName' => 'Hiji Town',
                'kana' => 'ひじまち',
                'parent' => '440010'
            ],
            '4446100' => [
                'name' => '九重町',
                'enName' => 'Kokonoe Town',
                'kana' => 'ここのえまち',
                'parent' => '440031'
            ],
            '4446200' => [
                'name' => '玖珠町',
                'enName' => 'Kusu Town',
                'kana' => 'くすまち',
                'parent' => '440031'
            ],
            '4520100' => [
                'name' => '宮崎市',
                'enName' => 'Miyazaki City',
                'kana' => 'みやざきし',
                'parent' => '450011'
            ],
            '4520200' => [
                'name' => '都城市',
                'enName' => 'Miyakonojo City',
                'kana' => 'みやこのじょうし',
                'parent' => '450032'
            ],
            '4520300' => [
                'name' => '延岡市',
                'enName' => 'Nobeoka City',
                'kana' => 'のべおかし',
                'parent' => '450021'
            ],
            '4520400' => [
                'name' => '日南市',
                'enName' => 'Nichinan City',
                'kana' => 'にちなんし',
                'parent' => '450012'
            ],
            '4520500' => [
                'name' => '小林市',
                'enName' => 'Kobayashi City',
                'kana' => 'こばやしし',
                'parent' => '450031'
            ],
            '4520600' => [
                'name' => '日向市',
                'enName' => 'Hyuga City',
                'kana' => 'ひゅうがし',
                'parent' => '450021'
            ],
            '4520700' => [
                'name' => '串間市',
                'enName' => 'Kushima City',
                'kana' => 'くしまし',
                'parent' => '450012'
            ],
            '4520800' => [
                'name' => '西都市',
                'enName' => 'Saito City',
                'kana' => 'さいとし',
                'parent' => '450022'
            ],
            '4520900' => [
                'name' => 'えびの市',
                'enName' => 'Ebino City',
                'kana' => 'えびのし',
                'parent' => '450031'
            ],
            '4534100' => [
                'name' => '三股町',
                'enName' => 'Mimata Town',
                'kana' => 'みまたちょう',
                'parent' => '450032'
            ],
            '4536100' => [
                'name' => '高原町',
                'enName' => 'Takaharu Town',
                'kana' => 'たかはるちょう',
                'parent' => '450031'
            ],
            '4538200' => [
                'name' => '国富町',
                'enName' => 'Kunitomi Town',
                'kana' => 'くにとみちょう',
                'parent' => '450011'
            ],
            '4538300' => [
                'name' => '綾町',
                'enName' => 'Aya Town',
                'kana' => 'あやちょう',
                'parent' => '450011'
            ],
            '4540100' => [
                'name' => '高鍋町',
                'enName' => 'Takanabe Town',
                'kana' => 'たかなべちょう',
                'parent' => '450022'
            ],
            '4540200' => [
                'name' => '新富町',
                'enName' => 'Shintomi Town',
                'kana' => 'しんとみちょう',
                'parent' => '450022'
            ],
            '4540300' => [
                'name' => '西米良村',
                'enName' => 'Nishimera Village',
                'kana' => 'にしめらそん',
                'parent' => '450042'
            ],
            '4540400' => [
                'name' => '木城町',
                'enName' => 'Kijo Town',
                'kana' => 'きじょうちょう',
                'parent' => '450022'
            ],
            '4540500' => [
                'name' => '川南町',
                'enName' => 'Kawaminami Town',
                'kana' => 'かわみなみちょう',
                'parent' => '450022'
            ],
            '4540600' => [
                'name' => '都農町',
                'enName' => 'Tsuno Town',
                'kana' => 'つのちょう',
                'parent' => '450022'
            ],
            '4542100' => [
                'name' => '門川町',
                'enName' => 'Kadogawa Town',
                'kana' => 'かどがわちょう',
                'parent' => '450021'
            ],
            '4542900' => [
                'name' => '諸塚村',
                'enName' => 'Morotsuka Village',
                'kana' => 'もろつかそん',
                'parent' => '450042'
            ],
            '4543000' => [
                'name' => '椎葉村',
                'enName' => 'Shiiba Village',
                'kana' => 'しいばそん',
                'parent' => '450042'
            ],
            '4543100' => [
                'name' => '美郷町',
                'enName' => 'Misato Town',
                'kana' => 'みさとちょう',
                'parent' => '450042'
            ],
            '4544100' => [
                'name' => '高千穂町',
                'enName' => 'Takachiho Town',
                'kana' => 'たかちほちょう',
                'parent' => '450041'
            ],
            '4544200' => [
                'name' => '日之影町',
                'enName' => 'Hinokage Town',
                'kana' => 'ひのかげちょう',
                'parent' => '450041'
            ],
            '4544300' => [
                'name' => '五ヶ瀬町',
                'enName' => 'Gokase Town',
                'kana' => 'ごかせちょう',
                'parent' => '450041'
            ],
            '4620100' => [
                'name' => '鹿児島市',
                'enName' => 'Kagoshima City',
                'kana' => 'かごしまし',
                'parent' => '460011'
            ],
            '4620300' => [
                'name' => '鹿屋市',
                'enName' => 'Kanoya City',
                'kana' => 'かのやし',
                'parent' => '460022'
            ],
            '4620400' => [
                'name' => '枕崎市',
                'enName' => 'Makurazaki City',
                'kana' => 'まくらざきし',
                'parent' => '460015'
            ],
            '4620600' => [
                'name' => '阿久根市',
                'enName' => 'Akune City',
                'kana' => 'あくねし',
                'parent' => '460012'
            ],
            '4620800' => [
                'name' => '出水市',
                'enName' => 'Izumi City',
                'kana' => 'いずみし',
                'parent' => '460012'
            ],
            '4621000' => [
                'name' => '指宿市',
                'enName' => 'Ibusuki City',
                'kana' => 'いぶすきし',
                'parent' => '460015'
            ],
            '4621300' => [
                'name' => '西之表市',
                'enName' => 'Nishinoomote City',
                'kana' => 'にしのおもてし',
                'parent' => '460031'
            ],
            '4621400' => [
                'name' => '垂水市',
                'enName' => 'Tarumizu City',
                'kana' => 'たるみずし',
                'parent' => '460022'
            ],
            '4621501' => [
                'name' => '薩摩川内市',
                'enName' => 'Satsumasendai City',
                'kana' => 'さつませんだいし',
                'parent' => '460013'
            ],
            '4621502' => [
                'name' => '薩摩川内市甑島',
                'enName' => 'Koshikishima, Satsumasendai City',
                'kana' => 'さつませんだいしこしきしま',
                'parent' => '460014'
            ],
            '4621600' => [
                'name' => '日置市',
                'enName' => 'Hioki City',
                'kana' => 'ひおきし',
                'parent' => '460011'
            ],
            '4621700' => [
                'name' => '曽於市',
                'enName' => 'Soo City',
                'kana' => 'そおし',
                'parent' => '460021'
            ],
            '4621800' => [
                'name' => '霧島市',
                'enName' => 'Kirishima City',
                'kana' => 'きりしまし',
                'parent' => '460013'
            ],
            '4621900' => [
                'name' => 'いちき串木野市',
                'enName' => 'Ichikikushikino City',
                'kana' => 'いちきくしきのし',
                'parent' => '460011'
            ],
            '4622000' => [
                'name' => '南さつま市',
                'enName' => 'Minamisatsuma City',
                'kana' => 'みなみさつまし',
                'parent' => '460015'
            ],
            '4622100' => [
                'name' => '志布志市',
                'enName' => 'Shibushi City',
                'kana' => 'しぶしし',
                'parent' => '460021'
            ],
            '4622200' => [
                'name' => '奄美市',
                'enName' => 'Amami City',
                'kana' => 'あまみし',
                'parent' => '460041'
            ],
            '4622300' => [
                'name' => '南九州市',
                'enName' => 'Minamikyushu City',
                'kana' => 'みなみきゅうしゅうし',
                'parent' => '460015'
            ],
            '4622400' => [
                'name' => '伊佐市',
                'enName' => 'Isa City',
                'kana' => 'いさし',
                'parent' => '460012'
            ],
            '4622500' => [
                'name' => '姶良市',
                'enName' => 'Aira City',
                'kana' => 'あいらし',
                'parent' => '460013'
            ],
            '4630300' => [
                'name' => '三島村',
                'enName' => 'Mishima Village',
                'kana' => 'みしまむら',
                'parent' => '460031'
            ],
            '4630400' => [
                'name' => '十島村',
                'enName' => 'Toshima Village',
                'kana' => 'としまむら',
                'parent' => '460043'
            ],
            '4639200' => [
                'name' => 'さつま町',
                'enName' => 'Satsuma Town',
                'kana' => 'さつまちょう',
                'parent' => '460013'
            ],
            '4640400' => [
                'name' => '長島町',
                'enName' => 'Nagashima Town',
                'kana' => 'ながしまちょう',
                'parent' => '460012'
            ],
            '4645200' => [
                'name' => '湧水町',
                'enName' => 'Yusui Town',
                'kana' => 'ゆうすいちょう',
                'parent' => '460013'
            ],
            '4646800' => [
                'name' => '大崎町',
                'enName' => 'Osaki Town',
                'kana' => 'おおさきちょう',
                'parent' => '460021'
            ],
            '4648200' => [
                'name' => '東串良町',
                'enName' => 'Higashikushira Town',
                'kana' => 'ひがしくしらちょう',
                'parent' => '460022'
            ],
            '4649000' => [
                'name' => '錦江町',
                'enName' => 'Kinko Town',
                'kana' => 'きんこうちょう',
                'parent' => '460022'
            ],
            '4649100' => [
                'name' => '南大隅町',
                'enName' => 'Minamiosumi Town',
                'kana' => 'みなみおおすみちょう',
                'parent' => '460022'
            ],
            '4649200' => [
                'name' => '肝付町',
                'enName' => 'Kimotsuki Town',
                'kana' => 'きもつきちょう',
                'parent' => '460022'
            ],
            '4650100' => [
                'name' => '中種子町',
                'enName' => 'Nakatane Town',
                'kana' => 'なかたねちょう',
                'parent' => '460031'
            ],
            '4650200' => [
                'name' => '南種子町',
                'enName' => 'Minamitane Town',
                'kana' => 'みなみたねちょう',
                'parent' => '460031'
            ],
            '4650500' => [
                'name' => '屋久島町',
                'enName' => 'Yakushima Town',
                'kana' => 'やくしまちょう',
                'parent' => '460032'
            ],
            '4652300' => [
                'name' => '大和村',
                'enName' => 'Yamato Village',
                'kana' => 'やまとそん',
                'parent' => '460041'
            ],
            '4652400' => [
                'name' => '宇検村',
                'enName' => 'Uken Village',
                'kana' => 'うけんそん',
                'parent' => '460041'
            ],
            '4652500' => [
                'name' => '瀬戸内町',
                'enName' => 'Setouchi Town',
                'kana' => 'せとうちちょう',
                'parent' => '460041'
            ],
            '4652700' => [
                'name' => '龍郷町',
                'enName' => 'Tatsugo Town',
                'kana' => 'たつごうちょう',
                'parent' => '460041'
            ],
            '4652900' => [
                'name' => '喜界町',
                'enName' => 'Kikai Town',
                'kana' => 'きかいちょう',
                'parent' => '460041'
            ],
            '4653000' => [
                'name' => '徳之島町',
                'enName' => 'Tokunoshima Town',
                'kana' => 'とくのしまちょう',
                'parent' => '460042'
            ],
            '4653100' => [
                'name' => '天城町',
                'enName' => 'Amagi Town',
                'kana' => 'あまぎちょう',
                'parent' => '460042'
            ],
            '4653200' => [
                'name' => '伊仙町',
                'enName' => 'Isen Town',
                'kana' => 'いせんちょう',
                'parent' => '460042'
            ],
            '4653300' => [
                'name' => '和泊町',
                'enName' => 'Wadomari Town',
                'kana' => 'わどまりちょう',
                'parent' => '460042'
            ],
            '4653400' => [
                'name' => '知名町',
                'enName' => 'China Town',
                'kana' => 'ちなちょう',
                'parent' => '460042'
            ],
            '4653500' => [
                'name' => '与論町',
                'enName' => 'Yoron Town',
                'kana' => 'よろんちょう',
                'parent' => '460042'
            ],
            '4720100' => [
                'name' => '那覇市',
                'enName' => 'Naha City',
                'kana' => 'なはし',
                'parent' => '471011'
            ],
            '4720500' => [
                'name' => '宜野湾市',
                'enName' => 'Ginowan City',
                'kana' => 'ぎのわんし',
                'parent' => '471012'
            ],
            '4720700' => [
                'name' => '石垣市',
                'enName' => 'Ishigaki City',
                'kana' => 'いしがきし',
                'parent' => '474011'
            ],
            '4720800' => [
                'name' => '浦添市',
                'enName' => 'Urasoe City',
                'kana' => 'うらそえし',
                'parent' => '471011'
            ],
            '4720900' => [
                'name' => '名護市',
                'enName' => 'Nago City',
                'kana' => 'なごし',
                'parent' => '471023'
            ],
            '4721000' => [
                'name' => '糸満市',
                'enName' => 'Itoman City',
                'kana' => 'いとまんし',
                'parent' => '471011'
            ],
            '4721100' => [
                'name' => '沖縄市',
                'enName' => 'Okinawa City',
                'kana' => 'おきなわし',
                'parent' => '471012'
            ],
            '4721200' => [
                'name' => '豊見城市',
                'enName' => 'Tomigusuku City',
                'kana' => 'とみぐすくし',
                'parent' => '471011'
            ],
            '4721300' => [
                'name' => 'うるま市',
                'enName' => 'Uruma City',
                'kana' => 'うるまし',
                'parent' => '471012'
            ],
            '4721400' => [
                'name' => '宮古島市',
                'enName' => 'Miyakojima City',
                'kana' => 'みやこじまし',
                'parent' => '473001'
            ],
            '4721500' => [
                'name' => '南城市',
                'enName' => 'Nanjo City',
                'kana' => 'なんじょうし',
                'parent' => '471011'
            ],
            '4730100' => [
                'name' => '国頭村',
                'enName' => 'Kunigami Village',
                'kana' => 'くにがみそん',
                'parent' => '471022'
            ],
            '4730200' => [
                'name' => '大宜味村',
                'enName' => 'Ogimi Village',
                'kana' => 'おおぎみそん',
                'parent' => '471022'
            ],
            '4730300' => [
                'name' => '東村',
                'enName' => 'Higashi Village',
                'kana' => 'ひがしそん',
                'parent' => '471022'
            ],
            '4730600' => [
                'name' => '今帰仁村',
                'enName' => 'Nakijin Village',
                'kana' => 'なきじんそん',
                'parent' => '471023'
            ],
            '4730800' => [
                'name' => '本部町',
                'enName' => 'Motobu Town',
                'kana' => 'もとぶちょう',
                'parent' => '471023'
            ],
            '4731100' => [
                'name' => '恩納村',
                'enName' => 'Onna Village',
                'kana' => 'おんなそん',
                'parent' => '471024'
            ],
            '4731300' => [
                'name' => '宜野座村',
                'enName' => 'Ginoza Village',
                'kana' => 'ぎのざそん',
                'parent' => '471024'
            ],
            '4731400' => [
                'name' => '金武町',
                'enName' => 'Kin Town',
                'kana' => 'きんちょう',
                'parent' => '471024'
            ],
            '4731500' => [
                'name' => '伊江村',
                'enName' => 'Ie Village',
                'kana' => 'いえそん',
                'parent' => '471023'
            ],
            '4732400' => [
                'name' => '読谷村',
                'enName' => 'Yomitan Village',
                'kana' => 'よみたんそん',
                'parent' => '471012'
            ],
            '4732500' => [
                'name' => '嘉手納町',
                'enName' => 'Kadena Town',
                'kana' => 'かでなちょう',
                'parent' => '471012'
            ],
            '4732600' => [
                'name' => '北谷町',
                'enName' => 'Chatan Town',
                'kana' => 'ちゃたんちょう',
                'parent' => '471012'
            ],
            '4732700' => [
                'name' => '北中城村',
                'enName' => 'Kitanakagusuku Village',
                'kana' => 'きたなかぐすくそん',
                'parent' => '471012'
            ],
            '4732800' => [
                'name' => '中城村',
                'enName' => 'Nakagusuku Village',
                'kana' => 'なかぐすくそん',
                'parent' => '471012'
            ],
            '4732900' => [
                'name' => '西原町',
                'enName' => 'Nishihara Town',
                'kana' => 'にしはらちょう',
                'parent' => '471011'
            ],
            '4734800' => [
                'name' => '与那原町',
                'enName' => 'Yonabaru Town',
                'kana' => 'よなばるちょう',
                'parent' => '471011'
            ],
            '4735000' => [
                'name' => '南風原町',
                'enName' => 'Haebaru Town',
                'kana' => 'はえばるちょう',
                'parent' => '471011'
            ],
            '4735300' => [
                'name' => '渡嘉敷村',
                'enName' => 'Tokashiki Village',
                'kana' => 'とかしきそん',
                'parent' => '471013'
            ],
            '4735400' => [
                'name' => '座間味村',
                'enName' => 'Zamami Village',
                'kana' => 'ざまみそん',
                'parent' => '471013'
            ],
            '4735500' => [
                'name' => '粟国村',
                'enName' => 'Aguni Village',
                'kana' => 'あぐにそん',
                'parent' => '471013'
            ],
            '4735600' => [
                'name' => '渡名喜村',
                'enName' => 'Tonaki Village',
                'kana' => 'となきそん',
                'parent' => '471013'
            ],
            '4735700' => [
                'name' => '南大東村',
                'enName' => 'Minamidaito Village',
                'kana' => 'みなみだいとうそん',
                'parent' => '472000'
            ],
            '4735800' => [
                'name' => '北大東村',
                'enName' => 'Kitadaito Village',
                'kana' => 'きただいとうそん',
                'parent' => '472000'
            ],
            '4735900' => [
                'name' => '伊平屋村',
                'enName' => 'Iheya Village',
                'kana' => 'いへやそん',
                'parent' => '471021'
            ],
            '4736000' => [
                'name' => '伊是名村',
                'enName' => 'Izena Village',
                'kana' => 'いぜなそん',
                'parent' => '471021'
            ],
            '4736100' => [
                'name' => '久米島町',
                'enName' => 'Kumejima Town',
                'kana' => 'くめじまちょう',
                'parent' => '471030'
            ],
            '4736200' => [
                'name' => '八重瀬町',
                'enName' => 'Yaese Town',
                'kana' => 'やえせちょう',
                'parent' => '471011'
            ],
            '4737500' => [
                'name' => '多良間村',
                'enName' => 'Tarama Village',
                'kana' => 'たらまそん',
                'parent' => '473002'
            ],
            '4738100' => [
                'name' => '竹富町',
                'enName' => 'Taketomi Town',
                'kana' => 'たけとみちょう',
                'parent' => '474012'
            ],
            '4738200' => [
                'name' => '与那国町',
                'enName' => 'Yonaguni Town',
                'kana' => 'よなぐにちょう',
                'parent' => '474020'
            ],
            '0110000' => [
                'name' => '札幌市',
                'enName' => 'Sapporo City',
                'kana' => 'さっぽろし',
                'parent' => '016012'
            ],
            '0120200' => [
                'name' => '函館市',
                'enName' => 'Hakodate City',
                'kana' => 'はこだてし',
                'parent' => '017012'
            ],
            '0120300' => [
                'name' => '小樽市',
                'enName' => 'Otaru City',
                'kana' => 'おたるし',
                'parent' => '016031'
            ],
            '0120400' => [
                'name' => '旭川市',
                'enName' => 'Asahikawa City',
                'kana' => 'あさひかわし',
                'parent' => '012012'
            ],
            '0120500' => [
                'name' => '室蘭市',
                'enName' => 'Muroran City',
                'kana' => 'むろらんし',
                'parent' => '015012'
            ],
            '0120601' => [
                'name' => '釧路市釧路',
                'enName' => 'Kushiro, Kushiro City',
                'kana' => 'くしろしくしろ',
                'parent' => '014024'
            ],
            '0120602' => [
                'name' => '釧路市阿寒',
                'enName' => 'Akan, Kushiro City',
                'kana' => 'くしろしあかん',
                'parent' => '014022'
            ],
            '0120603' => [
                'name' => '釧路市音別',
                'enName' => 'Onbetsu, Kushiro City',
                'kana' => 'くしろしおんべつ',
                'parent' => '014024'
            ],
            '0120700' => [
                'name' => '帯広市',
                'enName' => 'Obihiro City',
                'kana' => 'おびひろし',
                'parent' => '014032'
            ],
            '0120801' => [
                'name' => '北見市北見',
                'enName' => 'Kitami, Kitami City',
                'kana' => 'きたみしきたみ',
                'parent' => '013020'
            ],
            '0120802' => [
                'name' => '北見市常呂',
                'enName' => 'Tokoro, Kitami City',
                'kana' => 'きたみしところ',
                'parent' => '013011'
            ],
            '0120900' => [
                'name' => '夕張市',
                'enName' => 'Yubari City',
                'kana' => 'ゆうばりし',
                'parent' => '016023'
            ],
            '0121000' => [
                'name' => '岩見沢市',
                'enName' => 'Iwamizawa City',
                'kana' => 'いわみざわし',
                'parent' => '016023'
            ],
            '0121100' => [
                'name' => '網走市',
                'enName' => 'Abashiri City',
                'kana' => 'あばしりし',
                'parent' => '013011'
            ],
            '0121200' => [
                'name' => '留萌市',
                'enName' => 'Rumoi City',
                'kana' => 'るもいし',
                'parent' => '012023'
            ],
            '0121300' => [
                'name' => '苫小牧市',
                'enName' => 'Tomakomai City',
                'kana' => 'とまこまいし',
                'parent' => '015012'
            ],
            '0121400' => [
                'name' => '稚内市',
                'enName' => 'Wakkanai City',
                'kana' => 'わっかないし',
                'parent' => '011011'
            ],
            '0121500' => [
                'name' => '美唄市',
                'enName' => 'Bibai City',
                'kana' => 'びばいし',
                'parent' => '016023'
            ],
            '0121600' => [
                'name' => '芦別市',
                'enName' => 'Ashibetsu City',
                'kana' => 'あしべつし',
                'parent' => '016022'
            ],
            '0121700' => [
                'name' => '江別市',
                'enName' => 'Ebetsu City',
                'kana' => 'えべつし',
                'parent' => '016012'
            ],
            '0121800' => [
                'name' => '赤平市',
                'enName' => 'Akabira City',
                'kana' => 'あかびらし',
                'parent' => '016022'
            ],
            '0121900' => [
                'name' => '紋別市',
                'enName' => 'Mombetsu City',
                'kana' => 'もんべつし',
                'parent' => '013031'
            ],
            '0122000' => [
                'name' => '士別市',
                'enName' => 'Shibetsu City',
                'kana' => 'しべつし',
                'parent' => '012011'
            ],
            '0122100' => [
                'name' => '名寄市',
                'enName' => 'Nayoro City',
                'kana' => 'なよろし',
                'parent' => '012011'
            ],
            '0122200' => [
                'name' => '三笠市',
                'enName' => 'Mikasa City',
                'kana' => 'みかさし',
                'parent' => '016023'
            ],
            '0122300' => [
                'name' => '根室市',
                'enName' => 'Nemuro City',
                'kana' => 'ねむろし',
                'parent' => '014013'
            ],
            '0122400' => [
                'name' => '千歳市',
                'enName' => 'Chitose City',
                'kana' => 'ちとせし',
                'parent' => '016013'
            ],
            '0122500' => [
                'name' => '滝川市',
                'enName' => 'Takikawa City',
                'kana' => 'たきかわし',
                'parent' => '016022'
            ],
            '0122600' => [
                'name' => '砂川市',
                'enName' => 'Sunagawa City',
                'kana' => 'すながわし',
                'parent' => '016022'
            ],
            '0122700' => [
                'name' => '歌志内市',
                'enName' => 'Utashinai City',
                'kana' => 'うたしないし',
                'parent' => '016022'
            ],
            '0122800' => [
                'name' => '深川市',
                'enName' => 'Fukagawa City',
                'kana' => 'ふかがわし',
                'parent' => '016021'
            ],
            '0122900' => [
                'name' => '富良野市',
                'enName' => 'Furano City',
                'kana' => 'ふらのし',
                'parent' => '012013'
            ],
            '0123000' => [
                'name' => '登別市',
                'enName' => 'Noboribetsu City',
                'kana' => 'のぼりべつし',
                'parent' => '015012'
            ],
            '0123100' => [
                'name' => '恵庭市',
                'enName' => 'Eniwa City',
                'kana' => 'えにわし',
                'parent' => '016013'
            ],
            '0123301' => [
                'name' => '伊達市伊達',
                'enName' => 'Date, Date City',
                'kana' => 'だてしだて',
                'parent' => '015011'
            ],
            '0123302' => [
                'name' => '伊達市大滝',
                'enName' => 'Otaki, Date City',
                'kana' => 'だてしおおたき',
                'parent' => '015011'
            ],
            '0123400' => [
                'name' => '北広島市',
                'enName' => 'Kitahiroshima City',
                'kana' => 'きたひろしまし',
                'parent' => '016013'
            ],
            '0123500' => [
                'name' => '石狩市',
                'enName' => 'Ishikari City',
                'kana' => 'いしかりし',
                'parent' => '016011'
            ],
            '0123600' => [
                'name' => '北斗市',
                'enName' => 'Hokuto City',
                'kana' => 'ほくとし',
                'parent' => '017012'
            ],
            '0130300' => [
                'name' => '当別町',
                'enName' => 'Tobetsu Town',
                'kana' => 'とうべつちょう',
                'parent' => '016011'
            ],
            '0130400' => [
                'name' => '新篠津村',
                'enName' => 'Shinshinotsu Village',
                'kana' => 'しんしのつむら',
                'parent' => '016011'
            ],
            '0133100' => [
                'name' => '松前町',
                'enName' => 'Matsumae Town',
                'kana' => 'まつまえちょう',
                'parent' => '017013'
            ],
            '0133200' => [
                'name' => '福島町',
                'enName' => 'Fukushima Town',
                'kana' => 'ふくしまちょう',
                'parent' => '017013'
            ],
            '0133300' => [
                'name' => '知内町',
                'enName' => 'Shiriuchi Town',
                'kana' => 'しりうちちょう',
                'parent' => '017013'
            ],
            '0133400' => [
                'name' => '木古内町',
                'enName' => 'Kikonai Town',
                'kana' => 'きこないちょう',
                'parent' => '017013'
            ],
            '0133700' => [
                'name' => '七飯町',
                'enName' => 'Nanae Town',
                'kana' => 'ななえちょう',
                'parent' => '017012'
            ],
            '0134300' => [
                'name' => '鹿部町',
                'enName' => 'Shikabe Town',
                'kana' => 'しかべちょう',
                'parent' => '017012'
            ],
            '0134500' => [
                'name' => '森町',
                'enName' => 'Mori Town',
                'kana' => 'もりまち',
                'parent' => '017012'
            ],
            '0134601' => [
                'name' => '八雲町八雲',
                'enName' => 'Yakumo, Yakumo Town',
                'kana' => 'やくもちょうやくも',
                'parent' => '017011'
            ],
            '0134602' => [
                'name' => '八雲町熊石',
                'enName' => 'Kumaishi, Yakumo Town',
                'kana' => 'やくもちょうくまいし',
                'parent' => '017021'
            ],
            '0134700' => [
                'name' => '長万部町',
                'enName' => 'Oshamambe Town',
                'kana' => 'おしゃまんべちょう',
                'parent' => '017011'
            ],
            '0136100' => [
                'name' => '江差町',
                'enName' => 'Esashi Town',
                'kana' => 'えさしちょう',
                'parent' => '017022'
            ],
            '0136200' => [
                'name' => '上ノ国町',
                'enName' => 'Kaminokuni Town',
                'kana' => 'かみのくにちょう',
                'parent' => '017022'
            ],
            '0136300' => [
                'name' => '厚沢部町',
                'enName' => 'Assabu Town',
                'kana' => 'あっさぶちょう',
                'parent' => '017022'
            ],
            '0136400' => [
                'name' => '乙部町',
                'enName' => 'Otobe Town',
                'kana' => 'おとべちょう',
                'parent' => '017022'
            ],
            '0136700' => [
                'name' => '奥尻町',
                'enName' => 'Okushiri Town',
                'kana' => 'おくしりちょう',
                'parent' => '017023'
            ],
            '0137000' => [
                'name' => '今金町',
                'enName' => 'Imakane Town',
                'kana' => 'いまかねちょう',
                'parent' => '017021'
            ],
            '0137100' => [
                'name' => 'せたな町',
                'enName' => 'Setana Town',
                'kana' => 'せたなちょう',
                'parent' => '017021'
            ],
            '0139100' => [
                'name' => '島牧村',
                'enName' => 'Shimamaki Village',
                'kana' => 'しままきむら',
                'parent' => '016033'
            ],
            '0139200' => [
                'name' => '寿都町',
                'enName' => 'Suttsu Town',
                'kana' => 'すっつちょう',
                'parent' => '016033'
            ],
            '0139300' => [
                'name' => '黒松内町',
                'enName' => 'Kuromatsunai Town',
                'kana' => 'くろまつないちょう',
                'parent' => '016033'
            ],
            '0139400' => [
                'name' => '蘭越町',
                'enName' => 'Rankoshi Town',
                'kana' => 'らんこしちょう',
                'parent' => '016033'
            ],
            '0139500' => [
                'name' => 'ニセコ町',
                'enName' => 'Niseko Town',
                'kana' => 'にせこちょう',
                'parent' => '016032'
            ],
            '0139600' => [
                'name' => '真狩村',
                'enName' => 'Makkari Village',
                'kana' => 'まっかりむら',
                'parent' => '016032'
            ],
            '0139700' => [
                'name' => '留寿都村',
                'enName' => 'Rusutsu Village',
                'kana' => 'るすつむら',
                'parent' => '016032'
            ],
            '0139800' => [
                'name' => '喜茂別町',
                'enName' => 'Kimobetsu Town',
                'kana' => 'きもべつちょう',
                'parent' => '016032'
            ],
            '0139900' => [
                'name' => '京極町',
                'enName' => 'Kyogoku Town',
                'kana' => 'きょうごくちょう',
                'parent' => '016032'
            ],
            '0140000' => [
                'name' => '倶知安町',
                'enName' => 'Kutchan Town',
                'kana' => 'くっちゃんちょう',
                'parent' => '016032'
            ],
            '0140100' => [
                'name' => '共和町',
                'enName' => 'Kyowa Town',
                'kana' => 'きょうわちょう',
                'parent' => '016033'
            ],
            '0140200' => [
                'name' => '岩内町',
                'enName' => 'Iwanai Town',
                'kana' => 'いわないちょう',
                'parent' => '016033'
            ],
            '0140300' => [
                'name' => '泊村',
                'enName' => 'Tomari Village',
                'kana' => 'とまりむら',
                'parent' => '016033'
            ],
            '0140400' => [
                'name' => '神恵内村',
                'enName' => 'Kamoenai Village',
                'kana' => 'かもえないむら',
                'parent' => '016033'
            ],
            '0140500' => [
                'name' => '積丹町',
                'enName' => 'Shakotan Town',
                'kana' => 'しゃこたんちょう',
                'parent' => '016031'
            ],
            '0140600' => [
                'name' => '古平町',
                'enName' => 'Furubira Town',
                'kana' => 'ふるびらちょう',
                'parent' => '016031'
            ],
            '0140700' => [
                'name' => '仁木町',
                'enName' => 'Niki Town',
                'kana' => 'にきちょう',
                'parent' => '016031'
            ],
            '0140800' => [
                'name' => '余市町',
                'enName' => 'Yoichi Town',
                'kana' => 'よいちちょう',
                'parent' => '016031'
            ],
            '0140900' => [
                'name' => '赤井川村',
                'enName' => 'Akaigawa Village',
                'kana' => 'あかいがわむら',
                'parent' => '016031'
            ],
            '0142300' => [
                'name' => '南幌町',
                'enName' => 'Namporo Town',
                'kana' => 'なんぽろちょう',
                'parent' => '016023'
            ],
            '0142400' => [
                'name' => '奈井江町',
                'enName' => 'Naie Town',
                'kana' => 'ないえちょう',
                'parent' => '016022'
            ],
            '0142500' => [
                'name' => '上砂川町',
                'enName' => 'Kamisunagawa Town',
                'kana' => 'かみすながわちょう',
                'parent' => '016022'
            ],
            '0142700' => [
                'name' => '由仁町',
                'enName' => 'Yuni Town',
                'kana' => 'ゆにちょう',
                'parent' => '016023'
            ],
            '0142800' => [
                'name' => '長沼町',
                'enName' => 'Naganuma Town',
                'kana' => 'ながぬまちょう',
                'parent' => '016023'
            ],
            '0142900' => [
                'name' => '栗山町',
                'enName' => 'Kuriyama Town',
                'kana' => 'くりやまちょう',
                'parent' => '016023'
            ],
            '0143000' => [
                'name' => '月形町',
                'enName' => 'Tsukigata Town',
                'kana' => 'つきがたちょう',
                'parent' => '016023'
            ],
            '0143100' => [
                'name' => '浦臼町',
                'enName' => 'Urausu Town',
                'kana' => 'うらうすちょう',
                'parent' => '016022'
            ],
            '0143200' => [
                'name' => '新十津川町',
                'enName' => 'Shintotsukawa Town',
                'kana' => 'しんとつかわちょう',
                'parent' => '016022'
            ],
            '0143300' => [
                'name' => '妹背牛町',
                'enName' => 'Moseushi Town',
                'kana' => 'もせうしちょう',
                'parent' => '016021'
            ],
            '0143400' => [
                'name' => '秩父別町',
                'enName' => 'Chippubetsu Town',
                'kana' => 'ちっぷべつちょう',
                'parent' => '016021'
            ],
            '0143600' => [
                'name' => '雨竜町',
                'enName' => 'Uryu Town',
                'kana' => 'うりゅうちょう',
                'parent' => '016022'
            ],
            '0143700' => [
                'name' => '北竜町',
                'enName' => 'Hokuryu Town',
                'kana' => 'ほくりゅうちょう',
                'parent' => '016021'
            ],
            '0143800' => [
                'name' => '沼田町',
                'enName' => 'Numata Town',
                'kana' => 'ぬまたちょう',
                'parent' => '016021'
            ],
            '0145200' => [
                'name' => '鷹栖町',
                'enName' => 'Takasu Town',
                'kana' => 'たかすちょう',
                'parent' => '012012'
            ],
            '0145300' => [
                'name' => '東神楽町',
                'enName' => 'Higashikagura Town',
                'kana' => 'ひがしかぐらちょう',
                'parent' => '012012'
            ],
            '0145400' => [
                'name' => '当麻町',
                'enName' => 'Toma Town',
                'kana' => 'とうまちょう',
                'parent' => '012012'
            ],
            '0145500' => [
                'name' => '比布町',
                'enName' => 'Pippu Town',
                'kana' => 'ぴっぷちょう',
                'parent' => '012012'
            ],
            '0145600' => [
                'name' => '愛別町',
                'enName' => 'Aibetsu Town',
                'kana' => 'あいべつちょう',
                'parent' => '012012'
            ],
            '0145700' => [
                'name' => '上川町',
                'enName' => 'Kamikawa Town',
                'kana' => 'かみかわちょう',
                'parent' => '012012'
            ],
            '0145800' => [
                'name' => '東川町',
                'enName' => 'Higashikawa Town',
                'kana' => 'ひがしかわちょう',
                'parent' => '012012'
            ],
            '0145900' => [
                'name' => '美瑛町',
                'enName' => 'Biei Town',
                'kana' => 'びえいちょう',
                'parent' => '012012'
            ],
            '0146000' => [
                'name' => '上富良野町',
                'enName' => 'Kamifurano Town',
                'kana' => 'かみふらのちょう',
                'parent' => '012013'
            ],
            '0146100' => [
                'name' => '中富良野町',
                'enName' => 'Nakafurano Town',
                'kana' => 'なかふらのちょう',
                'parent' => '012013'
            ],
            '0146200' => [
                'name' => '南富良野町',
                'enName' => 'Minamifurano Town',
                'kana' => 'みなみふらのちょう',
                'parent' => '012013'
            ],
            '0146300' => [
                'name' => '占冠村',
                'enName' => 'Shimukappu Village',
                'kana' => 'しむかっぷむら',
                'parent' => '012013'
            ],
            '0146400' => [
                'name' => '和寒町',
                'enName' => 'Wassamu Town',
                'kana' => 'わっさむちょう',
                'parent' => '012011'
            ],
            '0146500' => [
                'name' => '剣淵町',
                'enName' => 'Kembuchi Town',
                'kana' => 'けんぶちちょう',
                'parent' => '012011'
            ],
            '0146800' => [
                'name' => '下川町',
                'enName' => 'Shimokawa Town',
                'kana' => 'しもかわちょう',
                'parent' => '012011'
            ],
            '0146900' => [
                'name' => '美深町',
                'enName' => 'Bifuka Town',
                'kana' => 'びふかちょう',
                'parent' => '012011'
            ],
            '0147000' => [
                'name' => '音威子府村',
                'enName' => 'Otoineppu Village',
                'kana' => 'おといねっぷむら',
                'parent' => '012011'
            ],
            '0147100' => [
                'name' => '中川町',
                'enName' => 'Nakagawa Town',
                'kana' => 'なかがわちょう',
                'parent' => '012011'
            ],
            '0147200' => [
                'name' => '幌加内町',
                'enName' => 'Horokanai Town',
                'kana' => 'ほろかないちょう',
                'parent' => '012011'
            ],
            '0148100' => [
                'name' => '増毛町',
                'enName' => 'Mashike Town',
                'kana' => 'ましけちょう',
                'parent' => '012023'
            ],
            '0148200' => [
                'name' => '小平町',
                'enName' => 'Obira Town',
                'kana' => 'おびらちょう',
                'parent' => '012023'
            ],
            '0148300' => [
                'name' => '苫前町',
                'enName' => 'Tomamae Town',
                'kana' => 'とままえちょう',
                'parent' => '012022'
            ],
            '0148401' => [
                'name' => '羽幌町',
                'enName' => 'Haboro Town',
                'kana' => 'はぼろちょう',
                'parent' => '012022'
            ],
            '0148402' => [
                'name' => '羽幌町天売焼尻',
                'enName' => 'Teuri Yagishiri, Haboro Town',
                'kana' => 'はぼろちょうてうりやぎしり',
                'parent' => '012022'
            ],
            '0148500' => [
                'name' => '初山別村',
                'enName' => 'Shosambetsu Village',
                'kana' => 'しょさんべつむら',
                'parent' => '012022'
            ],
            '0148600' => [
                'name' => '遠別町',
                'enName' => 'Embetsu Town',
                'kana' => 'えんべつちょう',
                'parent' => '012021'
            ],
            '0148700' => [
                'name' => '天塩町',
                'enName' => 'Teshio Town',
                'kana' => 'てしおちょう',
                'parent' => '012021'
            ],
            '0151100' => [
                'name' => '猿払村',
                'enName' => 'Sarufutsu Village',
                'kana' => 'さるふつむら',
                'parent' => '011011'
            ],
            '0151200' => [
                'name' => '浜頓別町',
                'enName' => 'Hamatombetsu Town',
                'kana' => 'はまとんべつちょう',
                'parent' => '011012'
            ],
            '0151300' => [
                'name' => '中頓別町',
                'enName' => 'Nakatombetsu Town',
                'kana' => 'なかとんべつちょう',
                'parent' => '011012'
            ],
            '0151400' => [
                'name' => '枝幸町',
                'enName' => 'Esashi Town',
                'kana' => 'えさしちょう',
                'parent' => '011012'
            ],
            '0151600' => [
                'name' => '豊富町',
                'enName' => 'Toyotomi Town',
                'kana' => 'とよとみちょう',
                'parent' => '011011'
            ],
            '0151700' => [
                'name' => '礼文町',
                'enName' => 'Rebun Town',
                'kana' => 'れぶんちょう',
                'parent' => '011013'
            ],
            '0151800' => [
                'name' => '利尻町',
                'enName' => 'Rishiri Town',
                'kana' => 'りしりちょう',
                'parent' => '011013'
            ],
            '0151900' => [
                'name' => '利尻富士町',
                'enName' => 'Rishirifuji Town',
                'kana' => 'りしりふじちょう',
                'parent' => '011013'
            ],
            '0152000' => [
                'name' => '幌延町',
                'enName' => 'Horonobe Town',
                'kana' => 'ほろのべちょう',
                'parent' => '011011'
            ],
            '0154300' => [
                'name' => '美幌町',
                'enName' => 'Bihoro Town',
                'kana' => 'びほろちょう',
                'parent' => '013013'
            ],
            '0154400' => [
                'name' => '津別町',
                'enName' => 'Tsubetsu Town',
                'kana' => 'つべつちょう',
                'parent' => '013013'
            ],
            '0154500' => [
                'name' => '斜里町',
                'enName' => 'Shari Town',
                'kana' => 'しゃりちょう',
                'parent' => '013012'
            ],
            '0154600' => [
                'name' => '清里町',
                'enName' => 'Kiyosato Town',
                'kana' => 'きよさとちょう',
                'parent' => '013012'
            ],
            '0154700' => [
                'name' => '小清水町',
                'enName' => 'Koshimizu Town',
                'kana' => 'こしみずちょう',
                'parent' => '013012'
            ],
            '0154900' => [
                'name' => '訓子府町',
                'enName' => 'Kunneppu Town',
                'kana' => 'くんねっぷちょう',
                'parent' => '013020'
            ],
            '0155000' => [
                'name' => '置戸町',
                'enName' => 'Oketo Town',
                'kana' => 'おけとちょう',
                'parent' => '013020'
            ],
            '0155200' => [
                'name' => '佐呂間町',
                'enName' => 'Saroma Town',
                'kana' => 'さろまちょう',
                'parent' => '013011'
            ],
            '0155500' => [
                'name' => '遠軽町',
                'enName' => 'Engaru Town',
                'kana' => 'えんがるちょう',
                'parent' => '013032'
            ],
            '0155900' => [
                'name' => '湧別町',
                'enName' => 'Yubetsu Town',
                'kana' => 'ゆうべつちょう',
                'parent' => '013032'
            ],
            '0156000' => [
                'name' => '滝上町',
                'enName' => 'Takinoue Town',
                'kana' => 'たきのうえちょう',
                'parent' => '013031'
            ],
            '0156100' => [
                'name' => '興部町',
                'enName' => 'Okoppe Town',
                'kana' => 'おこっぺちょう',
                'parent' => '013031'
            ],
            '0156200' => [
                'name' => '西興部村',
                'enName' => 'Nishiokoppe Village',
                'kana' => 'にしおこっぺむら',
                'parent' => '013031'
            ],
            '0156300' => [
                'name' => '雄武町',
                'enName' => 'Omu Town',
                'kana' => 'おうむちょう',
                'parent' => '013031'
            ],
            '0156400' => [
                'name' => '大空町',
                'enName' => 'Ozora Town',
                'kana' => 'おおぞらちょう',
                'parent' => '013011'
            ],
            '0157100' => [
                'name' => '豊浦町',
                'enName' => 'Toyoura Town',
                'kana' => 'とようらちょう',
                'parent' => '015011'
            ],
            '0157500' => [
                'name' => '壮瞥町',
                'enName' => 'Sobetsu Town',
                'kana' => 'そうべつちょう',
                'parent' => '015011'
            ],
            '0157800' => [
                'name' => '白老町',
                'enName' => 'Shiraoi Town',
                'kana' => 'しらおいちょう',
                'parent' => '015012'
            ],
            '0158100' => [
                'name' => '厚真町',
                'enName' => 'Atsuma Town',
                'kana' => 'あつまちょう',
                'parent' => '015013'
            ],
            '0158400' => [
                'name' => '洞爺湖町',
                'enName' => 'Toyako Town',
                'kana' => 'とうやこちょう',
                'parent' => '015011'
            ],
            '0158500' => [
                'name' => '安平町',
                'enName' => 'Abira Town',
                'kana' => 'あびらちょう',
                'parent' => '015013'
            ],
            '0158600' => [
                'name' => 'むかわ町',
                'enName' => 'Mukawa Town',
                'kana' => 'むかわちょう',
                'parent' => '015013'
            ],
            '0160101' => [
                'name' => '日高町日高',
                'enName' => 'Hidaka, Hidaka Town',
                'kana' => 'ひだかちょうひだか',
                'parent' => '015021'
            ],
            '0160102' => [
                'name' => '日高町門別',
                'enName' => 'Monbetsu, Hidaka Town',
                'kana' => 'ひだかちょうもんべつ',
                'parent' => '015021'
            ],
            '0160200' => [
                'name' => '平取町',
                'enName' => 'Biratori Town',
                'kana' => 'びらとりちょう',
                'parent' => '015021'
            ],
            '0160400' => [
                'name' => '新冠町',
                'enName' => 'Niikappu Town',
                'kana' => 'にいかっぷちょう',
                'parent' => '015022'
            ],
            '0160700' => [
                'name' => '浦河町',
                'enName' => 'Urakawa Town',
                'kana' => 'うらかわちょう',
                'parent' => '015023'
            ],
            '0160800' => [
                'name' => '様似町',
                'enName' => 'Samani Town',
                'kana' => 'さまにちょう',
                'parent' => '015023'
            ],
            '0160900' => [
                'name' => 'えりも町',
                'enName' => 'Erimo Town',
                'kana' => 'えりもちょう',
                'parent' => '015023'
            ],
            '0161000' => [
                'name' => '新ひだか町',
                'enName' => 'Shinhidaka Town',
                'kana' => 'しんひだかちょう',
                'parent' => '015022'
            ],
            '0163100' => [
                'name' => '音更町',
                'enName' => 'Otofuke Town',
                'kana' => 'おとふけちょう',
                'parent' => '014032'
            ],
            '0163200' => [
                'name' => '士幌町',
                'enName' => 'Shihoro Town',
                'kana' => 'しほろちょう',
                'parent' => '014032'
            ],
            '0163300' => [
                'name' => '上士幌町',
                'enName' => 'Kamishihoro Town',
                'kana' => 'かみしほろちょう',
                'parent' => '014031'
            ],
            '0163400' => [
                'name' => '鹿追町',
                'enName' => 'Shikaoi Town',
                'kana' => 'しかおいちょう',
                'parent' => '014031'
            ],
            '0163500' => [
                'name' => '新得町',
                'enName' => 'Shintoku Town',
                'kana' => 'しんとくちょう',
                'parent' => '014031'
            ],
            '0163600' => [
                'name' => '清水町',
                'enName' => 'Shimizu Town',
                'kana' => 'しみずちょう',
                'parent' => '014032'
            ],
            '0163700' => [
                'name' => '芽室町',
                'enName' => 'Memuro Town',
                'kana' => 'めむろちょう',
                'parent' => '014032'
            ],
            '0163800' => [
                'name' => '中札内村',
                'enName' => 'Nakasatsunai Village',
                'kana' => 'なかさつないむら',
                'parent' => '014033'
            ],
            '0163900' => [
                'name' => '更別村',
                'enName' => 'Sarabetsu Village',
                'kana' => 'さらべつむら',
                'parent' => '014033'
            ],
            '0164100' => [
                'name' => '大樹町',
                'enName' => 'Taiki Town',
                'kana' => 'たいきちょう',
                'parent' => '014033'
            ],
            '0164200' => [
                'name' => '広尾町',
                'enName' => 'Hiroo Town',
                'kana' => 'ひろおちょう',
                'parent' => '014033'
            ],
            '0164300' => [
                'name' => '幕別町',
                'enName' => 'Makubetsu Town',
                'kana' => 'まくべつちょう',
                'parent' => '014032'
            ],
            '0164400' => [
                'name' => '池田町',
                'enName' => 'Ikeda Town',
                'kana' => 'いけだちょう',
                'parent' => '014032'
            ],
            '0164500' => [
                'name' => '豊頃町',
                'enName' => 'Toyokoro Town',
                'kana' => 'とよころちょう',
                'parent' => '014032'
            ],
            '0164600' => [
                'name' => '本別町',
                'enName' => 'Hombetsu Town',
                'kana' => 'ほんべつちょう',
                'parent' => '014032'
            ],
            '0164700' => [
                'name' => '足寄町',
                'enName' => 'Ashoro Town',
                'kana' => 'あしょろちょう',
                'parent' => '014031'
            ],
            '0164800' => [
                'name' => '陸別町',
                'enName' => 'Rikubetsu Town',
                'kana' => 'りくべつちょう',
                'parent' => '014031'
            ],
            '0164900' => [
                'name' => '浦幌町',
                'enName' => 'Urahoro Town',
                'kana' => 'うらほろちょう',
                'parent' => '014032'
            ],
            '0166100' => [
                'name' => '釧路町',
                'enName' => 'Kushiro Town',
                'kana' => 'くしろちょう',
                'parent' => '014024'
            ],
            '0166200' => [
                'name' => '厚岸町',
                'enName' => 'Akkeshi Town',
                'kana' => 'あっけしちょう',
                'parent' => '014023'
            ],
            '0166300' => [
                'name' => '浜中町',
                'enName' => 'Hamanaka Town',
                'kana' => 'はまなかちょう',
                'parent' => '014023'
            ],
            '0166400' => [
                'name' => '標茶町',
                'enName' => 'Shibecha Town',
                'kana' => 'しべちゃちょう',
                'parent' => '014022'
            ],
            '0166500' => [
                'name' => '弟子屈町',
                'enName' => 'Teshikaga Town',
                'kana' => 'てしかがちょう',
                'parent' => '014021'
            ],
            '0166700' => [
                'name' => '鶴居村',
                'enName' => 'Tsurui Village',
                'kana' => 'つるいむら',
                'parent' => '014022'
            ],
            '0166800' => [
                'name' => '白糠町',
                'enName' => 'Shiranuka Town',
                'kana' => 'しらぬかちょう',
                'parent' => '014024'
            ],
            '0169100' => [
                'name' => '別海町',
                'enName' => 'Betsukai Town',
                'kana' => 'べつかいちょう',
                'parent' => '014012'
            ],
            '0169200' => [
                'name' => '中標津町',
                'enName' => 'Nakashibetsu Town',
                'kana' => 'なかしべつちょう',
                'parent' => '014011'
            ],
            '0169300' => [
                'name' => '標津町',
                'enName' => 'Shibetsu Town',
                'kana' => 'しべつちょう',
                'parent' => '014011'
            ],
            '0169400' => [
                'name' => '羅臼町',
                'enName' => 'Rausu Town',
                'kana' => 'らうすちょう',
                'parent' => '014011'
            ],
            '0220100' => [
                'name' => '青森市',
                'enName' => 'Aomori City',
                'kana' => 'あおもりし',
                'parent' => '020011'
            ],
            '0220200' => [
                'name' => '弘前市',
                'enName' => 'Hirosaki City',
                'kana' => 'ひろさきし',
                'parent' => '020014'
            ],
            '0220300' => [
                'name' => '八戸市',
                'enName' => 'Hachinohe City',
                'kana' => 'はちのへし',
                'parent' => '020031'
            ],
            '0220400' => [
                'name' => '黒石市',
                'enName' => 'Kuroishi City',
                'kana' => 'くろいしし',
                'parent' => '020014'
            ],
            '0220500' => [
                'name' => '五所川原市',
                'enName' => 'Goshogawara City',
                'kana' => 'ごしょがわらし',
                'parent' => '020012'
            ],
            '0220600' => [
                'name' => '十和田市',
                'enName' => 'Towada City',
                'kana' => 'とわだし',
                'parent' => '020032'
            ],
            '0220700' => [
                'name' => '三沢市',
                'enName' => 'Misawa City',
                'kana' => 'みさわし',
                'parent' => '020031'
            ],
            '0220800' => [
                'name' => 'むつ市',
                'enName' => 'Mutsu City',
                'kana' => 'むつし',
                'parent' => '020020'
            ],
            '0220900' => [
                'name' => 'つがる市',
                'enName' => 'Tsugaru City',
                'kana' => 'つがるし',
                'parent' => '020013'
            ],
            '0221000' => [
                'name' => '平川市',
                'enName' => 'Hirakawa City',
                'kana' => 'ひらかわし',
                'parent' => '020014'
            ],
            '0230100' => [
                'name' => '平内町',
                'enName' => 'Hiranai Town',
                'kana' => 'ひらないまち',
                'parent' => '020011'
            ],
            '0230300' => [
                'name' => '今別町',
                'enName' => 'Imabetsu Town',
                'kana' => 'いまべつまち',
                'parent' => '020011'
            ],
            '0230400' => [
                'name' => '蓬田村',
                'enName' => 'Yomogita Village',
                'kana' => 'よもぎたむら',
                'parent' => '020011'
            ],
            '0230700' => [
                'name' => '外ヶ浜町',
                'enName' => 'Sotogahama Town',
                'kana' => 'そとがはままち',
                'parent' => '020011'
            ],
            '0232100' => [
                'name' => '鰺ヶ沢町',
                'enName' => 'Ajigasawa Town',
                'kana' => 'あじがさわまち',
                'parent' => '020013'
            ],
            '0232300' => [
                'name' => '深浦町',
                'enName' => 'Fukaura Town',
                'kana' => 'ふかうらまち',
                'parent' => '020013'
            ],
            '0234300' => [
                'name' => '西目屋村',
                'enName' => 'Nishimeya Village',
                'kana' => 'にしめやむら',
                'parent' => '020014'
            ],
            '0236100' => [
                'name' => '藤崎町',
                'enName' => 'Fujisaki Town',
                'kana' => 'ふじさきまち',
                'parent' => '020014'
            ],
            '0236200' => [
                'name' => '大鰐町',
                'enName' => 'Owani Town',
                'kana' => 'おおわにまち',
                'parent' => '020014'
            ],
            '0236700' => [
                'name' => '田舎館村',
                'enName' => 'Inakadate Village',
                'kana' => 'いなかだてむら',
                'parent' => '020014'
            ],
            '0238100' => [
                'name' => '板柳町',
                'enName' => 'Itayanagi Town',
                'kana' => 'いたやなぎまち',
                'parent' => '020012'
            ],
            '0238400' => [
                'name' => '鶴田町',
                'enName' => 'Tsuruta Town',
                'kana' => 'つるたまち',
                'parent' => '020012'
            ],
            '0238700' => [
                'name' => '中泊町',
                'enName' => 'Nakadomari Town',
                'kana' => 'なかどまりまち',
                'parent' => '020012'
            ],
            '0240100' => [
                'name' => '野辺地町',
                'enName' => 'Noheji Town',
                'kana' => 'のへじまち',
                'parent' => '020032'
            ],
            '0240200' => [
                'name' => '七戸町',
                'enName' => 'Shichinohe Town',
                'kana' => 'しちのへまち',
                'parent' => '020032'
            ],
            '0240500' => [
                'name' => '六戸町',
                'enName' => 'Rokunohe Town',
                'kana' => 'ろくのへまち',
                'parent' => '020031'
            ],
            '0240600' => [
                'name' => '横浜町',
                'enName' => 'Yokohama Town',
                'kana' => 'よこはままち',
                'parent' => '020032'
            ],
            '0240800' => [
                'name' => '東北町',
                'enName' => 'Tohoku Town',
                'kana' => 'とうほくまち',
                'parent' => '020032'
            ],
            '0241100' => [
                'name' => '六ヶ所村',
                'enName' => 'Rokkasho Village',
                'kana' => 'ろっかしょむら',
                'parent' => '020032'
            ],
            '0241200' => [
                'name' => 'おいらせ町',
                'enName' => 'Oirase Town',
                'kana' => 'おいらせちょう',
                'parent' => '020031'
            ],
            '0242300' => [
                'name' => '大間町',
                'enName' => 'Oma Town',
                'kana' => 'おおままち',
                'parent' => '020020'
            ],
            '0242400' => [
                'name' => '東通村',
                'enName' => 'Higashidori Village',
                'kana' => 'ひがしどおりむら',
                'parent' => '020020'
            ],
            '0242500' => [
                'name' => '風間浦村',
                'enName' => 'Kazamaura Village',
                'kana' => 'かざまうらむら',
                'parent' => '020020'
            ],
            '0242600' => [
                'name' => '佐井村',
                'enName' => 'Sai Village',
                'kana' => 'さいむら',
                'parent' => '020020'
            ],
            '0244100' => [
                'name' => '三戸町',
                'enName' => 'Sannohe Town',
                'kana' => 'さんのへまち',
                'parent' => '020031'
            ],
            '0244200' => [
                'name' => '五戸町',
                'enName' => 'Gonohe Town',
                'kana' => 'ごのへまち',
                'parent' => '020031'
            ],
            '0244300' => [
                'name' => '田子町',
                'enName' => 'Takko Town',
                'kana' => 'たっこまち',
                'parent' => '020031'
            ],
            '0244500' => [
                'name' => '南部町',
                'enName' => 'Nambu Town',
                'kana' => 'なんぶちょう',
                'parent' => '020031'
            ],
            '0244600' => [
                'name' => '階上町',
                'enName' => 'Hashikami Town',
                'kana' => 'はしかみちょう',
                'parent' => '020031'
            ],
            '0245000' => [
                'name' => '新郷村',
                'enName' => 'Shingo Village',
                'kana' => 'しんごうむら',
                'parent' => '020031'
            ],
            '0320100' => [
                'name' => '盛岡市',
                'enName' => 'Morioka City',
                'kana' => 'もりおかし',
                'parent' => '030011'
            ],
            '0320200' => [
                'name' => '宮古市',
                'enName' => 'Miyako City',
                'kana' => 'みやこし',
                'parent' => '030022'
            ],
            '0320300' => [
                'name' => '大船渡市',
                'enName' => 'Ofunato City',
                'kana' => 'おおふなとし',
                'parent' => '030032'
            ],
            '0320500' => [
                'name' => '花巻市',
                'enName' => 'Hanamaki City',
                'kana' => 'はなまきし',
                'parent' => '030013'
            ],
            '0320600' => [
                'name' => '北上市',
                'enName' => 'Kitakami City',
                'kana' => 'きたかみし',
                'parent' => '030013'
            ],
            '0320700' => [
                'name' => '久慈市',
                'enName' => 'Kuji City',
                'kana' => 'くじし',
                'parent' => '030021'
            ],
            '0320800' => [
                'name' => '遠野市',
                'enName' => 'Tono City',
                'kana' => 'とおのし',
                'parent' => '030014'
            ],
            '0320900' => [
                'name' => '一関市',
                'enName' => 'Ichinoseki City',
                'kana' => 'いちのせきし',
                'parent' => '030016'
            ],
            '0321000' => [
                'name' => '陸前高田市',
                'enName' => 'Rikuzentakata City',
                'kana' => 'りくぜんたかたし',
                'parent' => '030032'
            ],
            '0321100' => [
                'name' => '釜石市',
                'enName' => 'Kamaishi City',
                'kana' => 'かまいしし',
                'parent' => '030031'
            ],
            '0321300' => [
                'name' => '二戸市',
                'enName' => 'Ninohe City',
                'kana' => 'にのへし',
                'parent' => '030012'
            ],
            '0321400' => [
                'name' => '八幡平市',
                'enName' => 'Hachimantai City',
                'kana' => 'はちまんたいし',
                'parent' => '030011'
            ],
            '0321500' => [
                'name' => '奥州市',
                'enName' => 'Oshu City',
                'kana' => 'おうしゅうし',
                'parent' => '030015'
            ],
            '0321600' => [
                'name' => '滝沢市',
                'enName' => 'Takizawa City',
                'kana' => 'たきざわし',
                'parent' => '030011'
            ],
            '0330100' => [
                'name' => '雫石町',
                'enName' => 'Shizukuishi Town',
                'kana' => 'しずくいしちょう',
                'parent' => '030011'
            ],
            '0330200' => [
                'name' => '葛巻町',
                'enName' => 'Kuzumaki Town',
                'kana' => 'くずまきまち',
                'parent' => '030011'
            ],
            '0330300' => [
                'name' => '岩手町',
                'enName' => 'Iwate Town',
                'kana' => 'いわてまち',
                'parent' => '030011'
            ],
            '0332100' => [
                'name' => '紫波町',
                'enName' => 'Shiwa Town',
                'kana' => 'しわちょう',
                'parent' => '030011'
            ],
            '0332200' => [
                'name' => '矢巾町',
                'enName' => 'Yahaba Town',
                'kana' => 'やはばちょう',
                'parent' => '030011'
            ],
            '0336600' => [
                'name' => '西和賀町',
                'enName' => 'Nishiwaga Town',
                'kana' => 'にしわがまち',
                'parent' => '030013'
            ],
            '0338100' => [
                'name' => '金ケ崎町',
                'enName' => 'Kanegasaki Town',
                'kana' => 'かねがさきちょう',
                'parent' => '030015'
            ],
            '0340200' => [
                'name' => '平泉町',
                'enName' => 'Hiraizumi Town',
                'kana' => 'ひらいずみちょう',
                'parent' => '030016'
            ],
            '0344100' => [
                'name' => '住田町',
                'enName' => 'Sumita Town',
                'kana' => 'すみたちょう',
                'parent' => '030032'
            ],
            '0346100' => [
                'name' => '大槌町',
                'enName' => 'Otsuchi Town',
                'kana' => 'おおつちちょう',
                'parent' => '030031'
            ],
            '0348200' => [
                'name' => '山田町',
                'enName' => 'Yamada Town',
                'kana' => 'やまだまち',
                'parent' => '030022'
            ],
            '0348300' => [
                'name' => '岩泉町',
                'enName' => 'Iwaizumi Town',
                'kana' => 'いわいずみちょう',
                'parent' => '030022'
            ],
            '0348400' => [
                'name' => '田野畑村',
                'enName' => 'Tanohata Village',
                'kana' => 'たのはたむら',
                'parent' => '030022'
            ],
            '0348500' => [
                'name' => '普代村',
                'enName' => 'Fudai Village',
                'kana' => 'ふだいむら',
                'parent' => '030021'
            ],
            '0350100' => [
                'name' => '軽米町',
                'enName' => 'Karumai Town',
                'kana' => 'かるまいまち',
                'parent' => '030012'
            ],
            '0350300' => [
                'name' => '野田村',
                'enName' => 'Noda Village',
                'kana' => 'のだむら',
                'parent' => '030021'
            ],
            '0350600' => [
                'name' => '九戸村',
                'enName' => 'Kunohe Village',
                'kana' => 'くのへむら',
                'parent' => '030012'
            ],
            '0350700' => [
                'name' => '洋野町',
                'enName' => 'Hirono Town',
                'kana' => 'ひろのちょう',
                'parent' => '030021'
            ],
            '0352400' => [
                'name' => '一戸町',
                'enName' => 'Ichinohe Town',
                'kana' => 'いちのへまち',
                'parent' => '030012'
            ],
            '0410001' => [
                'name' => '仙台市東部',
                'enName' => 'Eastern Sendai City',
                'kana' => 'せんだいしとうぶ',
                'parent' => '040011'
            ],
            '0410002' => [
                'name' => '仙台市西部',
                'enName' => 'Western Sendai City',
                'kana' => 'せんだいしせいぶ',
                'parent' => '040021'
            ],
            '0420200' => [
                'name' => '石巻市',
                'enName' => 'Ishinomaki City',
                'kana' => 'いしのまきし',
                'parent' => '040012'
            ],
            '0420300' => [
                'name' => '塩竈市',
                'enName' => 'Shiogama City',
                'kana' => 'しおがまし',
                'parent' => '040011'
            ],
            '0420500' => [
                'name' => '気仙沼市',
                'enName' => 'Kesennuma City',
                'kana' => 'けせんぬまし',
                'parent' => '040014'
            ],
            '0420600' => [
                'name' => '白石市',
                'enName' => 'Shiroishi City',
                'kana' => 'しろいしし',
                'parent' => '040022'
            ],
            '0420700' => [
                'name' => '名取市',
                'enName' => 'Natori City',
                'kana' => 'なとりし',
                'parent' => '040011'
            ],
            '0420800' => [
                'name' => '角田市',
                'enName' => 'Kakuda City',
                'kana' => 'かくだし',
                'parent' => '040015'
            ],
            '0420900' => [
                'name' => '多賀城市',
                'enName' => 'Tagajo City',
                'kana' => 'たがじょうし',
                'parent' => '040011'
            ],
            '0421100' => [
                'name' => '岩沼市',
                'enName' => 'Iwanuma City',
                'kana' => 'いわぬまし',
                'parent' => '040011'
            ],
            '0421200' => [
                'name' => '登米市',
                'enName' => 'Tome City',
                'kana' => 'とめし',
                'parent' => '040016'
            ],
            '0421301' => [
                'name' => '栗原市東部',
                'enName' => 'Eastern Kurihara City',
                'kana' => 'くりはらしとうぶ',
                'parent' => '040016'
            ],
            '0421302' => [
                'name' => '栗原市西部',
                'enName' => 'Western Kurihara City',
                'kana' => 'くりはらしせいぶ',
                'parent' => '040024'
            ],
            '0421400' => [
                'name' => '東松島市',
                'enName' => 'Higashimatsushima City',
                'kana' => 'ひがしまつしまし',
                'parent' => '040012'
            ],
            '0421501' => [
                'name' => '大崎市東部',
                'enName' => 'Eastern Osaki City',
                'kana' => 'おおさきしとうぶ',
                'parent' => '040013'
            ],
            '0421502' => [
                'name' => '大崎市西部',
                'enName' => 'Western Osaki City',
                'kana' => 'おおさきしせいぶ',
                'parent' => '040023'
            ],
            '0421600' => [
                'name' => '富谷市',
                'enName' => 'Tomiya City',
                'kana' => 'とみやし',
                'parent' => '040011'
            ],
            '0430100' => [
                'name' => '蔵王町',
                'enName' => 'Zao Town',
                'kana' => 'ざおうまち',
                'parent' => '040022'
            ],
            '0430200' => [
                'name' => '七ヶ宿町',
                'enName' => 'Shichikashuku Town',
                'kana' => 'しちかしゅくまち',
                'parent' => '040022'
            ],
            '0432100' => [
                'name' => '大河原町',
                'enName' => 'Ogawara Town',
                'kana' => 'おおがわらまち',
                'parent' => '040015'
            ],
            '0432200' => [
                'name' => '村田町',
                'enName' => 'Murata Town',
                'kana' => 'むらたまち',
                'parent' => '040015'
            ],
            '0432300' => [
                'name' => '柴田町',
                'enName' => 'Shibata Town',
                'kana' => 'しばたまち',
                'parent' => '040015'
            ],
            '0432400' => [
                'name' => '川崎町',
                'enName' => 'Kawasaki Town',
                'kana' => 'かわさきまち',
                'parent' => '040022'
            ],
            '0434100' => [
                'name' => '丸森町',
                'enName' => 'Marumori Town',
                'kana' => 'まるもりまち',
                'parent' => '040015'
            ],
            '0436100' => [
                'name' => '亘理町',
                'enName' => 'Watari Town',
                'kana' => 'わたりちょう',
                'parent' => '040011'
            ],
            '0436200' => [
                'name' => '山元町',
                'enName' => 'Yamamoto Town',
                'kana' => 'やまもとちょう',
                'parent' => '040011'
            ],
            '0440100' => [
                'name' => '松島町',
                'enName' => 'Matsushima Town',
                'kana' => 'まつしままち',
                'parent' => '040011'
            ],
            '0440400' => [
                'name' => '七ヶ浜町',
                'enName' => 'Shichigahama Town',
                'kana' => 'しちがはままち',
                'parent' => '040011'
            ],
            '0440600' => [
                'name' => '利府町',
                'enName' => 'Rifu Town',
                'kana' => 'りふちょう',
                'parent' => '040011'
            ],
            '0442101' => [
                'name' => '大和町東部',
                'enName' => 'Eastern Taiwa Town',
                'kana' => 'たいわちょうとうぶ',
                'parent' => '040011'
            ],
            '0442102' => [
                'name' => '大和町西部',
                'enName' => 'Western Taiwa Town',
                'kana' => 'たいわちょうせいぶ',
                'parent' => '040021'
            ],
            '0442200' => [
                'name' => '大郷町',
                'enName' => 'Osato Town',
                'kana' => 'おおさとちょう',
                'parent' => '040011'
            ],
            '0442400' => [
                'name' => '大衡村',
                'enName' => 'Ohira Village',
                'kana' => 'おおひらむら',
                'parent' => '040021'
            ],
            '0444400' => [
                'name' => '色麻町',
                'enName' => 'Shikama Town',
                'kana' => 'しかまちょう',
                'parent' => '040023'
            ],
            '0444500' => [
                'name' => '加美町',
                'enName' => 'Kami Town',
                'kana' => 'かみまち',
                'parent' => '040023'
            ],
            '0450100' => [
                'name' => '涌谷町',
                'enName' => 'Wakuya Town',
                'kana' => 'わくやちょう',
                'parent' => '040013'
            ],
            '0450500' => [
                'name' => '美里町',
                'enName' => 'Misato Town',
                'kana' => 'みさとまち',
                'parent' => '040013'
            ],
            '0458100' => [
                'name' => '女川町',
                'enName' => 'Onagawa Town',
                'kana' => 'おながわちょう',
                'parent' => '040012'
            ],
            '0460600' => [
                'name' => '南三陸町',
                'enName' => 'Minamisanriku Town',
                'kana' => 'みなみさんりくちょう',
                'parent' => '040014'
            ],
            '0520100' => [
                'name' => '秋田市',
                'enName' => 'Akita City',
                'kana' => 'あきたし',
                'parent' => '050011'
            ],
            '0520200' => [
                'name' => '能代市',
                'enName' => 'Noshiro City',
                'kana' => 'のしろし',
                'parent' => '050012'
            ],
            '0520300' => [
                'name' => '横手市',
                'enName' => 'Yokote City',
                'kana' => 'よこてし',
                'parent' => '050022'
            ],
            '0520400' => [
                'name' => '大館市',
                'enName' => 'Odate City',
                'kana' => 'おおだてし',
                'parent' => '050021'
            ],
            '0520600' => [
                'name' => '男鹿市',
                'enName' => 'Oga City',
                'kana' => 'おがし',
                'parent' => '050011'
            ],
            '0520700' => [
                'name' => '湯沢市',
                'enName' => 'Yuzawa City',
                'kana' => 'ゆざわし',
                'parent' => '050023'
            ],
            '0520900' => [
                'name' => '鹿角市',
                'enName' => 'Kazuno City',
                'kana' => 'かづのし',
                'parent' => '050021'
            ],
            '0521000' => [
                'name' => '由利本荘市',
                'enName' => 'Yurihonjo City',
                'kana' => 'ゆりほんじょうし',
                'parent' => '050013'
            ],
            '0521100' => [
                'name' => '潟上市',
                'enName' => 'Katagami City',
                'kana' => 'かたがみし',
                'parent' => '050011'
            ],
            '0521200' => [
                'name' => '大仙市',
                'enName' => 'Daisen City',
                'kana' => 'だいせんし',
                'parent' => '050022'
            ],
            '0521300' => [
                'name' => '北秋田市',
                'enName' => 'Kitaakita City',
                'kana' => 'きたあきたし',
                'parent' => '050021'
            ],
            '0521400' => [
                'name' => 'にかほ市',
                'enName' => 'Nikaho City',
                'kana' => 'にかほし',
                'parent' => '050013'
            ],
            '0521500' => [
                'name' => '仙北市',
                'enName' => 'Semboku City',
                'kana' => 'せんぼくし',
                'parent' => '050022'
            ],
            '0530300' => [
                'name' => '小坂町',
                'enName' => 'Kosaka Town',
                'kana' => 'こさかまち',
                'parent' => '050021'
            ],
            '0532700' => [
                'name' => '上小阿仁村',
                'enName' => 'Kamikoani Village',
                'kana' => 'かみこあにむら',
                'parent' => '050021'
            ],
            '0534600' => [
                'name' => '藤里町',
                'enName' => 'Fujisato Town',
                'kana' => 'ふじさとまち',
                'parent' => '050012'
            ],
            '0534800' => [
                'name' => '三種町',
                'enName' => 'Mitane Town',
                'kana' => 'みたねちょう',
                'parent' => '050012'
            ],
            '0534900' => [
                'name' => '八峰町',
                'enName' => 'Happou Town',
                'kana' => 'はっぽうちょう',
                'parent' => '050012'
            ],
            '0536100' => [
                'name' => '五城目町',
                'enName' => 'Gojome Town',
                'kana' => 'ごじょうめまち',
                'parent' => '050011'
            ],
            '0536300' => [
                'name' => '八郎潟町',
                'enName' => 'Hachirogata Town',
                'kana' => 'はちろうがたまち',
                'parent' => '050011'
            ],
            '0536600' => [
                'name' => '井川町',
                'enName' => 'Ikawa Town',
                'kana' => 'いかわまち',
                'parent' => '050011'
            ],
            '0536800' => [
                'name' => '大潟村',
                'enName' => 'Ogata Village',
                'kana' => 'おおがたむら',
                'parent' => '050011'
            ],
            '0543400' => [
                'name' => '美郷町',
                'enName' => 'Misato Town',
                'kana' => 'みさとちょう',
                'parent' => '050022'
            ],
            '0546300' => [
                'name' => '羽後町',
                'enName' => 'Ugo Town',
                'kana' => 'うごまち',
                'parent' => '050023'
            ],
            '0546400' => [
                'name' => '東成瀬村',
                'enName' => 'Higashinaruse Village',
                'kana' => 'ひがしなるせむら',
                'parent' => '050023'
            ],
            '0620100' => [
                'name' => '山形市',
                'enName' => 'Yamagata City',
                'kana' => 'やまがたし',
                'parent' => '060011'
            ],
            '0620200' => [
                'name' => '米沢市',
                'enName' => 'Yonezawa City',
                'kana' => 'よねざわし',
                'parent' => '060021'
            ],
            '0620300' => [
                'name' => '鶴岡市',
                'enName' => 'Tsuruoka City',
                'kana' => 'つるおかし',
                'parent' => '060032'
            ],
            '0620400' => [
                'name' => '酒田市',
                'enName' => 'Sakata City',
                'kana' => 'さかたし',
                'parent' => '060031'
            ],
            '0620500' => [
                'name' => '新庄市',
                'enName' => 'Shinjo City',
                'kana' => 'しんじょうし',
                'parent' => '060040'
            ],
            '0620600' => [
                'name' => '寒河江市',
                'enName' => 'Sagae City',
                'kana' => 'さがえし',
                'parent' => '060013'
            ],
            '0620700' => [
                'name' => '上山市',
                'enName' => 'Kaminoyama City',
                'kana' => 'かみのやまし',
                'parent' => '060011'
            ],
            '0620800' => [
                'name' => '村山市',
                'enName' => 'Murayama City',
                'kana' => 'むらやまし',
                'parent' => '060012'
            ],
            '0620900' => [
                'name' => '長井市',
                'enName' => 'Nagai City',
                'kana' => 'ながいし',
                'parent' => '060022'
            ],
            '0621000' => [
                'name' => '天童市',
                'enName' => 'Tendo City',
                'kana' => 'てんどうし',
                'parent' => '060011'
            ],
            '0621100' => [
                'name' => '東根市',
                'enName' => 'Higashine City',
                'kana' => 'ひがしねし',
                'parent' => '060012'
            ],
            '0621200' => [
                'name' => '尾花沢市',
                'enName' => 'Obanazawa City',
                'kana' => 'おばなざわし',
                'parent' => '060012'
            ],
            '0621300' => [
                'name' => '南陽市',
                'enName' => 'Nanyo City',
                'kana' => 'なんようし',
                'parent' => '060021'
            ],
            '0630100' => [
                'name' => '山辺町',
                'enName' => 'Yamanobe Town',
                'kana' => 'やまのべまち',
                'parent' => '060011'
            ],
            '0630200' => [
                'name' => '中山町',
                'enName' => 'Nakayama Town',
                'kana' => 'なかやままち',
                'parent' => '060011'
            ],
            '0632100' => [
                'name' => '河北町',
                'enName' => 'Kahoku Town',
                'kana' => 'かほくちょう',
                'parent' => '060013'
            ],
            '0632200' => [
                'name' => '西川町',
                'enName' => 'Nishikawa Town',
                'kana' => 'にしかわまち',
                'parent' => '060013'
            ],
            '0632300' => [
                'name' => '朝日町',
                'enName' => 'Asahi Town',
                'kana' => 'あさひまち',
                'parent' => '060013'
            ],
            '0632400' => [
                'name' => '大江町',
                'enName' => 'Oe Town',
                'kana' => 'おおえまち',
                'parent' => '060013'
            ],
            '0634100' => [
                'name' => '大石田町',
                'enName' => 'Oishida Town',
                'kana' => 'おおいしだまち',
                'parent' => '060012'
            ],
            '0636100' => [
                'name' => '金山町',
                'enName' => 'Kaneyama Town',
                'kana' => 'かねやままち',
                'parent' => '060040'
            ],
            '0636200' => [
                'name' => '最上町',
                'enName' => 'Mogami Town',
                'kana' => 'もがみまち',
                'parent' => '060040'
            ],
            '0636300' => [
                'name' => '舟形町',
                'enName' => 'Funagata Town',
                'kana' => 'ふながたまち',
                'parent' => '060040'
            ],
            '0636400' => [
                'name' => '真室川町',
                'enName' => 'Mamurogawa Town',
                'kana' => 'まむろがわまち',
                'parent' => '060040'
            ],
            '0636500' => [
                'name' => '大蔵村',
                'enName' => 'Okura Village',
                'kana' => 'おおくらむら',
                'parent' => '060040'
            ],
            '0636600' => [
                'name' => '鮭川村',
                'enName' => 'Sakegawa Village',
                'kana' => 'さけがわむら',
                'parent' => '060040'
            ],
            '0636700' => [
                'name' => '戸沢村',
                'enName' => 'Tozawa Village',
                'kana' => 'とざわむら',
                'parent' => '060040'
            ],
            '0638100' => [
                'name' => '高畠町',
                'enName' => 'Takahata Town',
                'kana' => 'たかはたまち',
                'parent' => '060021'
            ],
            '0638200' => [
                'name' => '川西町',
                'enName' => 'Kawanishi Town',
                'kana' => 'かわにしまち',
                'parent' => '060021'
            ],
            '0640100' => [
                'name' => '小国町',
                'enName' => 'Oguni Town',
                'kana' => 'おぐにまち',
                'parent' => '060022'
            ],
            '0640200' => [
                'name' => '白鷹町',
                'enName' => 'Shirataka Town',
                'kana' => 'しらたかまち',
                'parent' => '060022'
            ],
            '0640300' => [
                'name' => '飯豊町',
                'enName' => 'Iide Town',
                'kana' => 'いいでまち',
                'parent' => '060022'
            ],
            '0642600' => [
                'name' => '三川町',
                'enName' => 'Mikawa Town',
                'kana' => 'みかわまち',
                'parent' => '060032'
            ],
            '0642800' => [
                'name' => '庄内町',
                'enName' => 'Shonai Town',
                'kana' => 'しょうないまち',
                'parent' => '060032'
            ],
            '0646100' => [
                'name' => '遊佐町',
                'enName' => 'Yuza Town',
                'kana' => 'ゆざまち',
                'parent' => '060031'
            ],
            '0720100' => [
                'name' => '福島市',
                'enName' => 'Fukushima City',
                'kana' => 'ふくしまし',
                'parent' => '070011'
            ],
            '0720200' => [
                'name' => '会津若松市',
                'enName' => 'Aizuwakamatsu City',
                'kana' => 'あいづわかまつし',
                'parent' => '070032'
            ],
            '0720301' => [
                'name' => '郡山市',
                'enName' => 'Koriyama City',
                'kana' => 'こおりやまし',
                'parent' => '070012'
            ],
            '0720302' => [
                'name' => '郡山市湖南',
                'enName' => 'Konan, Koriyama City',
                'kana' => 'こおりやましこなん',
                'parent' => '070032'
            ],
            '0720400' => [
                'name' => 'いわき市',
                'enName' => 'Iwaki City',
                'kana' => 'いわきし',
                'parent' => '070023'
            ],
            '0720500' => [
                'name' => '白河市',
                'enName' => 'Shirakawa City',
                'kana' => 'しらかわし',
                'parent' => '070013'
            ],
            '0720700' => [
                'name' => '須賀川市',
                'enName' => 'Sukagawa City',
                'kana' => 'すかがわし',
                'parent' => '070012'
            ],
            '0720800' => [
                'name' => '喜多方市',
                'enName' => 'Kitakata City',
                'kana' => 'きたかたし',
                'parent' => '070031'
            ],
            '0720900' => [
                'name' => '相馬市',
                'enName' => 'Soma City',
                'kana' => 'そうまし',
                'parent' => '070021'
            ],
            '0721000' => [
                'name' => '二本松市',
                'enName' => 'Nihonmatsu City',
                'kana' => 'にほんまつし',
                'parent' => '070012'
            ],
            '0721100' => [
                'name' => '田村市',
                'enName' => 'Tamura City',
                'kana' => 'たむらし',
                'parent' => '070012'
            ],
            '0721200' => [
                'name' => '南相馬市',
                'enName' => 'Minamisoma City',
                'kana' => 'みなみそうまし',
                'parent' => '070021'
            ],
            '0721300' => [
                'name' => '伊達市',
                'enName' => 'Date City',
                'kana' => 'だてし',
                'parent' => '070011'
            ],
            '0721400' => [
                'name' => '本宮市',
                'enName' => 'Motomiya City',
                'kana' => 'もとみやし',
                'parent' => '070012'
            ],
            '0730100' => [
                'name' => '桑折町',
                'enName' => 'Koori Town',
                'kana' => 'こおりまち',
                'parent' => '070011'
            ],
            '0730300' => [
                'name' => '国見町',
                'enName' => 'Kunimi Town',
                'kana' => 'くにみまち',
                'parent' => '070011'
            ],
            '0730800' => [
                'name' => '川俣町',
                'enName' => 'Kawamata Town',
                'kana' => 'かわまたまち',
                'parent' => '070011'
            ],
            '0732200' => [
                'name' => '大玉村',
                'enName' => 'Otama Village',
                'kana' => 'おおたまむら',
                'parent' => '070012'
            ],
            '0734200' => [
                'name' => '鏡石町',
                'enName' => 'Kagamiishi Town',
                'kana' => 'かがみいしまち',
                'parent' => '070012'
            ],
            '0734401' => [
                'name' => '天栄村',
                'enName' => 'Tenei Village',
                'kana' => 'てんえいむら',
                'parent' => '070012'
            ],
            '0734402' => [
                'name' => '天栄村湯本',
                'enName' => 'Yumoto, Tenei Village',
                'kana' => 'てんえいむらゆもと',
                'parent' => '070033'
            ],
            '0736200' => [
                'name' => '下郷町',
                'enName' => 'Shimogo Town',
                'kana' => 'しもごうまち',
                'parent' => '070033'
            ],
            '0736400' => [
                'name' => '檜枝岐村',
                'enName' => 'Hinoemata Village',
                'kana' => 'ひのえまたむら',
                'parent' => '070033'
            ],
            '0736700' => [
                'name' => '只見町',
                'enName' => 'Tadami Town',
                'kana' => 'ただみまち',
                'parent' => '070033'
            ],
            '0736800' => [
                'name' => '南会津町',
                'enName' => 'Minamiaizu Town',
                'kana' => 'みなみあいづまち',
                'parent' => '070033'
            ],
            '0740200' => [
                'name' => '北塩原村',
                'enName' => 'Kitashiobara Village',
                'kana' => 'きたしおばらむら',
                'parent' => '070031'
            ],
            '0740500' => [
                'name' => '西会津町',
                'enName' => 'Nishiaizu Town',
                'kana' => 'にしあいづまち',
                'parent' => '070031'
            ],
            '0740700' => [
                'name' => '磐梯町',
                'enName' => 'Bandai Town',
                'kana' => 'ばんだいまち',
                'parent' => '070031'
            ],
            '0740800' => [
                'name' => '猪苗代町',
                'enName' => 'Inawashiro Town',
                'kana' => 'いなわしろまち',
                'parent' => '070031'
            ],
            '0742100' => [
                'name' => '会津坂下町',
                'enName' => 'Aizubange Town',
                'kana' => 'あいづばんげまち',
                'parent' => '070032'
            ],
            '0742200' => [
                'name' => '湯川村',
                'enName' => 'Yugawa Village',
                'kana' => 'ゆがわむら',
                'parent' => '070032'
            ],
            '0742300' => [
                'name' => '柳津町',
                'enName' => 'Yanaizu Town',
                'kana' => 'やないづまち',
                'parent' => '070032'
            ],
            '0744400' => [
                'name' => '三島町',
                'enName' => 'Mishima Town',
                'kana' => 'みしままち',
                'parent' => '070032'
            ],
            '0744500' => [
                'name' => '金山町',
                'enName' => 'Kaneyama Town',
                'kana' => 'かねやままち',
                'parent' => '070032'
            ],
            '0744600' => [
                'name' => '昭和村',
                'enName' => 'Showa Village',
                'kana' => 'しょうわむら',
                'parent' => '070032'
            ],
            '0744700' => [
                'name' => '会津美里町',
                'enName' => 'Aizumisato Town',
                'kana' => 'あいづみさとまち',
                'parent' => '070032'
            ],
            '0746100' => [
                'name' => '西郷村',
                'enName' => 'Nishigo Village',
                'kana' => 'にしごうむら',
                'parent' => '070013'
            ],
            '0746400' => [
                'name' => '泉崎村',
                'enName' => 'Izumizaki Village',
                'kana' => 'いずみざきむら',
                'parent' => '070013'
            ],
            '0746500' => [
                'name' => '中島村',
                'enName' => 'Nakajima Village',
                'kana' => 'なかじまむら',
                'parent' => '070013'
            ],
            '0746600' => [
                'name' => '矢吹町',
                'enName' => 'Yabuki Town',
                'kana' => 'やぶきまち',
                'parent' => '070013'
            ],
            '0748100' => [
                'name' => '棚倉町',
                'enName' => 'Tanagura Town',
                'kana' => 'たなぐらまち',
                'parent' => '070013'
            ],
            '0748200' => [
                'name' => '矢祭町',
                'enName' => 'Yamatsuri Town',
                'kana' => 'やまつりまち',
                'parent' => '070013'
            ],
            '0748300' => [
                'name' => '塙町',
                'enName' => 'Hanawa Town',
                'kana' => 'はなわまち',
                'parent' => '070013'
            ],
            '0748400' => [
                'name' => '鮫川村',
                'enName' => 'Samegawa Village',
                'kana' => 'さめがわむら',
                'parent' => '070013'
            ],
            '0750100' => [
                'name' => '石川町',
                'enName' => 'Ishikawa Town',
                'kana' => 'いしかわまち',
                'parent' => '070013'
            ],
            '0750200' => [
                'name' => '玉川村',
                'enName' => 'Tamakawa Village',
                'kana' => 'たまかわむら',
                'parent' => '070013'
            ],
            '0750300' => [
                'name' => '平田村',
                'enName' => 'Hirata Village',
                'kana' => 'ひらたむら',
                'parent' => '070013'
            ],
            '0750400' => [
                'name' => '浅川町',
                'enName' => 'Asakawa Town',
                'kana' => 'あさかわまち',
                'parent' => '070013'
            ],
            '0750500' => [
                'name' => '古殿町',
                'enName' => 'Furudono Town',
                'kana' => 'ふるどのまち',
                'parent' => '070013'
            ],
            '0752100' => [
                'name' => '三春町',
                'enName' => 'Miharu Town',
                'kana' => 'みはるまち',
                'parent' => '070012'
            ],
            '0752200' => [
                'name' => '小野町',
                'enName' => 'Ono Town',
                'kana' => 'おのまち',
                'parent' => '070012'
            ],
            '0754100' => [
                'name' => '広野町',
                'enName' => 'Hirono Town',
                'kana' => 'ひろのまち',
                'parent' => '070022'
            ],
            '0754200' => [
                'name' => '楢葉町',
                'enName' => 'Naraha Town',
                'kana' => 'ならはまち',
                'parent' => '070022'
            ],
            '0754300' => [
                'name' => '富岡町',
                'enName' => 'Tomioka Town',
                'kana' => 'とみおかまち',
                'parent' => '070022'
            ],
            '0754400' => [
                'name' => '川内村',
                'enName' => 'Kawauchi Village',
                'kana' => 'かわうちむら',
                'parent' => '070022'
            ],
            '0754500' => [
                'name' => '大熊町',
                'enName' => 'Okuma Town',
                'kana' => 'おおくままち',
                'parent' => '070022'
            ],
            '0754600' => [
                'name' => '双葉町',
                'enName' => 'Futaba Town',
                'kana' => 'ふたばまち',
                'parent' => '070022'
            ],
            '0754700' => [
                'name' => '浪江町',
                'enName' => 'Namie Town',
                'kana' => 'なみえまち',
                'parent' => '070022'
            ],
            '0754800' => [
                'name' => '葛尾村',
                'enName' => 'Katsurao Village',
                'kana' => 'かつらおむら',
                'parent' => '070022'
            ],
            '0756100' => [
                'name' => '新地町',
                'enName' => 'Shinchi Town',
                'kana' => 'しんちまち',
                'parent' => '070021'
            ],
            '0756400' => [
                'name' => '飯舘村',
                'enName' => 'Iitate Village',
                'kana' => 'いいたてむら',
                'parent' => '070021'
            ],
            '0820100' => [
                'name' => '水戸市',
                'enName' => 'Mito City',
                'kana' => 'みとし',
                'parent' => '080011'
            ],
            '0820200' => [
                'name' => '日立市',
                'enName' => 'Hitachi City',
                'kana' => 'ひたちし',
                'parent' => '080012'
            ],
            '0820300' => [
                'name' => '土浦市',
                'enName' => 'Tsuchiura City',
                'kana' => 'つちうらし',
                'parent' => '080022'
            ],
            '0820400' => [
                'name' => '古河市',
                'enName' => 'Koga City',
                'kana' => 'こがし',
                'parent' => '080023'
            ],
            '0820500' => [
                'name' => '石岡市',
                'enName' => 'Ishioka City',
                'kana' => 'いしおかし',
                'parent' => '080022'
            ],
            '0820700' => [
                'name' => '結城市',
                'enName' => 'Yuki City',
                'kana' => 'ゆうきし',
                'parent' => '080023'
            ],
            '0820800' => [
                'name' => '龍ケ崎市',
                'enName' => 'Ryugasaki City',
                'kana' => 'りゅうがさきし',
                'parent' => '080022'
            ],
            '0821000' => [
                'name' => '下妻市',
                'enName' => 'Shimotsuma City',
                'kana' => 'しもつまし',
                'parent' => '080023'
            ],
            '0821100' => [
                'name' => '常総市',
                'enName' => 'Joso City',
                'kana' => 'じょうそうし',
                'parent' => '080023'
            ],
            '0821200' => [
                'name' => '常陸太田市',
                'enName' => 'Hitachiota City',
                'kana' => 'ひたちおおたし',
                'parent' => '080012'
            ],
            '0821400' => [
                'name' => '高萩市',
                'enName' => 'Takahagi City',
                'kana' => 'たかはぎし',
                'parent' => '080012'
            ],
            '0821500' => [
                'name' => '北茨城市',
                'enName' => 'Kitaibaraki City',
                'kana' => 'きたいばらきし',
                'parent' => '080012'
            ],
            '0821600' => [
                'name' => '笠間市',
                'enName' => 'Kasama City',
                'kana' => 'かさまし',
                'parent' => '080011'
            ],
            '0821700' => [
                'name' => '取手市',
                'enName' => 'Toride City',
                'kana' => 'とりでし',
                'parent' => '080022'
            ],
            '0821900' => [
                'name' => '牛久市',
                'enName' => 'Ushiku City',
                'kana' => 'うしくし',
                'parent' => '080022'
            ],
            '0822000' => [
                'name' => 'つくば市',
                'enName' => 'Tsukuba City',
                'kana' => 'つくばし',
                'parent' => '080022'
            ],
            '0822100' => [
                'name' => 'ひたちなか市',
                'enName' => 'Hitachinaka City',
                'kana' => 'ひたちなかし',
                'parent' => '080012'
            ],
            '0822200' => [
                'name' => '鹿嶋市',
                'enName' => 'Kashima City',
                'kana' => 'かしまし',
                'parent' => '080021'
            ],
            '0822300' => [
                'name' => '潮来市',
                'enName' => 'Itako City',
                'kana' => 'いたこし',
                'parent' => '080021'
            ],
            '0822400' => [
                'name' => '守谷市',
                'enName' => 'Moriya City',
                'kana' => 'もりやし',
                'parent' => '080022'
            ],
            '0822500' => [
                'name' => '常陸大宮市',
                'enName' => 'Hitachiomiya City',
                'kana' => 'ひたちおおみやし',
                'parent' => '080012'
            ],
            '0822600' => [
                'name' => '那珂市',
                'enName' => 'Naka City',
                'kana' => 'なかし',
                'parent' => '080012'
            ],
            '0822700' => [
                'name' => '筑西市',
                'enName' => 'Chikusei City',
                'kana' => 'ちくせいし',
                'parent' => '080023'
            ],
            '0822800' => [
                'name' => '坂東市',
                'enName' => 'Bando City',
                'kana' => 'ばんどうし',
                'parent' => '080023'
            ],
            '0822900' => [
                'name' => '稲敷市',
                'enName' => 'Inashiki City',
                'kana' => 'いなしきし',
                'parent' => '080022'
            ],
            '0823000' => [
                'name' => 'かすみがうら市',
                'enName' => 'Kasumigaura City',
                'kana' => 'かすみがうらし',
                'parent' => '080022'
            ],
            '0823100' => [
                'name' => '桜川市',
                'enName' => 'Sakuragawa City',
                'kana' => 'さくらがわし',
                'parent' => '080023'
            ],
            '0823200' => [
                'name' => '神栖市',
                'enName' => 'Kamisu City',
                'kana' => 'かみすし',
                'parent' => '080021'
            ],
            '0823300' => [
                'name' => '行方市',
                'enName' => 'Namegata City',
                'kana' => 'なめがたし',
                'parent' => '080021'
            ],
            '0823400' => [
                'name' => '鉾田市',
                'enName' => 'Hokota City',
                'kana' => 'ほこたし',
                'parent' => '080021'
            ],
            '0823500' => [
                'name' => 'つくばみらい市',
                'enName' => 'Tsukubamirai City',
                'kana' => 'つくばみらいし',
                'parent' => '080022'
            ],
            '0823600' => [
                'name' => '小美玉市',
                'enName' => 'Omitama City',
                'kana' => 'おみたまし',
                'parent' => '080011'
            ],
            '0830200' => [
                'name' => '茨城町',
                'enName' => 'Ibaraki Town',
                'kana' => 'いばらきまち',
                'parent' => '080011'
            ],
            '0830900' => [
                'name' => '大洗町',
                'enName' => 'Oarai Town',
                'kana' => 'おおあらいまち',
                'parent' => '080011'
            ],
            '0831000' => [
                'name' => '城里町',
                'enName' => 'Shirosato Town',
                'kana' => 'しろさとまち',
                'parent' => '080011'
            ],
            '0834100' => [
                'name' => '東海村',
                'enName' => 'Tokai Village',
                'kana' => 'とうかいむら',
                'parent' => '080012'
            ],
            '0836400' => [
                'name' => '大子町',
                'enName' => 'Daigo Town',
                'kana' => 'だいごまち',
                'parent' => '080012'
            ],
            '0844200' => [
                'name' => '美浦村',
                'enName' => 'Miho Village',
                'kana' => 'みほむら',
                'parent' => '080022'
            ],
            '0844300' => [
                'name' => '阿見町',
                'enName' => 'Ami Town',
                'kana' => 'あみまち',
                'parent' => '080022'
            ],
            '0844700' => [
                'name' => '河内町',
                'enName' => 'Kawachi Town',
                'kana' => 'かわちまち',
                'parent' => '080022'
            ],
            '0852100' => [
                'name' => '八千代町',
                'enName' => 'Yachiyo Town',
                'kana' => 'やちよまち',
                'parent' => '080023'
            ],
            '0854200' => [
                'name' => '五霞町',
                'enName' => 'Goka Town',
                'kana' => 'ごかまち',
                'parent' => '080023'
            ],
            '0854600' => [
                'name' => '境町',
                'enName' => 'Sakai Town',
                'kana' => 'さかいまち',
                'parent' => '080023'
            ],
            '0856400' => [
                'name' => '利根町',
                'enName' => 'Tone Town',
                'kana' => 'とねまち',
                'parent' => '080022'
            ],
            '0920100' => [
                'name' => '宇都宮市',
                'enName' => 'Utsunomiya City',
                'kana' => 'うつのみやし',
                'parent' => '090011'
            ],
            '0920200' => [
                'name' => '足利市',
                'enName' => 'Ashikaga City',
                'kana' => 'あしかがし',
                'parent' => '090013'
            ],
            '0920300' => [
                'name' => '栃木市',
                'enName' => 'Tochigi City',
                'kana' => 'とちぎし',
                'parent' => '090013'
            ],
            '0920400' => [
                'name' => '佐野市',
                'enName' => 'Sano City',
                'kana' => 'さのし',
                'parent' => '090013'
            ],
            '0920500' => [
                'name' => '鹿沼市',
                'enName' => 'Kanuma City',
                'kana' => 'かぬまし',
                'parent' => '090013'
            ],
            '0920601' => [
                'name' => '日光市今市',
                'enName' => 'Imaichi, Nikko City',
                'kana' => 'にっこうしいまいち',
                'parent' => '090022'
            ],
            '0920602' => [
                'name' => '日光市日光',
                'enName' => 'Nikko, Nikko City',
                'kana' => 'にっこうしにっこう',
                'parent' => '090022'
            ],
            '0920603' => [
                'name' => '日光市藤原',
                'enName' => 'Fujihara, Nikko City',
                'kana' => 'にっこうしふじわら',
                'parent' => '090022'
            ],
            '0920604' => [
                'name' => '日光市足尾',
                'enName' => 'Ashio, Nikko City',
                'kana' => 'にっこうしあしお',
                'parent' => '090022'
            ],
            '0920605' => [
                'name' => '日光市栗山',
                'enName' => 'Kuriyama, Nikko City',
                'kana' => 'にっこうしくりやま',
                'parent' => '090022'
            ],
            '0920800' => [
                'name' => '小山市',
                'enName' => 'Oyama City',
                'kana' => 'おやまし',
                'parent' => '090013'
            ],
            '0920900' => [
                'name' => '真岡市',
                'enName' => 'Moka City',
                'kana' => 'もおかし',
                'parent' => '090012'
            ],
            '0921000' => [
                'name' => '大田原市',
                'enName' => 'Ohtawara City',
                'kana' => 'おおたわらし',
                'parent' => '090021'
            ],
            '0921100' => [
                'name' => '矢板市',
                'enName' => 'Yaita City',
                'kana' => 'やいたし',
                'parent' => '090021'
            ],
            '0921300' => [
                'name' => '那須塩原市',
                'enName' => 'Nasushiobara City',
                'kana' => 'なすしおばらし',
                'parent' => '090021'
            ],
            '0921400' => [
                'name' => 'さくら市',
                'enName' => 'Sakura City',
                'kana' => 'さくらし',
                'parent' => '090011'
            ],
            '0921500' => [
                'name' => '那須烏山市',
                'enName' => 'Nasukarasuyama City',
                'kana' => 'なすからすやまし',
                'parent' => '090012'
            ],
            '0921600' => [
                'name' => '下野市',
                'enName' => 'Shimotsuke City',
                'kana' => 'しもつけし',
                'parent' => '090013'
            ],
            '0930100' => [
                'name' => '上三川町',
                'enName' => 'Kaminokawa Town',
                'kana' => 'かみのかわまち',
                'parent' => '090011'
            ],
            '0934200' => [
                'name' => '益子町',
                'enName' => 'Mashiko Town',
                'kana' => 'ましこまち',
                'parent' => '090012'
            ],
            '0934300' => [
                'name' => '茂木町',
                'enName' => 'Motegi Town',
                'kana' => 'もてぎまち',
                'parent' => '090012'
            ],
            '0934400' => [
                'name' => '市貝町',
                'enName' => 'Ichikai Town',
                'kana' => 'いちかいまち',
                'parent' => '090012'
            ],
            '0934500' => [
                'name' => '芳賀町',
                'enName' => 'Haga Town',
                'kana' => 'はがまち',
                'parent' => '090012'
            ],
            '0936100' => [
                'name' => '壬生町',
                'enName' => 'Mibu Town',
                'kana' => 'みぶまち',
                'parent' => '090013'
            ],
            '0936400' => [
                'name' => '野木町',
                'enName' => 'Nogi Town',
                'kana' => 'のぎまち',
                'parent' => '090013'
            ],
            '0938400' => [
                'name' => '塩谷町',
                'enName' => 'Shioya Town',
                'kana' => 'しおやまち',
                'parent' => '090021'
            ],
            '0938600' => [
                'name' => '高根沢町',
                'enName' => 'Takanezawa Town',
                'kana' => 'たかねざわまち',
                'parent' => '090011'
            ],
            '0940700' => [
                'name' => '那須町',
                'enName' => 'Nasu Town',
                'kana' => 'なすまち',
                'parent' => '090021'
            ],
            '0941100' => [
                'name' => '那珂川町',
                'enName' => 'Nakagawa Town',
                'kana' => 'なかがわまち',
                'parent' => '090012'
            ]
        ]
    ];
}
