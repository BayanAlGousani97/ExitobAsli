<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelsWarehouse extends Model
{
    //
    public function models(){
        return $this->hasMany('App\Model','models_warehouse_id');
    }

    public function external_models(){
        return $this->hasMany('App\ExternalModel' ,'external_model_id');
    }
}
