<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    //
    public function messages(){
        return $this->hasMany('App\Message' , 'sent_id');
    }

    public function message(){
        return $this->hasMany('App\Message' , 'received_id');
    }
}
