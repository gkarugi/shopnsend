<?php

namespace App\Providers;

use App\Listeners\SendPhoneVerificationNotification;
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
            SendPhoneVerificationNotification::class,
        ],

//        'App\Events\OrderItemsRedeemed' => [
//            'App\Listeners\NotifyReceiverRedeemSuccessful',
//            'App\Listeners\NotifyStoreRedeemSuccessful'
//        ]
    ];

    /**
     * The subscriber classes to register.
     *
     * @var array
     */
    protected $subscribe = [
        'App\Listeners\OrderEventSubscriber',
        'App\Listeners\PaymentEventSubscriber',
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
