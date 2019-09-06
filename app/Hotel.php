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
        return Self::with([
        'consumptionCenter' => function ($query) use ($category) {
            $query->with([
              'schedules' => function ($query) {
                  $query->where('dia', '=', getWeekDay())->orderBy('hora_inicio', 'ASC');
              }
            ])
            ->where('categoria_id', $category)
            ->has('schedules');
        }
      ])->findOrFail($id);
    }
}
