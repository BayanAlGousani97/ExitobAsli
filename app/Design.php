<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    //

  //  protected $casts = [
    //    'day' => 'publish_date'
   // ];
    protected $casts = [
        'publish_date' => 'date'
    ];

    public function season(){
        return $this->belongsTo('App\Season' , 'season_id');
    }

    public function CompanyModels(){
        return $this->hasMany('App\CompanyModel' , 'design_id');
    }

    public function messages(){
        return $this->hasMany('App\Message' , 'design_id');
    }

    public function values(){
        return $this->belongsToMany('App\OptionValue' , 'designs_values' , 'design_id' , 'value_id');
    }

    public function raw_matrials(){
        return $this->belongsToMany('App\RawMaterial' , 'designs_raw_matrials' , 'design_id' , 'raw_material_id');
        // return $this->belongsToMany(\App\RawMaterial::class);
    }
    
        
}
