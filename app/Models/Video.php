<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;

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

    /**
     * Retrieve all video URLs from the API.
     *
     * @param string $endpoint
     *
     * @return array $urls
     */
    public static function getAllVideoUrls($endpoint)
    {
        $urls = [];
        $data = parent::get($endpoint);

        foreach (json_decode($data)->data as $video) {
            array_push($urls, $video->attributes->url);
        }

        return $urls;
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

        $cachedContent = Cache::get('trendingVideosByViews');

        if ($cachedContent) {
            return $cachedContent;
        } else {
            $newCache = Cache::remember('trendingVideosByViews', 5, function () use (&$data) {
                // TODO: Cache ONLY the top 10 videos by views (Currently caching everything)
                return json_decode($data)->data;
            });

            return $newCache;
        }
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
        $cachedContent = Cache::get('trendingVideosByVotes');

        if ($cachedContent) {
            return $cachedContent;
        } else {
            $newCache = Cache::remember('trendingVideosByVotes', 5, function () use (&$data) {
                // TODO: Cache ONLY the top 10 videos by votes (Currently caching everything)
                return json_decode($data)->data;
            });

            return $newCache;
        }
    }

    /**
     * Submit a vote to the API for a video.
     *
     * @param string $endpoint
     * @param int $videoId
     * @param int $opinion
     *
     * @return object $data
     */
    public static function voteOnVideo($endpoint, $videoId, $opinion)
    {
        $body = [
            'opinion' => $opinion,
            'video_id' => $videoId,
        ];

        parent::post($endpoint, $body);
    }
}
