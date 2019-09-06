<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumptionCenter extends Model
{
    protected $table = 'centros_consumo';
    protected $appends = ['concepto'];

    public function schedules()
    {
        return $this->hasMany(ConsumtionCenterSchelude::class, 'centro_consumo_id');
    }

    public function getConceptoAttribute()
    {
        $lang = app()->getLocale();
        $attr = "concepto_$lang";
        return trim($this->$attr);
    }
}
