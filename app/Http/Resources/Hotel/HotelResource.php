<?php

namespace App\Http\Resources\Hotel;

use App\Http\Resources\ConsuptionCenter\ConsumptionCenterCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $hotel = [
          'hotel' => [
            'name' => $this->nombre
          ],
        ];
        $hasConsumtionCenter = count($this->attributes('consumption_center')->data);
        $hotel = array_merge($hotel, $hasConsumtionCenter ? ['consumptionCenter' => ConsumptionCenterCollection::collection($this->consumptionCenter)] : []);

        return $hotel;
    }
}
