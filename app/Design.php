<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    //

    public function season(){
        return $this->belongsTo('App\Season' , 'season_id');
    }

    public function models(){
        return $this->hasMany('App\Model' , 'design_id');
    }

    public function messages(){
        return $this->hasMany('App\Message' , 'design_id');
    }
}
