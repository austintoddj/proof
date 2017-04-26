<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Base;
use App\Helpers\Auth;

class VerifyApiAuthToken
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
        if (Base::post('/sessions', []) === '{"errors":[{"status":"401","title":"Unauthorized request","detail":"The authentication token provided was invalid or not found"}]}') {
            Auth::generateToken();

            return $next($request);
        } else {
            return $next($request);
        }
    }
}
