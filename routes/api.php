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

Route::namespace('Api')->group(function(){

    Route::prefix('user')->group(function(){
        Route::get('login','UserController@login');
    });

    Route::middleware('auth:api')->group(function(){
        Route::prefix('user')->group(function(){
            Route::get('logout','UserController@logout');
        });

        Route::get('check',function(){
            return [
                'success' => true,
                'message' => 'Your already authorised'
            ];
        });
    });
});

