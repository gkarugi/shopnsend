<?php

namespace App\Notifications;

use App\Channels\AfricasTknSmsChannel;
use App\Models\Order;
use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReceiverOrderNotification extends Notification
{
    use Queueable;

    public $order;

    public $store;

    public $itemGroup;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\Order $order
     * @param \App\Models\Store $store
     * @param \Illuminate\Support\Collection $itemGroup
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
        $itemList = '';

        foreach($this->itemGroup as $item) {
            $itemList = $itemList . ' ' . $item->product->name . ' - Qty ' . count($this->itemGroup) . ', ';
        }

        return $this->itemGroup->first()->code . " Successful. You have received an order from " . $this->order->user->name . " by " . $this->store->name . '. They include: ' . $itemList;
    }
}
