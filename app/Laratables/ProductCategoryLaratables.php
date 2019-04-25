<?php
namespace App\Laratables;

class ProductCategoryLaratables
{
    public static function laratablesCustomAction($category)
    {
        return view('dashboard.categories.index_action', compact('category'))->render();
    }

    public static function laratablesCustomEdit($category)
    {
        return view('dashboard.categories.index_edit', compact('category'))->render();
    }
}
