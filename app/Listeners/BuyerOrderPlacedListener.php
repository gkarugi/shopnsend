<?php

namespace App\Listeners;

use App\Channels\AfricasTknSmsChannel;
use App\Events\OrderPlacedEvent;
use App\Notifications\BuyerOrderPlacedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyerOrderPlacedListener
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
     * @param  OrderPlacedEvent  $event
     * @return void
     */
    public function handle(OrderPlacedEvent $event)
    {
       Notification::route('mail', $event->order->email)
           ->route('AfricasTknSms', $event->order->phone)
           ->notify(new BuyerOrderPlacedNotification($event->order));
    }
}
