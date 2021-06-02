<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    public function bills(){
        return $this->hasMany('App\Bill' , 'customer_id');
    }

    public function orders(){
        return $this->hasMany('App\Order' , 'customer_id');
    }
}
