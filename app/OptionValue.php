<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    //
    public function option(){
        return $this->belongsTo('App\Option','option_id');
    }
    public function rawvalues(){
        return $this->belongsToMany('App\RawMaterial', 'raw_matrials_values', 'value_id', 'raw_material_id');
    }

}
