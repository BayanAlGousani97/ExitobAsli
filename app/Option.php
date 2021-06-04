<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    //
    public function option_values(){
        return $this->hasMany('App\OptionValue','option_value_id');
    }
}
