<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IOBill extends Model
{
    public function exporter()
    {
        return $this->belongsTo('App\Exporter','exporter_id');
    }


}
