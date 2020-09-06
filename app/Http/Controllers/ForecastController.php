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
        // 天気予報を返す
        return Weather::getWeatherForecast($city_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_query(Request $request)
    {
        if (!empty($request->input('city'))) {

            // 天気予報を返す
            return Weather::getWeatherForecast($request->input('city'));

        } else {

            // 404 を返す
            return \App::abort(404);
        }
    }
}
