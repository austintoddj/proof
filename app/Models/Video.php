<?php

namespace App\Models;

class Video extends Base
{
    /**
     * Retrieve all video resources the API.
     *
     * @param string $urlSegment
     *
     * @return object $data
     */
    public static function getAllVideos($urlSegment)
    {
        $data = parent::get($urlSegment);

        return $data;
    }
}
