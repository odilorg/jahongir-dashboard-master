<?php

namespace App\Http\Controllers;

use ArrayIterator;
use MultipleIterator;
use App\Models\Itinarary;
use App\Models\Tourgroup;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$transports = Transport::all();
        $transports = Transport::join('tourgroups', 'tourgroups.id', '=', 'transports.tourgroup_id')
              		->join('itinararies', 'itinararies.id', '=', 'transports.id')
              		->get(['transports.transport_type',
                            'tourgroups.tourgroup_name', 
                            'itinararies.driver_name',
                            'itinararies.driver_tel',
                            'tourgroups.tourgroup_ci',
                            'tourgroups.tourgroup_co',
                            'transports.car_make',
                            'transports.id',
                             
                        ]);
                      
       
        //dd($itinararies);
    //dd($transports);
        return view('transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        return view('transports.create', compact('tourgroups'));
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
            'transport_type' => ['required'],
             'auto_type' => ['required'],
             'car_extra_features' => ['required'],
            
        ]);
       // dd($attributes);
       $attributes['tourgroup_id'] =$request->get('tour_id');
        (Transport::create($attributes));
        $attributes2 =  request()->validate([
            'pickup_or_dropoff_or_marshrut' => ['required'],
             'pickup_or_dropoff_date_time' => ['required'],
             'pickup_or_dropoff_from' => ['required'],
             'pickup_or_dropoff_to' => ['required'],
             'driver_name' => ['required'],
             'driver_tel' => ['required'],
            
        ]);
       
       

    //    dd($itin);
    
    (Itinarary::create($attributes2));
       // dd($tran->driver_name[0]);
       return redirect('transports');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itinarary = Itinarary::findOrFail($id);
        $mi = new MultipleIterator();
$mi->attachIterator(new ArrayIterator($itinarary['pickup_or_dropoff_or_marshrut']));
$mi->attachIterator(new ArrayIterator($itinarary['pickup_or_dropoff_date_time']));
$mi->attachIterator(new ArrayIterator($itinarary['pickup_or_dropoff_from']));
$mi->attachIterator(new ArrayIterator($itinarary['pickup_or_dropoff_to']));
$mi->attachIterator(new ArrayIterator($itinarary['driver_name']));
$mi->attachIterator(new ArrayIterator($itinarary['driver_tel']));

       
      //  $itinarary = array_merge($itinarary['driver_name'],$itinarary['pickup_or_dropoff_or_marshrut']);
    //  dd($mi);
       return view('transports.show', compact('mi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
    public function destroy(Transport $transport)
    {
        //dd('delete');
        $transport->delete();
        return redirect('transports');
    }
}
