<?php

namespace App\Listeners;

use App\Contracts\MustVerifyPhone;
use Illuminate\Auth\Events\Registered;

class SendPhoneVerificationNotification
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        if ($event->user instanceof MustVerifyPhone && ! $event->user->hasVerifiedPhone() && !is_null($event->user->phone)) {
            $event->user->sendPhoneVerificationNotification();
        }
    }
}
