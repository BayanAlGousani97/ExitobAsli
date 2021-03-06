<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exporter extends Model
{
    //

    public function io_bills(){
        return $this->hasMany('App\IOBill' , 'exporter_id');
    }
    public function raw_materials(){
        return $this->hasMany('App\RawMaterial' , 'exporter_id');
    }
}
