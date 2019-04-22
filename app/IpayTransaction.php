<?php

namespace App;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class IpayTransaction extends Model
{
    protected $fillable = [
        'order_id', 'invoice_id', 'invoice_number', 'order_number', 'amount', 'txn_code', 'registered_name', 'registered_number', 'channel'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
}
