<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city_id)
    {
        // 天気予報を取得
        $weather = Weather::getWeather($city_id);

        return json_encode($weather, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_query(Request $request)
    {
        if (!empty($request->input('city'))) {

            // 天気予報を取得
            $weather = Weather::getWeather($request->input('city'));
            
            return json_encode($weather, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

        } else {

            // 404 を返す
            return \App::abort(404);
        }
    }
}
