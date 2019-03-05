<?php

namespace App\Http\Controllers\Website;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();

        return view('website.pages.stores.index',compact('stores'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('website.pages.stores.show',compact('store'));
    }
}
