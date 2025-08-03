<?php

namespace Modules\Wpboxlanding\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class Main extends Controller
{

    public function blog()
    {
        return view('wpboxlanding::landing.blog');
    }


    public function blog_post($slug)
    {
        //Load all the data via API
        $url = config('app.url') . '/api/blog/' . $slug;
        $data = Http::get($url);

       

        return view('wpboxlanding::landing.blog_post', compact('data'));
    }
}
