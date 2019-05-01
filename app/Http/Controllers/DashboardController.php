<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\RedeemedOrderItems;
use App\Models\ShopnsendAccount;
use App\Models\Store;
use App\Models\StoreBranch;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('dashboard.dashboard');
    }

    public function administrator()
    {
        $balance = ShopnsendAccount::find(1)->current_balance;
        $stores = Store::count();
        $completeOrders = Order::where('paid', true)->count();
        $incompleteOrders = Order::where('paid', false)->count();

        return compact('balance','stores', 'completeOrders', 'incompleteOrders');

    }

    public function storeOwner()
    {
        $store = auth()->user()->stores()->first();

        $balance = $store->account_balance;
        $branches = StoreBranch::where('store_id',$store->id)->count();
        $completeOrders = $store->orders()->where('paid',true)->count();
        $incompleteOrders = $store->orders()->where('paid', false)->count();

        return compact('balance','branches', 'completeOrders', 'incompleteOrders');
    }

    public function cashier()
    {
        $itemsRedeemed = RedeemedOrderItems::where('fulfilled_by', auth()->user()->id)->get();
        $sumRevenue = $itemsRedeemed->sum(function ($item) {
            return $item->quantity * $item->orderItem->product->price;
        });
        $sumItems = $itemsRedeemed->sum('quantity');
        $sumProducts = $itemsRedeemed->count(function ($item) {
            return $item->orderItem->product;
        });

        return compact('sumRevenue','sumItems','sumProducts');
    }
}
