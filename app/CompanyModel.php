<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    //
    protected $casts = [
        'publish_date' => 'date'
    ];
    public function design(){
        return $this->belongsTo('App\Design' ,'design_id');
    }

    public function models_warehouse(){
        return $this->belongsTo('App\ModelsWarehouse','models_warehouse_id');
    }

    public function frameworks(){
        return $this->hasMany('App\Framwork','model_id');
    }

     public function serial_clothes(){
        return $this->hasMany('App\SerialClothes','serial_clothes_id');
    }

    public function messages(){
        return $this->hasMany('App\Message','model_id');
    }

    public function values(){
        return $this->belongsToMany('App\OptionValue' , 'models_values' , 'model_id' , 'value_id');
    }

}
