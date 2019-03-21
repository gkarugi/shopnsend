<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RedeemedOrderItems extends Model
{
    protected $fillable = [
        'code', 'order_item_id', 'quantity', 'fulfilled_by', 'store_branch_id'
    ];

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class,'order_item_id');
    }
}
