<?php

namespace App\Listeners;

use App\Events\OrderItemsRedeemed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyReceiverRedeemSuccessful
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
     * @param  OrderItemsRedeemed  $event
     * @return void
     */
    public function handle(OrderItemsRedeemed $event)
    {
        //
    }
}
