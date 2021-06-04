<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function serial_clothes(){
        return $this->belongsTo('App\SerialClothes','serial_clothes_id');
    }
}
