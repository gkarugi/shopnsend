<?php

namespace App\Listeners;

use App\Events\Orders\OrderEvent;
use App\Events\Orders\OrderEvents;
use App\Models\ShopnsendAccount;
use App\Models\ShopnsendBalanceHistory;
use App\Models\Store;
use App\Notifications\BuyerOrderPlacedNotification;
use App\Notifications\ReceiverOrderNotification;
use App\Notifications\StoreOrderReceivedNotification;
use Illuminate\Support\Facades\Notification;

class OrderEventSubscriber
{
    /**
     * Handle Order created event.
     *
     * @param \App\Events\Orders\OrderEvent $event
     */
    public function onOrderCreated(OrderEvent $event)
    {
        Notification::route('mail', $event->order->email)
            ->route('AfricasTknSms', $event->order->phone)
            ->notify(new BuyerOrderPlacedNotification($event->order));
    }

    /**
     * Handle Order paid event.
     *
     * @param \App\Events\Orders\OrderEvent $event
     */
    public function onOrderPaid(OrderEvent $event)
    {
        $grouped = $event->order->orderItems->groupBy(function ($item, $key) {
            return $item->store->id;
        });

        // Send order received notification to the receiver
        foreach ($grouped as $key => $group) {
            Notification::route('mail', $event->order->receiver_email)
                ->route('AfricasTknSms', $event->order->receiver_phone)
                ->notify(new ReceiverOrderNotification($event->order, Store::find($key), $group));
        }

        // Send New order notification to concerned stores
        foreach ($grouped as $key => $group) {
            $store =  Store::find($key);
            Notification::route('mail', $store->email)
                ->notify(new StoreOrderReceivedNotification($event->order, $store, $group));
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
            OrderEvents::CREATED,
            'App\Listeners\OrderEventSubscriber@onOrderCreated'
        );

        $events->listen(
            OrderEvents::PAID,
            'App\Listeners\OrderEventSubscriber@onOrderPaid'
        );
    }
}
