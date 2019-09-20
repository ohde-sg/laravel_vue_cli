<?php

use Illuminate\Http\Request;

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

Route::namespace('Api')->group(function () {

    // 未認証
    Route::prefix('user')->group(function(){
        Route::post('login', 'UserController@login');
    });

    // 認証必須
    Route::middleware('auth:api')->group(function () {
        Route::prefix('user')->group(function(){
            Route::get('logout',function(){
                \Auth::logout();
                return [
                    'success' => true,
                    'message' => 'ログアウトしました'
                ];
            });
        });
    });

});

