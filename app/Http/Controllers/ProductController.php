<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGrouping;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('dashboard.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $groupings = ProductGrouping::all();
        $categories = ProductCategory::all();

        return view('dashboard.products.create', compact('groupings', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->get('name'),
            'store_id' => auth()->user()->stores->first()->id,
            'price' => $request->get('price'),
            'currency' => 'KES',
            'description' => $request->get('name'),
            'product_grouping_id' => (!is_null($request->get('grouping'))) ? $request->get('grouping') : null,
            'product_category_id' => (!is_null($request->get('category'))) ? $request->get('grouping') : null,
        ]);

        if ($request->hasFile('main_image')) {
            $product->addMediaFromRequest('main_image')
                ->usingName($request->get('name') . ' main image')
                ->usingFileName($product->slug . '-main-image.' . $request->file('main_image')->getClientOriginalExtension())
                ->toMediaCollection('main-images');
        }

        if ($request->hasFile('banner_image')) {
            $product->addMediaFromRequest('banner_image')
                ->usingName($request->get('name') . ' banner')
                ->usingFileName($product->slug . '-banner-image.' . $request->file('banner_image')->getClientOriginalExtension())
                ->toMediaCollection('banner-images');
        }

        return redirect()->route('products.index')->withMessage('successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $groupings = ProductGrouping::all();

        return view('dashboard.products.edit', compact('product','categories','groupings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'currency' => 'KES',
            'description' => $request->get('name'),
            'product_grouping_id' => (!is_null($request->get('grouping'))) ? $request->get('grouping') : null,
            'product_category_id' => (!is_null($request->get('category'))) ? $request->get('grouping') : null,
        ]);

        if ($request->hasFile('main_image')) {
            ($product->getFirstMedia('main-images') !== null) ? $product->getFirstMedia('main-images')->delete() : null;

            $product->addMediaFromRequest('main_image')
                ->usingName($request->get('name') . ' main image')
                ->usingFileName($product->slug . '-main-image.' . $request->file('main_image')->getClientOriginalExtension())
                ->toMediaCollection('main-images');
        }

        if ($request->hasFile('banner_image')) {
            ($product->getFirstMedia('banner-images') !== null) ? $product->getFirstMedia('banner-images')->delete() : null;

            $product->addMediaFromRequest('banner_image')
                ->usingName($request->get('name') . ' banner')
                ->usingFileName($product->slug . '-banner-image.' . $request->file('banner_image')->getClientOriginalExtension())
                ->toMediaCollection('banner-images');
        }

        return redirect()->route('products.index')->withMessage('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
