<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ConsumptionCenter;

class Hotel extends Model
{
    protected $table = 'hoteles';
    // protected $connection = '';
    // protected $fillable = [];
    // protected $guarded = [];
    // protected $appends = [];

    public function consumptionCenter()
    {
        return $this->belongsToMany(ConsumptionCenter::class, 'centros_consumo_detalles', 'hotel_id', 'centro_consumo_id');
    }

    public static function getConsumptionCenterBy($id, $category)
    {
        // $restaurants = $restaurants->consumptionCenter->filter(function ($value, $key) {
        //     return $value->schedules->count() > 0;
        // })->values()->all();


        return Hotel::with([
          'consumptionCenter' => function ($query) use ($category) {
              $query->where('categoria_id', $category)->whereHas('schedules', function ($query) {
                  $query->where('dia', getWeekDay());
              });
          },
          'consumptionCenter.schedules' => function ($query) {
              $query->where('dia', getWeekDay())->orderBy('hora_inicio', 'ASC');
          },
        ])
        ->findOrFail($id);
    }
}
