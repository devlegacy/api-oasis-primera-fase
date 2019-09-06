<?php

namespace App\Http\Resources\ConsuptionCenter;

use App\Http\Resources\Schedule\ScheduleCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsumptionCenterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
          'schedules' => ScheduleCollection::collection($this->schedules->where('dia', getWeekDay())),
        ];
    }
}
