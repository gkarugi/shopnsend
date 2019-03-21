<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Znck\Eloquent\Traits\BelongsToThrough;

class OrderItem extends Model
{
    use BelongsToThrough;

    protected $fillable = [
        'order_id', 'product_id', 'name', 'quantity', 'redeemable_qty', 'price', 'currency'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function store()
    {
        return $this->belongsToThrough(Store::class,Product::class,'store_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function redeemedOrderItems()
    {
        return $this->hasMany(RedeemedOrderItems::class,'order_item_id');
    }
}
