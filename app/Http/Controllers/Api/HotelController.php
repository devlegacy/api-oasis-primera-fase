<?php

namespace App\Http\Controllers\Api;

use App\Constants\ConsumptionCenterCategory;
use App\Constants\ConsumtionCenterCategory;
use App\ConsumptionCenter;
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
        //   return response([
        //   // consumption_center
        //   'data' => ConsumptionCenter::whereHas('schedules', function ($query) {
        //       $query->where('dia', '3');
        //   })->with(['schedules' => function ($query) {
        //       $query->where('dia', '3');
        //   }])->where('categoria_id', ConsumptionCenterCategory::RESTAURANTES)->get(),
        // ], Response::HTTP_CREATED);
        $category = ConsumptionCenterCategory::RESTAURANTES;
        return response([
        // consumption_center
        'data' => Hotel::

        with([
          'consumptionCenter' => function ($query) use ($category) {
              $query->where('categoria_id', $category)->whereHas('schedules', function ($query) {
                  $query->where('dia', '3');
              });
          },
          'consumptionCenter.schedules' => function ($query) {
              $query->where('dia', '3')->orderBy('hora_inicio', 'ASC');
          },
        ])

        ->findOrFail(1),
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
