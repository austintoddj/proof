<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Video;
use App\Helpers\Slugify;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\SubmitLinkRequest;

class SubmitController extends Controller
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
        $data = [
            'votesLeft' => Vote::votesLeft(),
        ];

        return view('pages.submit', compact('data'));
    }

    /**
     * Submit a valid URL to the API.
     *
     * @param SubmitLinkRequest $request
     *
     * @return mixed
     */
    public function store(SubmitLinkRequest $request)
    {
        $title = $request->get('title');
        $slug = Slugify::generateSlug($request->get('title'));
        $url = $request->get('link');

        Video::submitVideoLink('/videos', $title, $slug, $url);
        Artisan::call('cache:clear');

        return redirect('videos');
    }
}
