<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    //
    public function raw_matrial_warehouse(){
        return $this->belongsTo('App\RawMaterialWarehouse' , 'warehouse_id');
    }
}
