<?php

namespace App\Http\Controllers\Api;

use App\Constants\ConsumptionCenterCategory;
use App\Hotel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Hotel\HotelResource;
use Symfony\Component\HttpFoundation\Response;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $restaurants =(Hotel::getConsumptionCenterBy($id, ConsumptionCenterCategory::RESTAURANTES));
        $category = ConsumptionCenterCategory::RESTAURANTES;
        // $restaurants = Hotel::with([
        //   'consumptionCenter' => function ($query) use ($category) {
        //       $query->has(
        //           'schedules',
        //           function ($query) {
        //               $query->where('dia', '=', '3')->orderBy('hora_inicio', 'ASC');
        //           }
        //       )
        //       ->where('categoria_id', $category);
        //   }
        // ])->findOrFail($id);

        $restaurants = Hotel::with([
          'consumptionCenter' => function ($query) use ($category) {
              $query->where('categoria_id', $category);
          },
          'consumptionCenter.schedules' => function ($query) {
              $query->where('dia', '=', getWeekDay())->orderBy('hora_inicio', 'ASC');
          },
        ])->findOrFail($id);

        $restaurants = $restaurants->consumptionCenter->filter(function ($value, $key) {
            return $value->schedules->count() > 0;
        })->values()->all();

        return response([
          'data' => $restaurants,
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel, $idRestaurant)
    {
        $restaurant  = $hotel->consumptionCenter()->where('centro_consumo_id', $idRestaurant)->get();
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
