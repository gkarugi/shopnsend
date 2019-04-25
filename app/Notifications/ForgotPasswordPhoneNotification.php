<?php

namespace App\Notifications;

use App\Channels\AfricasTknSmsChannel;
use Illuminate\Notifications\Notification;

class ForgotPasswordPhoneNotification extends Notification
{

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return [AfricasTknSmsChannel::class];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toAfricasTknSms($notifiable)
    {
        return "Your reset code is " . $this->verificationCode($notifiable) . ". " . config('app.name');
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationCode($notifiable)
    {
        $code = rand(10000,99999);

        $notifiable->phone_verification_code = $code;
        $notifiable->save();

        return $code;
    }
}
