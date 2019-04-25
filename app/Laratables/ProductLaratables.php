<?php
namespace App\Laratables;

class ProductLaratables
{
    public static function laratablesCustomAction($product)
    {
        return view('dashboard.products.index_action', compact('product'))->render();
    }

    public static function laratablesCustomEdit($product)
    {
        return view('dashboard.products.index_edit', compact('product'))->render();
    }
}
