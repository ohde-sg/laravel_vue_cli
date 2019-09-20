<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            // 認証に成功した
            $token = \Str::random(60);
            $request->user()->forceFill([
                'api_token' => hash('sha256', $token),
            ])->save();
            return [
                'success' => true,
                'message' => 'Login Success',
                'token' => $token
            ];
        }else{
            return [
                'success' => true,
                'message' => 'Email or Password are incorrect',
            ];
        }
    }

    function logout(Request $request){
        $user = \Auth::guard('api')->user();
        $user->forceFill([
            'api_token' => '',
        ])->save();
        return [
            'success' => true,
            'message' => 'Logout Success'
        ];
    }
}
