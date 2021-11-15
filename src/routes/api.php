<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => '\\Terawatt\\Greenhouse\\Http\\Controllers', 'prefix' => 'api', 'as' => 'api.'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::post('greenhouse', ['uses' => 'ApiController@index', 'as' => 'greenhouse']);

        //UI
        Route::group(['prefix' => 'rcp', 'as' => 'rcp.'], function () {
            Route::get('get_version', ['uses' => 'admin\RcpController@get_version', 'as' => 'get_version']);
        });
    });
});

Route::fallback(function(){
    return response()->json(['status' => 'ERROR', 'data' => 'Page Not Found.'], 404);
});