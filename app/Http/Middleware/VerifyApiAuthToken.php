<?php

namespace App\Http\Middleware;

use Closure;

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
        if (! empty(Session('auth_token'))) {
            return $next($request);
        } else {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, env('API_BASE_URL').'/sessions');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
                'email' => env('API_USERNAME'),
                'password' => env('API_PASSWORD'),
            ]));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
            ]);

            $response = curl_exec($ch);

            Session(['auth_token' => json_decode($response)->data->attributes->auth_token]);

            curl_close($ch);

            return $next($request);
        }
    }
}
