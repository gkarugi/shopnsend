<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductGroupingRequest;
use App\Models\ProductGrouping;
use Illuminate\Http\Request;

class ProductGroupingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupings = ProductGrouping::all();

        return view('dashboard.groupings.index', compact('groupings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.groupings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateProductGroupingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductGroupingRequest $request)
    {
        $grouping = ProductGrouping::create([
            'name' => $request->get('name'),
            'store_id' => auth()->user()->stores->first()->id,
            'description' => $request->get('name'),
        ]);

        return redirect()->route('productGroupings.index')->withMessage('successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGrouping  $productGrouping
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGrouping $productGrouping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGrouping  $productGrouping
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGrouping $productGrouping)
    {
        return view('dashboard.groupings.edit', compact('productGrouping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductGrouping  $productGrouping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGrouping $productGrouping)
    {
        $productGrouping->update([
            'name' => $request->get('name'),
            'description' => $request->get('name'),
        ]);

        return redirect()->route('productGroupings.index')->withMessage('successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGrouping  $productGrouping
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGrouping $productGrouping)
    {
        //
    }
}
