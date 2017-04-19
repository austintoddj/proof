<?php

namespace App\Models;

class Video extends Base
{
    /**
     * Retrieve all video resources the API.
     *
     * @param string $urlSegment
     *
     */
    public static function getAllVideos($urlSegment)
    {
        parent::get($urlSegment);
    }
}
