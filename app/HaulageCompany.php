<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HaulageCompany extends Model
{
    //

    public function city(){
        return $this->belongsTo('App\City' , 'city_id');
    }

    public function bills(){
        return $this->hasMany('App\Bill' ,'haulage_company_id');
    }
}
