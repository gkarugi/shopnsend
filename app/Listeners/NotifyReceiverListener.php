<?php

namespace App\Listeners;

use App\Events\OrderPaidEvent;
use App\Models\Store;
use App\Notifications\ReceiverOrderNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyReceiverListener
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
            Notification::route('mail', $event->order->receiver_email)
                ->route('AfricasTknSms', $event->order->receiver_phone)
                ->notify(new ReceiverOrderNotification($event->order, Store::find($key), $group));
        }

    }
}
