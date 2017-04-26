<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

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

        return view('pages.videos', ['data' => json_decode($data)]);
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
        dd($request->all());
        $videoId = $request->get('videoId');

        return Video::voteOnVideo('/videos/'.$videoId.'/votes');
    }
}
