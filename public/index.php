<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// メンテナンス中は Laravel が生成した応答を返す
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Composer のオートローダーを登録
require __DIR__.'/../vendor/autoload.php';

// Laravel を起動して受信した HTTP リクエストを処理
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->handleRequest(Request::capture());
