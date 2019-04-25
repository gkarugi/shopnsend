<?php

namespace App;

class MenuHelper
{
    public static function dashboard($returnArray = false, $guard = null)
    {
        if (\Auth::guard($guard)->check() && auth()->user()->inRole('administrator')) {
            //Dashboard menu items for admin
            $menu = collect([
                ['route' => route('dashboard'), 'icon' => '', 'text' => 'Dashboard'],
                ['route' => '#', 'text' => 'Manage','icon' => '','children' => [
                    ['route' => route('stores.index'), 'text' => 'Stores'],
                    ['route' => route('categories.index'), 'text' => 'Categories'],
                ]],
                ['route' => '#', 'text' => 'Sales', 'icon' => '','children' => [
                    ['route' => route('admin.orders.index'), 'text' => 'Orders'],
                    ['route' => route('admin.invoices.index'),'text' => 'Invoices'],
                    ['route' => route('admin.ipayTxns.index'),'text' => 'Ipay Transactions'],
                    ['route' => route('admin.receipts.index'),'text' => 'Receipts'],
                ]],
                ['route' => route('admin.account'), 'icon' => '', 'text' => 'Account'],
            ]);

        } elseif (\Auth::guard($guard)->check() && auth()->user()->inRole('store_owner')) {
            //Dashboard menu items for store owner
            $menu = collect([
                ['route' => '#', 'icon' => '', 'text' => 'Dashboard'],
                ['route' => '#', 'text' => 'Catalogue','icon' => '','children' => [
                    ['route' => route('stores.index'), 'text' => 'Stores'],
                    ['route' => route('productGroupings.index'), 'text' => 'Product Groupings'],
                    ['route' => route('products.index'), 'text' => 'Products'],
                ]],
                ['route' => '#', 'text' => 'Sales', 'icon' => '','children' => [
                    ['route' => route('orders.index', auth()->user()->stores()->first()),'text' => 'Orders'],
//                    ['route' => '#', 'text' => 'Customers'],
                ]],
                ['route' => route('stores.account', auth()->user()->stores->first()), 'icon' => '', 'text' => 'My Account'],
            ]);
        }  elseif (\Auth::guard($guard)->check() && auth()->user()->inRole('cashier')) {
            //Dashboard menu items for cashier
            $menu = collect([
                ['route' => route('pos.index'), 'icon' => '', 'text' => 'POS'],
            ]);
        } else {
            //Dashboard menu items for any one else with a different role
            $menu = collect([
                ['route' => '/', 'text' => 'Main Website','icon' => ''],
            ]);
        }

        return $returnArray ? $menu : json_encode($menu);
    }

    public static function website($returnArray = false, $guard = null)
    {
        $menu = collect([
            ['route' => route('website.stores.index'), 'text' => 'Stores'],
            ['route' => route('website.products.index'), 'text' => 'Menu'],
            ['route' => route('website.categories.index'), 'text' => 'Categories'],
        ]);

        return $returnArray ? $menu : json_encode($menu);
    }
}
