<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Video;

class HomeController extends Controller
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
     * Show the application home page.
     *
     * @return object $data
     */
    public function index()
    {
        $data = [
            'votesLeft' => Vote::votesLeft(),
            'trendingVideosByViews' => Video::getTrendingVideosByViews('/videos'),
            'trendingVideosByVotes' => Video::getTrendingVideosByVotes('/videos'),
        ];

        return view('pages.home', compact('data'));
    }
}
