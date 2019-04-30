<?php

namespace App\Notifications;

use App\Channels\AfricasTknSmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class VerifyPhoneNotification extends Notification implements ShouldQueue
{
    use Queueable;

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
        return "Your verification code is " . $this->verificationCode($notifiable) . ". " . config('app.name');
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
