<?php

namespace Tests\Unit;

use App\Models\WeatherDefinition;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class WeatherDefinitionTest extends TestCase
{
    #[Test]
    public function weather_code_125_keeps_the_intended_softened_wording(): void
    {
        // 「のち」への表記調整が語中の「午後」まで変換しないことを固定
        self::assertSame('晴れ午後は雷雨', WeatherDefinition::Telops['125'][3]);

        // 同種の機械的な置換がほかの天気コードへ残っていないことも全件確認
        $telops = array_column(WeatherDefinition::Telops, 3);
        self::assertSame([], array_values(array_filter(
            $telops,
            fn (string $telop): bool => str_contains($telop, '午のち'),
        )));
    }

    #[Test]
    public function every_city_has_one_forecast_area_definition(): void
    {
        // 全地点を走査して配列順に依存する定義漏れや重複を検出
        foreach (WeatherDefinition::Areas['class10s'] as $cityID => $city) {
            $cityID = (string) $cityID;
            $prefectureID = (string) $city['parent'];
            $matches = array_values(array_filter(
                WeatherDefinition::ForecastArea[$prefectureID] ?? [],
                fn (array $forecastArea): bool => $forecastArea['class10'] === $cityID,
            ));

            self::assertCount(1, $matches, "ForecastArea definition for {$cityID}");
            self::assertNotEmpty($matches[0]['amedas'], "Amedas definition for {$cityID}");
        }
    }

    #[Test]
    public function nemuro_and_kushiro_keep_their_explicit_amedas_mapping(): void
    {
        // 気象庁 API の配列順が反転していた地点を ID で選ぶ契約として固定
        $areas = WeatherDefinition::ForecastArea['014100'];
        self::assertSame('19432', $areas[0]['amedas'][0]);
        self::assertSame('014020', $areas[0]['class10']);
        self::assertSame('18273', $areas[1]['amedas'][0]);
        self::assertSame('014010', $areas[1]['class10']);
    }
}
