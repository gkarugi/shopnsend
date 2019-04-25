<?php

namespace App\Models;

use App\Invoice;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number', 'currency', 'fee', 'order_code', 'status', 'receiver_name', 'receiver_phone', 'user_id', 'notes', 'paid'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function storeOrderItems()
    {
        return $this->orderItems()->where('order_items.store_id', '=', \Auth::user()->store_id);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class,'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
