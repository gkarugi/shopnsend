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
        $this->belongsTo(Order::class,'order_id');
    }
}
