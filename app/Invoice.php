<?php

namespace App;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'order_id', 'total_amount', 'due_amount', 'excess_amount', 'invoice_number', 'currency'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class,'invoice_id');
    }
}
