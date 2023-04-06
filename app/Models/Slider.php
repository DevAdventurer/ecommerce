<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public function sliderCategory() {
        return $this->belongsTo('App\Models\SliderCategory', 'slider_category_id', 'id');
    }

    public function media(){
        return $this->hasOne(Media::class,'id','media_id');
    }

    public function smallMedia(){
        return $this->hasOne(Media::class,'id','small_media_id');
    }

}
