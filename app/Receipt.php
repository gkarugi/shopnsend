<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'receipt_number', 'payment_txn_id', 'invoice_id', 'amount', 'currency'
    ];
}
