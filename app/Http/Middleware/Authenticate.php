<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{

    public function handle($request, \Closure $next, ...$guards)
    {
        if (!\Auth::check()) {
            return response([
                'success' => false,
                'message' => '認証が通ってないよ！！'
            ]);
        }

        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
