<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\BelongsTo;

class RawMaterial extends Model
{

    public function raw_matrial_warehouse(){
        return $this->belongsTo('App\RawMaterialWarehouse' , 'warehouse_id');
    }
    public function exporter(){
        return $this->belongsTo('App\Exporter' , 'exporter_id');
    }
    public function values(){
        return $this->belongsToMany('App\OptionValue' , 'raw_matrials_values' , 'raw_material_id' , 'value_id');
    }
    public function bills(){
        return $this->belongsToMany('App\IOBill' , 'raw_matrials_bills' , 'raw_material_id' , 'bill_id');
    }

}
