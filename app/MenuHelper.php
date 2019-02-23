<?php

namespace App;

class MenuHelper
{
    public static function dashboard($returnArray = false, $guard = null)
    {
        if (\Auth::guard($guard)->check() && auth()->user()->inRole('administrator')) {
            //Dashboard menu items for admin
            $menu = collect([
                ['route' => route('dashboard.admin.dashboard'), 'icon' => '', 'text' => 'Dashboard'],
                ['route' => '#', 'text' => 'Manage','icon' => '','children' => [
                    ['route' => route('dashboard.admin.stores.index'), 'text' => 'Stores'],
                ]],
                ['route' => '#', 'text' => 'Catalogue','icon' => '','children' => [
                    ['route' => route('dashboard.admin.categories.index'), 'text' => 'Categories'],
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
}
