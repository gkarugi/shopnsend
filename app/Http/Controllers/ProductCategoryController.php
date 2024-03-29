<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductCategoryRequest;
use App\Http\Requests\EditProductCategoryRequest;
use App\Laratables\ProductCategoryLaratables;
use App\Models\ProductCategory;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * Instantiate a new PostController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:create-category', ['only' => ['create','store']]);
        $this->middleware('can:update-category', ['only' => ['edit','update','feature']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | array
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(ProductCategory::class, ProductCategoryLaratables::class);
        }

        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();

        return view('dashboard.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductCategoryRequest $request)
    {
        if ($request->get('parent_category') == 0) {
            $category = ProductCategory::create([
                'name' => $request->get('name'),
                'description' => $request->get('name'),
            ]);
        } else {
            $parent = ProductCategory::find($request->get('parent_category'));

            $category = ProductCategory::create([
                'name' => $request->get('name'),
                'description' => $request->get('name'),
            ],$parent);
        }

        if ($request->hasFile('main_image')) {
            $category->addMediaFromRequest('main_image')
                ->usingName($request->get('name') . ' main image')
                ->usingFileName($category->slug . '-main-image.' . $request->file('main_image')->getClientOriginalExtension())
                ->toMediaCollection('main-images');
        }

        if ($request->hasFile('banner_image')) {
            $category->addMediaFromRequest('banner_image')
                ->usingName($request->get('name') . ' banner')
                ->usingFileName($category->slug . '-banner-image.' . $request->file('banner_image')->getClientOriginalExtension())
                ->toMediaCollection('banner-images');
        }

        return redirect()->route('categories.index')->withMessage('successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $category)
    {
        $categories = ProductCategory::all();

        return view('dashboard.categories.edit', compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EditProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductCategoryRequest $request, ProductCategory $category)
    {
        if ($request->get('parent_category') == 0) {
            $category->update([
                'name' => $request->get('name'),
                'description' => $request->get('name'),
            ]);
        } else {
            $parent = ProductCategory::find($request->get('parent_category'));

            $category->update([
                'name' => $request->get('name'),
                'description' => $request->get('name'),
            ], $parent);
        }

        if ($request->hasFile('main_image')) {
            ($category->getFirstMedia('main-images') !== null) ? $category->getFirstMedia('main-images')->delete() : null;

            $category->addMediaFromRequest('main_image')
                ->usingName($request->get('name') . ' main image')
                ->usingFileName($category->slug . '-main-image.' . $request->file('main_image')->getClientOriginalExtension())
                ->toMediaCollection('main-images');
        }

        if ($request->hasFile('banner_image')) {
            ($category->getFirstMedia('banner-images') !== null) ? $category->getFirstMedia('banner-images')->delete() : null;

            $category->addMediaFromRequest('banner_image')
                ->usingName($request->get('name') . ' banner')
                ->usingFileName($category->slug . '-banner-image.' . $request->file('banner_image')->getClientOriginalExtension())
                ->toMediaCollection('banner-images');
        }

        return redirect()->route('categories.index')->withMessage('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }

    public function feature(ProductCategory $category)
    {
        $category->featured = ($category->featured) ? false : true;
        $category->save();

        return redirect()->back()->withMessage('successful.');
    }
}
