<?php

namespace App\Listeners;

use App\Events\Orders\OrderEvent;
use App\Events\Orders\OrderEvents;
use App\Events\Payments\PaymentEvent;
use App\Events\Payments\PaymentEvents;
use App\Models\ShopnsendAccount;
use App\Models\ShopnsendBalanceHistory;
use App\Models\Store;
use App\Notifications\BuyerOrderPlacedNotification;
use App\Notifications\ReceiverOrderNotification;
use App\Notifications\StoreOrderReceivedNotification;
use Illuminate\Support\Facades\Notification;

class PaymentEventSubscriber
{
    /**
     * Handle Payment received event.
     *
     * @param \App\Events\Payments\PaymentEvent $event
     */
    public function onPaymentReceived(PaymentEvent $event)
    {
        $order = $event->receipt->invoice->order;

        $grouped = $order->orderItems->groupBy(function ($item, $key) {
            return $item->store->id;
        });

        // add fee collected to shopnsend account balance
        $shopnsend = ShopnsendAccount::firstOrCreate(
            ['id' => 1],
            ['currency' => 'KES']
        );

        $shopnsendBalance = $shopnsend->current_balance;
        $currentShopnsendBalance = $shopnsendBalance + $order->fee;

        $event->receipt->shopnsendBalanceHistory()->create([
            'current_balance' => $currentShopnsendBalance,
            'currency' => 'KES',
            'amount' => $order->fee,
        ]);

        $shopnsend->current_balance = $currentShopnsendBalance;
        $shopnsend->save();

        // add total store's product amount which were checked out to the store's balance
        foreach ($grouped as $key => $group) {
            $store =  Store::find($key);

            $storeItemsPrice = $group->sum(function ($item) {
                return $item->quantity * $item->price;
            });
            $storeBalance = $store->current_balance;
            $currentStoreBalance = $storeBalance + $storeItemsPrice;

            $event->receipt->storeBalanceHistory()->create([
                'store_id' => $store->id,
                'current_balance' => $currentStoreBalance,
                'currency' => 'KES',
                'amount' => $storeItemsPrice,
            ]);

            $store->currency = 'KES';
            $store->account_balance = $currentStoreBalance;
            $store->save();
        }
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            PaymentEvents::RECEIVED,
            'App\Listeners\PaymentEventSubscriber@onPaymentReceived'
        );
    }
}
