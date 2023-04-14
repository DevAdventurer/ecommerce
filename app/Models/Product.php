<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


     public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','product_tags')->withTimestamps();
    }

    public function collections()
    {
        return $this->belongsToMany('App\Models\Collection','product_collections')->withTimestamps();;
    }

     public function medias()
    {
        return $this->belongsToMany('App\Models\Media','product_medias');
    }

    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function productType(){
        return $this->hasOne(ProductType::class, 'id', 'product_type_id');
    }


    public function vendor(){
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }
    
    public function productVariants(){
        return $this->hasMany(ProductVariant::class,'product_id','id');
    }

    public function options(){
        return $this->hasMany(Option::class,'product_id','id');
    }

    public function optionValues(){
        return $this->hasMany(Option::class,'product_id','id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
