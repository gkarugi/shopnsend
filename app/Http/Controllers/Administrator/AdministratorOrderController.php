<?php

namespace App\Http\Controllers\Administrator;

use App\Invoice;
use App\IpayTransaction;
use App\Laratables\AdministratorOrderLaratables;
use App\Models\Order;
use App\Receipt;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministratorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | array
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Order::class, AdministratorOrderLaratables::class);
        }

        return view('dashboard.administrator.orders.index');
    }

    public function show(Order $order)
    {
        return view('dashboard.administrator.orders.show', compact('order'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | array
     */
    public function invoicesIndex()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Invoice::class);
        }

        return view('dashboard.administrator.invoices.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | array
     */
    public function ipayTxnsIndex()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(IpayTransaction::class);
        }

        return view('dashboard.administrator.ipayTxns.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response | array
     */
    public function receiptsIndex()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Receipt::class);
        }

        return view('dashboard.administrator.receipts.index');
    }
}
