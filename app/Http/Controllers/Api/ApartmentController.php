<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Apartment::All();
        dd('ciao');

        return response()->json($data);
    }

    public function filter(Request $request)
    {
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        $distance = $request->input('distance');
        $rooms = $request->input('rooms');
        $bedrooms = $request->input('bedrooms');
        $earthRadius = 6371;

        $appartamenti = Apartment::with('services')
            ->where('rooms', '>=', $rooms)
            ->where('bedrooms', '>=', $bedrooms)
            ->selectRaw("*, ($earthRadius * ACOS(COS(RADIANS($lat)) * COS(RADIANS(latitude)) * COS(RADIANS(longitude) - RADIANS($lng)) + SIN(RADIANS($lat)) * SIN(RADIANS(latitude)))) AS distance")
            ->havingRaw("distance < $distance")
            ->orderBy('distance')
            ->get();
        return response()->json($appartamenti);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $id)
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
        $single_Apartment = Apartment::find($id);

        return response()->json($single_Apartment);
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
