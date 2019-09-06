<?php

namespace App\Http\Controllers\Api;

use App\Constants\ConsumtionCenterCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hotel;
use App\Http\Resources\Hotel\HotelResource;
use Symfony\Component\HttpFoundation\Response;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show($id)
    {
        // $hotel = Hotel::with(['consumptionCenter' => function ($query) {
        //     $query->with(['schedules' => function ($query) {
        //         $query->where('dia', '=', '3');
        //     }])->where('categoria_id', ConsumtionCenterCategory::RESTAURANTES);
        // }])->findOrFail($id);
        // $hotel = $hotel->consumptionCenter->filter(function ($h) {
        //     return !$h->schedules->isEmpty();
        // });
        $hotel = new HotelResource(Hotel::findOrFail($id));
        return response([
          // consumption_center
          'data' => $hotel,
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
