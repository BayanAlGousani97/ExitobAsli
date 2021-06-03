<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //

    public function country(){
        return $this->belongsTo('App\Country' , 'country_id');
    }

    public function customers(){
        return $this->hasMany('App\Customer' , 'city_id');
    }

    public function haulage_companies(){
        return $this->hasMany('App\HaulageCompany' , 'city_id');
    }
}
