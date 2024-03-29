<?php

namespace App\Http\Controllers\Website;

use App\Events\Orders\OrderEvent;
use App\Events\Orders\OrderEvents;
use App\Events\Payments\PaymentEvent;
use App\Events\Payments\PaymentEvents;
use App\Generators\TimeHashGenerator;
use App\Ipay;
use App\IpayTransaction;
use App\Models\Order;
use App\Models\Product;
use App\Receipt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use LukePOLO\LaraCart\Facades\LaraCart;

class OrderController extends Controller
{
    private $generator;

    public function __construct(TimeHashGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function addToCart(Request $request, Product $product)
    {
        LaraCart::add(
            $product->id,
            $name = $product->name,
            $qty = 1,
            $price = $product->price,
            $options = [
                'currency' => 'KES'
            ],
            $taxable = false,
            $lineItem = false
        );

        return redirect()->back()->with('cartAdd', 'Successfully added to cart');
    }

    public function getCart()
    {
        return view('website.pages.orders.cart');
    }

    public function qtyAdd(Request $request)
    {
        LaraCart::updateItem($request->get('hash'), 'qty', $request->get('qty')  + 1);

        return redirect()->route('website.cart')->withMessage('Successfully updated your cart');
    }

    public function qtySub(Request $request)
    {
        LaraCart::updateItem($request->get('hash'), 'qty', $request->get('qty')  - 1);

        return redirect()->route('website.cart')->withMessage('Successfully updated your cart');
    }

    public function cartRemove(Request $request)
    {
        LaraCart::removeItem($request->get('hash'));

        return redirect()->route('website.cart')->withMessage('Successfully removed the item from your cart');
    }

    public function getCheckout()
    {
        return view('website.pages.orders.checkout');
    }

    public function order(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
        ]);

        if (count(LaraCart::getItems()) == 0) {
            return redirect()->back()->withError('unsuccessful. Your Cart is empty');
        }

        DB::beginTransaction();

        try {
            //saving logic here
            $order = new Order();
            $order->number = $this->generator->generateNumber();
            $order->currency = 'KES';
            $order->fee = LaraCart::getFee('serviceFee')->getAmount($format = false, $withTax = false);
            $order->status = 'unpaid';
            $order->receiver_name = $request->get('name');
            $order->receiver_phone = $request->get('phone');
            $order->user_id = auth()->user()->id;
            $order->notes = $request->get('notes');
            $order->save();

            foreach ($items = LaraCart::getItems() as $item) {
                $order->orderItems()->create([
                   'product_id' => $item->id,
                   'store_id' => Product::find($item->id)->store_id,
                   'name' => $item->name,
                   'quantity' => $item->qty,
                   'redeemable_qty' => $item->qty,
                   'price' => $item->price,
                   'currency' => 'KES',
                ]);
            }

            $orderItemsSum = $order->orderItems->sum(function ($item) {
                return $item->quantity * $item->price;
            });

            $order->invoice()->create([
                'invoice_number' => $this->generator->generateNumber(),
                'total_amount' => $orderItemsSum + (int) $order->fee,
                'due_amount' => $orderItemsSum  + (int) $order->fee,
                'excess_amount' => 0,
                'currency' => 'KES'
            ]);
        } catch(\Exception $e) {
            DB::rollback();
            return back()->withError('could not checkout successfully');
        }

        DB::commit();

        event(OrderEvents::CREATED, new OrderEvent($order));

        $cashier = new Ipay();

        $response = $cashier->isDemo()
            ->usingVendorId(config('services.ipay.vendorid'), config('services.ipay.hash'))
            ->withCallback(route('website.ipay.callback'))
            ->withCustomer($request->user()->phone, $request->user()->email, false)
            ->transact($order->invoice->due_amount, $order->number, $order->invoice->invoice_number);

        return redirect()->away($response['url']);
    }

    public function ipayCallback(Request $request)
    {
        $data = $request->all();

        $order = Order::where('number',$data['id'])->first();
        $invoice = $order->invoice;

        DB::beginTransaction();

        try {
            $ipayTxn = new IpayTransaction();
            $ipayTxn->order_id = $order->id;
            $ipayTxn->invoice_id = $invoice->id;
            $ipayTxn->invoice_number = $data['ivm'];
            $ipayTxn->order_number = $data['id'];
            $ipayTxn->amount = $data['mc'];
            $ipayTxn->txn_code = $data['txncd'];
            $ipayTxn->registered_name = $data['msisdn_id'];
            $ipayTxn->registered_number = $data['msisdn_idnum'];
            $ipayTxn->channel = $data['channel'];
            $ipayTxn->save();

            $receipt = new Receipt();
            $receipt->receipt_number = $this->generator->generateNumber();
            $receipt->payment_txn_id = $ipayTxn->id;
            $receipt->invoice_id = $ipayTxn->invoice_id;
            $receipt->amount = $ipayTxn->amount;
            $receipt->currency = 'KES';
            $receipt->save();

            if ($receipt->amount = $invoice->due_amount) {
                $invoice->due_amount = 0;
            } elseif ($receipt->amount < $invoice->due_amount) {
                $invoice->due_amount = $invoice->due_amount - $receipt->amount;
            }elseif ($receipt->amount > $invoice->due_amount) {
                $invoice->due_amount = 0;
                $invoice->excess_amount = $receipt->amount - $invoice->due_amount;
            }

            $invoice->save();

            $order->paid = true;
            $order->save();

            $grouped = $order->orderItems->groupBy(function ($item, $key) {
                return $item->store->id;
            });

            foreach ($grouped as $group) {
                $code  = $this->generator->generateNumber(false);
                foreach ($group as $item) {
                    $item->code = $code;
                    $item->save();
                }
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        event(PaymentEvents::RECEIVED, new PaymentEvent($receipt));
        event(OrderEvents::PAID, new OrderEvent($order));

        LaraCart::emptyCart();

        return redirect()->route('website.home')->withSuccess('Order completed successfully');
    }
}
