<?php

namespace App\Http\Controllers\Website;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('website.pages.products.index', compact('products'));
    }

    /**
     * Display a listing of the resource by Category.
     *
     * @param \App\Models\ProductCategory $category
     * @return \Illuminate\Http\Response
     */
    public function byCategory(ProductCategory $category)
    {
        $products = $category->products;

        return view('website.pages.categories.show', compact('products','category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
