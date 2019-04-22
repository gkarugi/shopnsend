<?php

namespace App\Http\Controllers;

use App\Laratables\OrderLaratables;
use App\Models\Order;
use App\Models\Store;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \App\Models\Store $store
     * @return \Illuminate\Http\Response | array
     */
    public function index(Store $store)
    {
//        if (request()->ajax()) {
//            return Laratables::recordsOf(Order::class, OrderLaratables::class);
//        }
        $orders = $store->orders();

        return view('dashboard.orders.index', compact('store','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store, Order $order)
    {
        return view('dashboard.orders.show', compact('order', 'store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
