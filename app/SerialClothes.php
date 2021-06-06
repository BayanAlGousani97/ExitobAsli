<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SerialClothes extends Model
{
    //

    public function model(){
        return $this->belongsTo('App\Model','model_id');
    }

    public function external_model(){
        return $this->belongsTo('App\ExternalModel','external_model_id');
    }

    public function products(){
        return $this->hasMany('App\Product' , 'serial_clothes_id');
    }
}
