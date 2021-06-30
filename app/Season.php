<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //
    public function brand (){
        return $this->belongsTo('App\Brand' ,'brand_id');
    }

    public function designs(){
        return $this->hasMany('App\Design','season_id');
    }

}
