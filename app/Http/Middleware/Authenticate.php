<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, \Closure $next, ...$guards){
        if(in_array('api', $guards)){
            if(env('APP_DUMMY',false)){
                if($request->input('api_token') != env('APP_DUMMY_TOKEN','thisisdummyapitoken')){
                    return response()->json([
                        'success' => false,
                        'message' => 'Unauthorized'
                    ],403);
                }
            }elseif (!\Auth::guard('api')->check()){
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ],403);
            }
        }
        return $next($request);
    }
}
