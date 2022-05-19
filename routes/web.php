<?php

use App\Http\Controllers as Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Forecast
Route::get('/api/forecast', [Controllers\ForecastController::class, 'index_query']);
Route::get('/api/forecast/city/{city_id}', [Controllers\ForecastController::class, 'index']);
