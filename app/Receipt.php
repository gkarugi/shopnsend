<?php

namespace App;

use App\Models\ShopnsendBalanceHistory;
use App\Models\StoreBalanceHistory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = [
        'receipt_number', 'payment_txn_id', 'invoice_id', 'amount', 'currency'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function storeBalanceHistory()
    {
        return $this->morphOne(StoreBalanceHistory::class, 'transactionable');
    }

    public function shopnsendBalanceHistory()
    {
        return $this->morphOne(ShopnsendBalanceHistory::class, 'transactionable');
    }
}
