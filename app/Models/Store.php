<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Store extends Model implements HasMedia
{
    use Sluggable, HasMediaTrait;

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

    public function groupings()
    {
        return $this->hasMany(ProductGrouping::class,'store_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'store_id');
    }
}
