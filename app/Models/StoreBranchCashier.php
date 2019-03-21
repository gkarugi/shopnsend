<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class StoreBranchCashier extends Model
{
    protected $fillable = [
        'user_id', 'store_branch_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
