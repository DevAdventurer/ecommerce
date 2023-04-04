<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

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


    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function productType(){
        return $this->belongsTo(ProductType::class, 'product_type_id', 'id');
    }


    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }
    
    public function productVariants(){
        return $this->hasMany(ProductVariant::class,'product_id','id');
    }

    public function options(){
        return $this->hasMany(Option::class,'product_id','id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
