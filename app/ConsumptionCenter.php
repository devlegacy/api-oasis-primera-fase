<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumptionCenter extends Model
{
    protected $table = 'centros_consumo';
    // protected $fillable = [];
    // protected $connection = '';
    // protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(ConsumtionCenterSchelude::class, 'centro_consumo_id');
    }

    public function getFirstNameAttribute()
    {
        return 'Hola';
    }
}
