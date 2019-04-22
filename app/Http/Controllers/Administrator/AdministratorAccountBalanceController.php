<?php

namespace App\Http\Controllers\Administrator;

use App\Models\ShopnsendAccount;
use App\Models\ShopnsendBalanceHistory;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorAccountBalanceController extends Controller
{
    public function account()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(ShopnsendBalanceHistory::class);
        }

        $account = ShopnsendAccount::find(1);
//        $todayincome = $store->balanceHistories()->where('created_at', Carbon::today())->sum('amount');
        $todayIncome = ShopnsendBalanceHistory::all()->sum('amount');

        return view('dashboard.administrator.account', compact('account','todayIncome'));
    }
}
