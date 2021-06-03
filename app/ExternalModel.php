<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExternalModel extends Model
{
    //
    public function brand(){
        return $this->belongsTo('App\Brand' , 'brand_id');
    }

    public function models_warehouse(){
        return $this->belongsTo('App\ModelsWarehouse' , 'models_warehouse_id');
    }

    public function serial_clothes(){
        return $this->hasMany('App\SerialClothes' , 'external_model_id')
    }
}
