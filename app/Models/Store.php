<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'slug', 'user_id', 'active'
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

    public function owner()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function branches()
    {
        return $this->hasMany(StoreBranch::class,'store_id');
    }
}
