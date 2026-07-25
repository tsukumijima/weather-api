<?php

use App\Http\Controllers\ForecastController;
use Illuminate\Support\Facades\Route;

// 旧 livedoor 天気 API と互換の2形式を提供
Route::get('/forecast', [ForecastController::class, 'indexQuery']);
Route::get('/forecast/city/{cityID}', [ForecastController::class, 'index']);
