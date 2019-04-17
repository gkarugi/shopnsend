<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopnsendAccount extends Model
{

    protected $fillable = [
        'current_balance', 'currency'
    ];
}
