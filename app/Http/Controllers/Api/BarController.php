<?php

namespace App\Http\Controllers\Api;

use App\Constants\ConsumptionCenterCategory;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConsuptionCenter\ConsumptionCenterResource;
use App\Http\Resources\Hotel\HotelResource;
use Symfony\Component\HttpFoundation\Response;

class BarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $bares = new HotelResource(Hotel::getConsumptionCenterBy($id, ConsumptionCenterCategory::BARES));

        return response([
        'data' => $bares,
      ], Response::HTTP_CREATED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel, $idRestaurant)
    {
        $restaurant  = new ConsumptionCenterResource($hotel->consumptionCenter()->where('centro_consumo_id', $idRestaurant)->first());
        return response([
        'data' => $restaurant ,
      ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
