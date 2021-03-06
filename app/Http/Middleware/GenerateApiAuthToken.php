<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Auth;

class GenerateApiAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! empty(Session('auth_token')) || env('APP_ENV') === 'testing') {
            return $next($request);
        } else {
            Auth::generateToken();

            return $next($request);
        }
    }
}
