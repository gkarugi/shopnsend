<?php
namespace App\Channels;

use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class AfricasTknSmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $username = config('services.africastalking.username');
        $key = config('services.africastalking.key');

        $gateway = new AfricasTalking($username, $key);

        $message = $notification->toAfricasTknSms($notifiable);
        $to = $notifiable->routeNotificationFor('AfricasTknSms');

        if (empty($to) || empty($message)) {
            $exception = new \InvalidArgumentException('missing recipients or message');
            throw $exception;
        }

        $sms = $gateway->sms();

        try {
            $sms->send(array(
                "to" => $to,
                "message" => $message,
            ));
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
    }

}
