<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IOBill extends Model
{

    protected $casts=[
        'publish_date'=>'date'
    ];
    public function exporter()
    {
        return $this->belongsTo('App\Exporter','exporter_id');
    }
    public function enterIOBills()
    {
        return $this->hasMany(EnterIOBill::class,'iobill_id');

    }
    public function getFinalTotalPrice()
    {
        return $this->enterIOBills()->sum('net_cost');
    }
}
