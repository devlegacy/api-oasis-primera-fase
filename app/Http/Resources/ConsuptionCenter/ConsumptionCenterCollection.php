<?php

namespace App\Http\Resources\ConsuptionCenter;

use App\Constants\ConsumptionCenterCategory;
use App\Http\Resources\Schedule\ScheduleCollection;
use Illuminate\Http\Resources\Json\Resource;

class ConsumptionCenterCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'name' => $this->nombre,
          'concept' => $this->concepto,
          'img' => [
            'logo' => $this->logo,
            'coverPage' => $this->img_portada,
          ],
          'schedules' => ScheduleCollection::collection($this->schedules),
          'href' => [
            'details' => route($this->categoria_id ==  ConsumptionCenterCategory::RESTAURANTES ? 'restaurants.show' : 'bares.show', [$request->route()->parameters()["hotel"],$this->id]),
          ]
        ];
    }
}
