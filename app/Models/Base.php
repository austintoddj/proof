<?php

namespace App\Models;

use Illuminate\Support\Facades\Input;

class Base
{
    /**
     * Make a GET request to the API.
     *
     * @param string $endpoint
     *
     * @return object $response
     */
    public static function get($endpoint)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('API_BASE_URL').$endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: '.env('API_CONTENT_TYPE'),
            'X-Auth-Token: '.Session('auth_token'),
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }

    /**
     * Make a POST request to the API.
     *
     * @param string $endpoint
     * @param string $body
     *
     * @return object $response
     */
    public static function post($endpoint, $body)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('API_BASE_URL').$endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: '.env('API_CONTENT_TYPE'),
            'X-Auth-Token: '.Session('auth_token'),
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        return $response;
    }
}
