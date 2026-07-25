<?php

use Illuminate\Support\Facades\Route;

// API の案内と互換仕様を掲載するトップページ
Route::get('/', function () {
    return view('index');
});
