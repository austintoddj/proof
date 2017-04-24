<?php

namespace App\Models;

class Base
{
    /**
     * Call a GET request on the API.
     *
     * @param string $urlSegment
     *
     * @return object $response
     */
    public static function get($urlSegment)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, env('API_BASE_URL').$urlSegment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
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
