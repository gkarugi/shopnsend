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
                ]],
                ['route' => '#', 'text' => 'Catalogue','icon' => '','children' => [
                    ['route' => route('categories.index'), 'text' => 'Categories'],
                    ['route' => '#', 'text' => 'Products'],
                ]],
                ['route' => '#', 'text' => 'Sales', 'icon' => '','children' => [
                    ['route' => '#','text' => 'Orders'],
                    ['route' => '#', 'text' => 'Customers'],
                ]],
            ]);

        } elseif (\Auth::guard($guard)->check() && auth()->user()->inRole('store_owner')) {
            //Dashboard menu items for store owner
            $menu = collect([
                ['route' => '#', 'icon' => '', 'text' => 'Dashboard'],
                ['route' => '#', 'text' => 'Catalogue','icon' => '','children' => [
                    ['route' => route('productGroupings.index'), 'text' => 'Product Groupings'],
                    ['route' => route('products.index'), 'text' => 'Products'],
                ]],
                ['route' => '#', 'text' => 'Sales', 'icon' => '','children' => [
                    ['route' => '#','text' => 'Orders'],
                    ['route' => '#', 'text' => 'Customers'],
                ]],
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
            ['route' => route('website.home'), 'text' => 'Home'],
            ['route' => route('website.products.index'), 'text' => 'Products'],
            ['route' => route('website.categories.index'), 'text' => 'Categories'],
            ['route' => route('website.stores.index'), 'text' => 'Stores'],
            ['route' => route('website.about'), 'text' => 'About'],
            ['route' => route('website.contact'), 'text' => 'Contact Us'],
        ]);

        return $returnArray ? $menu : json_encode($menu);
    }
}
