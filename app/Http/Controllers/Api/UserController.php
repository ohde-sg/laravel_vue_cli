<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // 認証に成功した
            return [
                'success' => true,
                'message' => 'ログインに成功しました'
            ];
        }else{
            return [
                'success' => false,
                'message' => 'emailもしくはパスワードが間違っています。'
            ];
        }
    }
}
