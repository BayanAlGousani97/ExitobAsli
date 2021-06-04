<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    public function model(){
        return $this->belongsTo('App\Model','model_id');
    }

    public function design(){
        return $this->belongsTo('App\Design','design_id');
    }

    public function framework(){
        return $this->belongsTo('App\Framework','framework_id');
    }

    public function workshop(){
        return $this->belongsTo('App\Workshop','sent_id');
    }

    public function workshop(){
        return $this->belongsTo('App\Workshop','received_id');
    }

    public function bill(){
        return $this->hasOne('App\Bill' , 'message_id');
    }

}
