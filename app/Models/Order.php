<?php

namespace App\Models;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'number', 'order_code', 'status', 'first_name', 'last_name', 'email', 'phone', 'user_id', 'notes', 'paid'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'order_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class,'order_id');
    }
}
