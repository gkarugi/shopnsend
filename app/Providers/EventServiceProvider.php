<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        'App\Events\OrderPlacedEvent' => [
            'App\Listeners\BuyerOrderPlacedListener',
        ],

//        'App\Events\PaymentReceivedEvent' => [
//            'App\Listeners\PaymentReceivedListener',
//        ],

        'App\Events\OrderPaidEvent' => [
            'App\Listeners\NotifyReceiverListener',
            'App\Listeners\StoreOrderReceivedListener',
        ],

//        'App\Events\OrderItemsRedeemed' => [
//            'App\Listeners\NotifyReceiverRedeemSuccessful',
//            'App\Listeners\NotifyStoreRedeemSuccessful'
//        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
