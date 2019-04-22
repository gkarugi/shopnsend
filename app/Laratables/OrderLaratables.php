<?php
namespace App\Laratables;

class OrderLaratables
{
    /**
     * Fetch only active users in the datatables.
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function laratablesQueryConditions($query)
    {
        $store = request()->route('store');

        return $store->orders();
    }

    public static function laratablesCustomAction($order)
    {
        return view('dashboard.orders.index_action', compact('order'))->render();
    }
}
