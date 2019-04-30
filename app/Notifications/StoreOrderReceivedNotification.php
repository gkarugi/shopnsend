<?php

namespace App\Notifications;

use App\Models\Order;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class StoreOrderReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var \App\Models\Order
     */
    public $order;

    /**
     * @var \App\Models\Store
     */
    public $store;

    /**
     * @var \Illuminate\Support\Collection
     */
    public $itemGroup;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Order $order
     * @param \App\Models\Store $store
     * @param \Illuminate\Support\Collection $itemGroup
     *
     * @return void
     */
    public function __construct(Order $order, Store $store, $itemGroup)
    {
        $this->order = $order;
        $this->store = $store;
        $this->itemGroup = $itemGroup;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You have a new order.')
                    ->action('View Order', route('orders.show', $this->order))
                    ->line('Thank you for using our service!');
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
}
