<?php

namespace App\Http\Controllers;

use ArrayIterator;
use MultipleIterator;
use App\Models\Itinarary;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    //dd($transports[0]->driver_name);
        return view('transports.index', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transports.create');
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
        (Transport::create($attributes));
        $attributes2 =  request()->validate([
            'pickup_or_dropoff_or_marshrut' => ['required'],
             'pickup_or_dropoff_date_time' => ['required'],
             'pickup_or_dropoff_from' => ['required'],
             'pickup_or_dropoff_to' => ['required'],
             'driver_name' => ['required'],
             'driver_tel' => ['required'],
            
        ]);
       
        // $requestData = collect($request->only('names', 'emails', 'occupations'));

        // $contacts = $requestData->transpose()->map(function ($contactData) {
        //     return new Contact([
        //         'name' => $contactData[0],
        //         'email' => $contactData[1],
        //         'occupation' => $contactData[2],
        //     ]);
        // });
    
        // Auth::user()->contacts()->saveMany($contacts);
        

    //     $requestData = collect($request->only('pickup_or_dropoff_or_marshrut', 'pickup_or_dropoff_date_time'));
    //     //dd($requestData );
    //     $itinarary = $requestData->transpose()->map(function ($itinararyData) {
    //         return new Itinarary([
    //             'pickup_or_dropoff_or_marshrut' => $itinararyData[0],
    //             'pickup_or_dropoff_date_time' => $itinararyData[1],

    //         ]);
    //     });
    //    // dd($itinarary);
    // $itin = new Itinarary();
   
    


    // $addressesInput = $request->get('pickup_or_dropoff_date_time');
    // $addresses = [];
    
    // foreach($addressesInput as $address)
    // {
    //     $addresses[] = new Itinarary($address);
    // }
    // dd($addresses);
    // $itin->addresses()->saveMany($addresses);
    //   $itin->itinarary()->createMany($itinarary);

    //    dd($itin);
    (Itinarary::create($attributes2));
       // dd($tran->driver_name[0]);
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
    public function destroy($id)
    {
        //
    }
}
