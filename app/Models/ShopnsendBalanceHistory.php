<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopnsendBalanceHistory extends Model
{
    protected $fillable = [
        'currency', 'current_balance', 'amount'
    ];

    public function transactionable()
    {
        return $this->morphTo();
    }
}
