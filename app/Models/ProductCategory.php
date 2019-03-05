<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ProductCategory extends Model implements HasMedia
{
    use HasMediaTrait, NodeTrait, Sluggable {
        NodeTrait::replicate as replicateNode;
        Sluggable::replicate as replicateSlug;
    }

    protected $fillable = [
        'name', 'slug', 'description'
    ];

    public function replicate(array $except = null)
    {
        $instance = $this->replicateNode($except);

        (new SlugService())->slug($instance, true);

        return $instance;
    }

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

    public function products()
    {
        return $this->hasMany(Product::class,'product_category_id');
    }
}
