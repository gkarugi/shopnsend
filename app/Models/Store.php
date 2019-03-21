<?php

namespace App\Models;

use App\User;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Store extends Model implements HasMedia
{
    use HasRelationships;

    use Sluggable, HasMediaTrait;

    protected $fillable = [
        'name', 'email', 'slug', 'user_id', 'active'
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

    public function orderItems()
    {
        return $this->hasManyThrough(OrderItem::class,Product::class,'store_id');
    }

    public function cashiers()
    {
        return $this->hasManyThrough(StoreBranchCashier::class,StoreBranch::class,'id','store_branch_id');
    }

    public function orders()
    {
        $orderItems = $this->orderItems()->with('order')->get();

        $orders = $orderItems->map(function ($item,$key) {
            return $item->order;
        });

        return $orders;
    }
}
