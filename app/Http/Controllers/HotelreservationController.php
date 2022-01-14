<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Tourgroup;
use Illuminate\Http\Request;
use App\Models\Hotelreservation;
use Illuminate\Support\Facades\DB;

class HotelreservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $value = auth()->user()->id;

        $hotelreservations = Hotelreservation::with(['tourgroup'])
       ->whereHas('tourgroup', function($q) use($value) {
       // Query the name field in status table
       $q->where('user_id', '=', $value); // '=' is optional
        })
      
        ->get();
        return view('hotelreservations.index', compact('hotelreservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hotelreservations.create', ['tourgroups'=> Tourgroup::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes =  request()->validate([
            'hotel_city' => ['required', 'max:255'],
            'hotel_name' => ['required', 'max:255'],
            'checkin_date' => ['required', 'max:255'],
            'checkout_date' => ['required', 'max:255'],
            'early_checkin' => ['required', 'max:255'],
            'late_checkout' => ['required', 'max:255']
            

        ]);
        //dd($request->get('tour_id'));
        // $attributes['checkin_date'] = Carbon::createFromFormat('m/d/Y', $request->checkin_date)->format('Y-m-d');
        // $attributes['checkout_date'] = Carbon::createFromFormat('m/d/Y', $request->checkout_date)->format('Y-m-d');
        $attributes['tourgroup_id'] =$request->get('tour_id');
        Hotelreservation::create($attributes);
         session()->flash('success', 'Hotel reservation has been created');
         session()->flash('type', 'Hotel Reservation');

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
        // $hotelreservation->checkin_date = date('d/m/Y', strtotime($hotelreservation->checkin_date));
        // $hotelreservation->checkout_date = date('d/m/Y', strtotime($hotelreservation->checkout_date));
        
      // dd($hotelreservation->checkout_date);

        //dd(Tourgroup::all());
        $tourgroup = Hotelreservation::find($id)->tourgroup->tourgroup_name;
       // dd($tourgroup);
        return view('hotelreservations.edit')->with([
            'hotelres'=>$hotelreservation,
            'tourgroup' =>$tourgroup
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Hotelreservation $hotelreservation, Request $request)
    {
        // $hotelreservations = Hotelreservation::where('id', $id)->update([
        //     'hotel_city' => $request->input('hotel_city'),
        //     'hotel_name' => $request->input('hotel_name')
            
        // ]);

        $attributes =  request()->validate([
            'hotel_city' => ['required', 'max:255'],
            'hotel_name' => ['required', 'max:255'],
            'checkin_date' => ['required', 'max:255'],
            'checkout_date' => ['required', 'max:255'],
            'early_checkin' => ['required', 'max:255'],
            'late_checkout' => ['required', 'max:255']
            

        ]);
        
        // $attributes['checkin_date'] = Carbon::createFromFormat('m/d/Y', $request->checkin_date)->format('Y-m-d');
        // $attributes['checkout_date'] = Carbon::createFromFormat('m/d/Y', $request->checkout_date)->format('Y-m-d');
       // dd($attributes);
        $hotelreservation->update($attributes);
        
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