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

Route::group(['namespace' => '\\Terawatt\\Greenhouse\\Http\\Controllers', 'prefix' => 'api'], function () {
    Route::group(['prefix' => 'v1'], function () {
        Route::post('greenhouse', ['uses' => 'ApiController@index', 'as' => 'greenhouse']);
        Route::get('/user', function (Request $request) {
            return $request->user();
        })->name('api_user');
    });
});