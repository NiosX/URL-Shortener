<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\UrlShortener;

class UrlShortenerController extends Controller
{
    public function index(Request $request)
    {
        $urls = app('shortener')->getTopUrls();
        $short_url = $request->session()->get('short_url');

        return view('index', compact('urls', 'short_url'));
    }

    public function store(Request $request)
    {
    	$validator = Validator::make($request->all(),[
    		'long_url' => 'required|url|unique:url_shorteners']
    	);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator);
        }
        else
        {
            $shortener = new UrlShortener;
            $shortener->long_url = $request->long_url;
            $shortener->last_requested = date('Y-m-d H:i:s');

            if ($shortener->save()) {
                $url = url('/').'/s/'.UrlShortener::generateId64($shortener->getKey());
                $shortener->short_url = $url;
                $shortener->save();
                return redirect()->action('UrlShortenerController@index')->with('short_url', $shortener->short_url);
            }
            else
            {
                return redirect()->back()->withErrors(['msg', 'Could not create short url']);
            }            
        }
    }

    public function show($id)
    {
        $shortener = UrlShortener::findOrFail(UrlShortener::generateId64($id, 1));
        $shortener->times_requested +=1;
        $shortener->save();
        return redirect()->away($shortener->long_url);
    }

}
