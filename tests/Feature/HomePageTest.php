<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

final class HomePageTest extends TestCase
{
    #[Test]
    public function home_page_renders_without_database_or_session(): void
    {
        // 読み取り専用の案内ページが DB やセッション設定なしで描画できることを確認
        $this->get('/')
            ->assertOk()
            ->assertSee('天気予報 API（livedoor 天気互換）');
    }
}
