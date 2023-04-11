<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrustedSection extends Model
{
    public function media(){
        return $this->hasOne(Media::class,'id','icon');
    }
}
