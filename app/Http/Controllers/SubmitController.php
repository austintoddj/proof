<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.submit');
    }

    /**
     * Submit a valid URL to the API.
     *
     * @param SubmitLinkRequest $request
     */
    public function post(SubmitLinkRequest $request)
    {
        dd($request);
    }
}
