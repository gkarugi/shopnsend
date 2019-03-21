<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\RedeemedOrderItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class POSController extends Controller
{
    public function index(Request $request)
    {
        $items = ($request->get('code')) ? OrderItem::with('product')->whereHas('order', function($q){
            $q->where('paid', '=', 1);
        })->where('code', $request->get('code'))->get() : [] ;

        return view('dashboard.pos.index', compact('items'));
    }

    public function redeemItems(Request $request)
    {
        $items = OrderItem::with('product')->where('redeemable_qty','!=',0)->where('code','=', $request->get('code'))->get();

        DB::beginTransaction();

        try {
            //create redeemed order items
            foreach ($items as $item) {
                RedeemedOrderItems::create([
                    'code' => $item->code,
                    'order_item_id' => $item->order->id,
                    'quantity' => $item->quantity,
                    'fulfilled_by' => auth()->user()->id,
                    'store_branch_id' => auth()->user()->cashier->store_branch_id,
                ]);

                //reduce redeemable quantity on order items
                $item->redeemable_qty = $item->redeemable_qty - $item->quantity;
                $item->save();
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            return redirect()->back()->withError('Checkout Failed');
        }

        return redirect()->route('pos.redeemedItems', $request->get('code'))->withSuccess('Checkout Successful');
    }

    public function redeemedItems($code)
    {
        $items = RedeemedOrderItems::with('orderItem')->where('code',$code)->get();

        return view('dashboard.pos.redeemed',compact('items'));
    }
}
