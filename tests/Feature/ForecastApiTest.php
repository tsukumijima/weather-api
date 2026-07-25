<?php

namespace Tests\Feature;

use DateTimeImmutable;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class ForecastApiTest extends TestCase
{
    #[Test]
    public function path_parameter_returns_the_matching_area_when_jma_areas_are_reversed(): void
    {
        // 根室より先に釧路が並ぶレスポンスで地点 ID による選択を検証
        $this->fakeJMAResponses();

        $response = $this->getJson('/api/forecast/city/014010');

        $response
            ->assertOk()
            ->assertJsonPath('location.district', '根室地方')
            ->assertJsonPath('location.city', '根室')
            ->assertJsonPath('forecasts.0.detail.weather', '根室の天気');
    }

    #[Test]
    public function query_parameter_keeps_the_livedoor_weather_compatible_route(): void
    {
        // 旧 API と同じクエリ形式でも釧路のデータだけを返すことを確認
        $this->fakeJMAResponses();

        $response = $this->getJson('/api/forecast?city=014020');

        $response
            ->assertOk()
            ->assertJsonPath('location.district', '釧路地方')
            ->assertJsonPath('location.city', '釧路')
            ->assertJsonPath('forecasts.0.detail.weather', '釧路の天気');
    }

    #[Test]
    public function missing_or_unknown_city_keeps_the_existing_error_contract(): void
    {
        // city 未指定は404、地点定義にない ID は JSON の error として返す
        $this->getJson('/api/forecast')->assertNotFound();
        $this->getJson('/api/forecast/city/999999')
            ->assertOk()
            ->assertExactJson(['error' => 'The specified city ID is invalid.']);
    }

    #[Test]
    public function api_response_allows_cross_origin_clients(): void
    {
        // ブラウザー上の既存利用者が別オリジンから取得できる CORS 契約を確認
        $this->fakeJMAResponses();

        $this->withHeader('Origin', 'https://example.com')
            ->getJson('/api/forecast/city/014010')
            ->assertHeader('Access-Control-Allow-Origin', '*');
    }

    #[Test]
    public function api_response_has_no_rate_limit(): void
    {
        // 旧 API と同じく利用回数を制限するヘッダーを付与しないことを確認
        $this->fakeJMAResponses();

        $this->getJson('/api/forecast/city/014010')
            ->assertOk()
            ->assertHeaderMissing('X-RateLimit-Limit')
            ->assertHeaderMissing('X-RateLimit-Remaining');
    }

    private function fakeJMAResponses(): void
    {
        $today = new DateTimeImmutable('today');
        $days = [
            $today,
            $today->modify('+1 day'),
            $today->modify('+2 days'),
        ];

        // 日単位、6時間単位、最低最高気温の時刻配列を現在日から生成
        $dayTimeDefines = array_map(
            fn (DateTimeImmutable $day): string => $day->format(DATE_ATOM),
            $days,
        );
        $popTimeDefines = [];
        $temperatureTimeDefines = [];
        foreach ($days as $day) {
            foreach ([0, 6, 12, 18] as $hour) {
                $popTimeDefines[] = $day->setTime($hour, 0)->format(DATE_ATOM);
            }
            foreach ([0, 9] as $hour) {
                $temperatureTimeDefines[] = $day->setTime($hour, 0)->format(DATE_ATOM);
            }
        }

        // 気象庁で実際に問題になった釧路、根室、十勝の並びを模した短期予報
        $shortAreas = [
            $this->shortArea('014020', '釧路地方', '100', '釧路の天気'),
            $this->shortArea('014010', '根室地方', '101', '根室の天気'),
            $this->shortArea('014030', '十勝地方', '102', '十勝の天気'),
        ];
        $temperatureAreas = [
            $this->temperatureArea('19432', '釧路', '10'),
            $this->temperatureArea('18273', '根室', '11'),
            $this->temperatureArea('20432', '帯広', '12'),
        ];
        $weeklyAreas = [
            $this->weeklyArea('19432', '釧路', '100'),
            $this->weeklyArea('18273', '根室', '101'),
            $this->weeklyArea('20432', '帯広', '102'),
        ];

        $forecast = [
            [
                'reportDatetime' => $today->setTime(5, 0)->format(DATE_ATOM),
                'publishingOffice' => '釧路地方気象台',
                'timeSeries' => [
                    [
                        'timeDefines' => $dayTimeDefines,
                        'areas' => $shortAreas,
                    ],
                    [
                        'timeDefines' => $popTimeDefines,
                        'areas' => array_map(
                            fn (array $area): array => [
                                'area' => $area['area'],
                                'pops' => array_fill(0, 12, '20'),
                            ],
                            $shortAreas,
                        ),
                    ],
                    [
                        'timeDefines' => $temperatureTimeDefines,
                        'areas' => $temperatureAreas,
                    ],
                ],
            ],
            [
                'timeSeries' => [
                    [
                        'timeDefines' => $dayTimeDefines,
                        'areas' => $weeklyAreas,
                    ],
                    [
                        'timeDefines' => $dayTimeDefines,
                        'areas' => array_map(
                            fn (array $area): array => [
                                'area' => $area['area'],
                                'tempsMin' => ['5', '6', '7'],
                                'tempsMax' => ['15', '16', '17'],
                            ],
                            $weeklyAreas,
                        ),
                    ],
                ],
            ],
        ];
        $overview = [
            'reportDatetime' => $today->setTime(5, 0)->format(DATE_ATOM),
            'headlineText' => 'テスト見出し',
            'text' => 'テスト本文',
        ];

        // 外部通信を封じ、対象2エンドポイント以外の要求も即座に検出
        Http::fake([
            'https://www.jma.go.jp/bosai/forecast/data/forecast/014100.json' => Http::response($forecast),
            'https://www.jma.go.jp/bosai/forecast/data/overview_forecast/014100.json' => Http::response($overview),
        ]);
        Http::preventStrayRequests();
    }

    /**
     * 短期予報の地点データを生成する
     *
     * @return array<string, mixed>
     */
    private function shortArea(string $code, string $name, string $weatherCode, string $weather): array
    {
        return [
            'area' => [
                'code' => $code,
                'name' => $name,
            ],
            'weatherCodes' => array_fill(0, 3, $weatherCode),
            'weathers' => array_fill(0, 3, $weather),
            'winds' => array_fill(0, 3, "{$name}の風"),
            'waves' => array_fill(0, 3, '1メートル'),
        ];
    }

    /**
     * 気温観測地点のデータを生成する
     *
     * @return array<string, mixed>
     */
    private function temperatureArea(string $code, string $name, string $temperature): array
    {
        return [
            'area' => [
                'code' => $code,
                'name' => $name,
            ],
            'temps' => array_fill(0, 6, $temperature),
        ];
    }

    /**
     * 週間予報の地点データを生成する
     *
     * @return array<string, mixed>
     */
    private function weeklyArea(string $code, string $name, string $weatherCode): array
    {
        return [
            'area' => [
                'code' => $code,
                'name' => $name,
            ],
            'weatherCodes' => array_fill(0, 3, $weatherCode),
            'pops' => array_fill(0, 3, '20'),
        ];
    }
}
