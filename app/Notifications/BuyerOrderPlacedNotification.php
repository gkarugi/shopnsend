<?php

namespace App\Notifications;

use App\Channels\AfricasTknSmsChannel;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BuyerOrderPlacedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var \App\Models\Order
     */
    public $order;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [AfricasTknSmsChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    /**
     * Get the AfricasTalkingSms representation of the notification.
     *
     * @param  mixed $notifiable
     * @return string
     */
    public function toAfricasTknSms($notifiable)
    {
        return "Your order has been placed successfully. Your order number is " . $this->order->number . ". Total amount to pay is " . $this->order->invoice->currency . " " . $this->order->invoice->due_amount . "." ;
    }
}
