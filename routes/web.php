<?php

/*
|--------------------------------------------------------------------------
| Web Route
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome');
});

Auth::routes();

// Re-route registration requests to the home page
Route::any('/register', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/videos', 'VideosController@index')->name('videos');
Route::get('/submit', 'SubmitController@index')->name('submit');
Route::post('/submit', 'SubmitController@post');
