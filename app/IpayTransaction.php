<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpayTransaction extends Model
{
    protected $fillable = [
        'order_id', 'invoice_id', 'invoice_number', 'order_number', 'amount', 'txn_code', 'registered_name', 'registered_number', 'channel'
    ];
}
