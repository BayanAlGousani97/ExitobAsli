<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //

    public function customer(){
        return $this->belongsTo('App\Customer' , 'customer_id');
    }

    public function order(){
        return $this->belongsTo('App\Order' , 'order_id');
    }

    public function haulage_company(){
        return $this->belongsTo('App\HaulageCompany' , 'haulage_company_id');
    }
  
    public function message(){
        return $this->belongsTo('App\Message' , 'message_id');
    }
}
