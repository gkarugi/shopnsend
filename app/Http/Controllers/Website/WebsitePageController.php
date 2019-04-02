<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsitePageController extends Controller
{
    public function home()
    {
        $stores = Store::where('featured', true)->get();
        $categories = ProductCategory::where('featured', true)->get();
        $products = Product::where('featured', true)->get();

        return view('website.pages.home', compact('stores','categories','products'));
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
