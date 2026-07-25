<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class ForecastController
{
    /**
     * パスパラメータから取得した地点 ID に基づく天気予報を取得する
     *
     * @param  string  $cityID  地点定義表で定義されている地点 ID
     */
    public function index(string $cityID): JsonResponse
    {
        // パスで指定された地点の天気予報を取得
        $weather = Weather::getWeather($cityID);

        // 取得した天気予報を JSON で返す
        return response()->json(
            $weather,
            Response::HTTP_OK,
            [],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT,
        );
    }

    /**
     * クエリパラメータから取得した地点 ID に基づく天気予報を取得する
     */
    public function indexQuery(Request $request): JsonResponse
    {
        // city が未指定の場合は旧 API と同じくリソースなしとして扱う
        if ($request->filled('city') === false) {
            abort(Response::HTTP_NOT_FOUND);
        }

        // クエリで指定された地点の天気予報を取得
        $weather = Weather::getWeather((string) $request->input('city'));

        // 取得した天気予報を JSON で返す
        return response()->json(
            $weather,
            Response::HTTP_OK,
            [],
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT,
        );
    }
}
