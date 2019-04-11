<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UrlShortenerController@index');

Route::get('/s/{id}','UrlShortenerController@show');

Route::get('/top-100', function () {
	$data = app('shortener')->getTopUrls();
	$urls = collect();
	foreach ($data as $value) {
		$urls->push($value->long_url);
	}
    return response()->json( $urls );
});

Route::post('/short-url', 'UrlShortenerController@store');
