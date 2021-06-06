<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterialWarehouse extends Model
{
    //
    public function raw_matrials(){
        return $this->hasMany('App\RawMaterial' ,'warehouse_id');
    }
}
