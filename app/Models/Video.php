<?php

namespace App\Models;

class Video extends Base
{
    /**
     * Retrieve all video resources from the API.
     *
     * @param string $endpoint
     *
     * @return object $data
     */
    public static function getAllVideos($endpoint)
    {
        $data = parent::get($endpoint);

        return $data;
    }

    public static function getAllVideoUrls($endpoint)
    {
        $data = parent::get($endpoint);

        return $data;
    }

    /**
     * Retrieve top 10 video resources from the API based on number of views.
     *
     * @param string $endpoint
     *
     * @return object $data
     */
    public static function getTrendingVideosByViews($endpoint)
    {
        $data = parent::get($endpoint);

        return $data;
    }

    /**
     * Retrieve top 10 video resources from the API based on number of votes.
     *
     * @param string $endpoint
     *
     * @return object $data
     */
    public static function getTrendingVideosByVotes($endpoint)
    {
        $data = parent::get($endpoint);

        return $data;
    }
}
