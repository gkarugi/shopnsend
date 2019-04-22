<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreBalanceHistory extends Model
{
    protected $fillable = [
        'store_id', 'currency', 'current_balance', 'amount',
    ];

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
}
