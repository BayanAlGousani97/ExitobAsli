<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnterIOBill extends Model
{

    public function IOBill()
    {
        return $this->belongsTo(IOBill::class,'iobill_id');
    }
    public  function material()
    {
        return $this->belongsTo(RawMaterial::class,'material_id','id');

    }
}
