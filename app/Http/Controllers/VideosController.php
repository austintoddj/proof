<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class VideosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verifyToken');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::getAllVideos('/videos');

        $videos = json_decode($data)->data;

        usort($videos, function ($a, $b) {
            return $a->attributes->created_at - $b->attributes->created_at;
        });

        return view('pages.videos', ['data' => array_reverse($videos)]);
    }

    /**
     * Vote on a video resource.
     *
     * @param Request $request
     *
     * @return object $data
     */
    public function store(Request $request)
    {
        $videoId = $request->get('_videoId');
        $opinion = $request->get('_opinion');
        $userId = $request->get('_userId');
        $userIp = $request->get('_userIp');

        Video::voteOnVideo('/votes', $videoId, $opinion);
        Artisan::call('cache:clear');
        Vote::userVoted($userId, $userIp);

        return back();
    }
}
