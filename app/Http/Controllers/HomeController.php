<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //        $client = new Client([
//            'base_uri' => 'https://proofapi.herokuapp.com'
//        ]);
//
////        $body = "email": "austin.todd.j@gmail.com",
////  "password": "shrew,spillet,series";
//
//        $response = $client->request('GET', 'videos', ['body' => ['email' => env('API_USERNAME'), 'password' => env('API_PASSWORD')]]);
//
//        dd($response);

//        $ch = curl_init();
//
//        curl_setopt($ch, CURLOPT_URL, "https://proofapi.herokuapp.com/sessions");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//        curl_setopt($ch, CURLOPT_HEADER, FALSE);
//
//        curl_setopt($ch, CURLOPT_POST, TRUE);
//
//        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
//  \"email\": \"austin.todd.j@gmail.com\",
//  \"password\": \"shrew,spillet,series\"
//}");
//
//        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//            "Content-Type: application/json"
//        ));
//
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        dd(json_decode($response));
//        $client = new Client();
//        dd($client);
//        $response = $client->request('POST', 'https://proofapi.herokuapp.com/sessions', [
//            'headers' => [
//                'content-type' => 'application/json',
//                'content-length' => 82
//            ],
//            'form_params' => [
//                'email' => 'austin.todd.j@gmail.com',
//                'password' => 'shrew,spillet,series'
//            ]
//        ]);
//        dd($response);
        return view('pages.dashboard');
    }
}
