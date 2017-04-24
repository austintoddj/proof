<?php

namespace App\Http\Controllers;

use App\Models\Video;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Video::getAllVideos('/videos');

        return view('pages.videos', ['data' => $data]);
    }
}
