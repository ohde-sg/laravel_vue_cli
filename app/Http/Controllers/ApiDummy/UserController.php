<?php

namespace App\Http\Controllers\ApiDummy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (!empty($request->input('email')) && !empty($request->input('password'))) {
            return [
                'success' => true,
                'message' => 'Login Success',
                'token' => env('APP_DUMMY_TOKEN','thisisdummyapitoken')
            ];
        }else{
            return [
                'success' => true,
                'message' => 'Email or Password are incorrect',
            ];
        }
    }

    function logout(Request $request){
        return [
            'success' => true,
            'message' => 'Logout Success'
        ];
    }
}
