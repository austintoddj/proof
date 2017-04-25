<?php

namespace App\Models;

class Base
{
    /**
     * Call a GET request on the API.
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
     * @return void
     */
    public function post()
    {
    }
}
