<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //

    public function seasons()
    {
        return $this->hasMany('App\Season' , 'brand_id');
    }

    public function external_models(){
        return $this->hasMany('App\ExternalModel' , 'brand_id');
    }
}
