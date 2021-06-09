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

    public function models(){
        return $this->belongsToMany('App\Model' , 'models_orders' , 'order_id' , 'model_id');
    }

    public function external_models(){
        return $this->belongsToMany('App\ExternalModel' , 'external_models_orders' , 'order_id' , 'external_model_id');
    }

}
