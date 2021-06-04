<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function customer(){
        return $this->belongsTo('App\Customer','customer_id');
    }
    
    public function bill(){
        return $this->hasOne('App\Bill','order_id');
    }
}
