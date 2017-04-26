<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

        Video::voteOnVideo('/votes', $videoId, $opinion);
        Artisan::call('cache:clear');

        return back();
    }
}
