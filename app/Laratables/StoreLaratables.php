<?php
namespace App\Laratables;

class StoreLaratables
{
    public static function laratablesCustomAction($store)
    {
        return view('dashboard.stores.index_action', compact('store'))->render();
    }

    public static function laratablesCustomEdit($store)
    {
        return view('dashboard.stores.index_edit', compact('store'))->render();
    }
}
