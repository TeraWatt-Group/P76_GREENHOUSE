<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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
        //Auth
        Route::post('token', function (Request $request) {
            $validator = Validator::make($request->json()->all(), [
                'email' => 'required|email',
                'password' => 'required',
                'device_name' => 'required',
            ]);

            if ($validator->fails()) {
                $outputArray = [];
                foreach ($validator->errors()->getMessages() as $item) {
                    array_push($outputArray, $item);
                }

                return response()->json(['status' => 'ERROR', 'data_recieved' => $outputArray], 422);
            } else {
                $in = $request->json()->all();
                $user = User::where('email', $in['email'])->first();

                if (!$user || !Hash::check($in['password'], $user->password)) {
                    return response()->json(['status' => 'ERROR', 'data_recieved' => 'The provided credentials are incorrect.'], 422);
                }

                return response()->json(['status' => 'OK', 'data_recieved' => $user->createToken($in['device_name'])->plainTextToken]);
            }
        });

        //UI
        Route::group(['prefix' => 'rcp', 'as' => 'rcp.'], function () {
            Route::get('get_version', ['uses' => 'admin\RcpController@get_version', 'as' => 'get_version']);
        });

        //Datasets
        Route::post('greenhouse', ['uses' => 'ApiController@index', 'as' => 'greenhouse']);
    });
});

Route::fallback(function(){
    return response()->json(['status' => 'ERROR', 'data_recieved' => 'Page Not Found.'], 404);
});