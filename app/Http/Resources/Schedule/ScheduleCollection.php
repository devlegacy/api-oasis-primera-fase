<?php

namespace App\Http\Resources\Schedule;

use Illuminate\Http\Resources\Json\Resource;

class ScheduleCollection extends Resource
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
          'start' => $this->hora_inicio,
          'end' => $this->hora_final,
        ];
    }
}
