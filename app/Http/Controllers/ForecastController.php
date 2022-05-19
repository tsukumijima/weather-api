<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Weather;

class ForecastController extends Controller
{
    /**
     * パスパラメータから取得した city_id に基づく天気予報を取得する
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city_id)
    {
        // 天気予報を取得
        $weather = Weather::getWeather($city_id);

        // 取得した天気予報を JSON で返す
        return response()->json($weather, Response::HTTP_OK, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    /**
     * クエリパラメータから取得した city_id に基づく天気予報を取得する
     *
     * @return \Illuminate\Http\Response
     */
    public function index_query(Request $request)
    {
        if (!empty($request->input('city'))) {

            // 天気予報を取得
            $weather = Weather::getWeather($request->input('city'));

            // 取得した天気予報を JSON で返す
            return response()->json($weather, Response::HTTP_OK, [], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);

        } else {

            // 404 を返す
            return \App::abort(404);
        }
    }
}
