<?php

namespace App\Listeners;

use App\Events\OrderPaidEvent;
use App\Models\Store;
use App\Notifications\StoreOrderReceivedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class StoreOrderReceivedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderPaidEvent  $event
     * @return void
     */
    public function handle(OrderPaidEvent $event)
    {
        $grouped = $event->order->orderItems->groupBy(function ($item, $key) {
            return $item->store->id;
        });

        foreach ($grouped as $key => $group) {
            $store =  Store::find($key);
            Notification::route('mail', $store->email)
                ->notify(new StoreOrderReceivedNotification($event->order, $store, $group));

        }
    }
}
