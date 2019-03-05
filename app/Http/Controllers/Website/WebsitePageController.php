<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsitePageController extends Controller
{
    public function home()
    {
        return view('website.pages.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('website.pages.about');
    }

    public function contact(Request $request)
    {
        return view('website.pages.contact');
    }
}
