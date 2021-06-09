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
        return $this->hasMany('App\Message' , 'framework_id');
    }

    public function values(){
        return $this->belongsToMany('App\OptionValue' , 'frameworks_values' , 'framework_id' , 'value_id');
    }

    public function production_lines(){
        return $this->belongsToMany('App\Workshop' , 'production_lines' , 'framework_id' , 'workshop_id');
    }


}
