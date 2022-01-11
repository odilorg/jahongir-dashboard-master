<?php

namespace App\Http\Controllers;

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
    //   /  dd($transports);
        return view('transports.index', [
            'transports' => $transports,
          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
