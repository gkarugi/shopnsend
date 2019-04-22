<?php
namespace App\Laratables;

class ProductGroupingLaratables
{
    public static function laratablesCustomAction($grouping)
    {
        return view('dashboard.groupings.index_action', compact('grouping'))->render();
    }

    public static function laratablesCustomEdit($grouping)
    {
        return view('dashboard.groupings.index_edit', compact('grouping'))->render();
    }
}
