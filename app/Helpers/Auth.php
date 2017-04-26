<?php

namespace App\Helpers;

class Auth
{
    /**
     * Generate a new auth_token.
     *
     * @return bool
     */
    public static function generateToken()
    {
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
            'Content-Type: '.env('API_CONTENT_TYPE'),
        ]);

        $response = curl_exec($ch);

        Session(['auth_token' => json_decode($response)->data->attributes->auth_token]);

        curl_close($ch);
    }
}
