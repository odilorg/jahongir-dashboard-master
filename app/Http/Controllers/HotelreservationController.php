<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotelreservation;

class HotelreservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotelreservations = Hotelreservation::all();
        return view('hotelreservations.index', ['hotelreservations' => $hotelreservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotelreservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotelreservations = Hotelreservation::create([
            'hotel_city' => $request->input('hotel_city'),
            'hotel_name' => $request->input('hotel_name'),
        ]);

        return redirect('hotelreservations');    

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Hotel Reservcation - $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotelreservation = Hotelreservation::find($id);
        $hotelreservation->checkin_date = date('d/m/Y', strtotime($hotelreservation->checkin_date));
        
       //dd($hotelreservation);

        
        
        return view('hotelreservations.edit')->with('hotelres', $hotelreservation);
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
        $hotelreservations = Hotelreservation::where('id', $id)->update([
            'hotel_city' => $request->input('hotel_city'),
            'hotel_name' => $request->input('hotel_name')
            
        ]);
        return redirect('hotelreservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\H
     * ttp\Response
     */
    public function destroy(Hotelreservation $hotelreservation)
    {
        
        $hotelreservation->delete();
        return redirect('hotelreservations');
}
}