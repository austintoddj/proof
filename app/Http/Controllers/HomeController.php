<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Support\Facades\Cache;

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
    }

    /**
     * Show the application home page.
     *
     * @return object $data
     */
    public function index()
    {
        $trendingVideosByViews = Video::getTrendingVideosByViews('/videos');
        $trendingVideosByVotes = Video::getTrendingVideosByVotes('/videos');

        return view('pages.home', [
            'trendingVideosByViews' => $trendingVideosByViews,
            'trendingVideosByVotes' => $trendingVideosByVotes,
            ]);
    }
}
