<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class StoreBranch extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }

    public function cashiers()
    {
        return $this->hasMany(StoreBranchCashier::class,'store_branch_id');
    }
}
