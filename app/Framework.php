<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Framework extends Model
{
    //
    public function model(){
        return $this->belongsTo('App\Model' , 'model_id');
    }

    public function messages(){
        return $this->hasMany('App\Message' , 'framework_id')
    }
}
