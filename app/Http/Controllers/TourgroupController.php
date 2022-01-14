<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tourgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TourgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        
     
    // dd($tourgroups);
       
      return view('tourgroups.index', compact('tourgroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tourgroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $attributes =  request()->validate([
            'tourgroup_name' => ['required', 'max:255'],
             'tourgroup_country' => ['required', 'max:255'],
             'tourgroup_pax' => ['required', 'numeric', 'max:255'],
             'tourgroup_ci' => ['required', 'max:255'],
             'tourgroup_co' => ['required', 'max:255'],
             'tourgroup_status' => ['required', 'max:255']
        ]);
        
        //dd($request->get('tour_id'));
        // $attributes['tourgroup_ci'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_ci)->format('Y-m-d');
        // $attributes['tourgroup_co'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_co)->format('Y-m-d');
    //    // $attributes['tourgroup_id'] =$request->get('tour_id');
    $attributes['user_id'] = auth()->user()->id; 
       (Tourgroup::create($attributes));
        
         session()->flash('success', 'Tour reservation has been created');
         session()->flash('type', 'Tour Reservation');
         

        return redirect('tourgroups');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Tour Reservcation - $id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tourgroup = Tourgroup::find($id);
        // $tourgroup->tourgroup_ci = date('d/m/Y', strtotime($tourgroup->tourgroup_ci));
        // $tourgroup->tourgroup_co = date('d/m/Y', strtotime($tourgroup->tourgroup_co));
        
      // dd($hotelreservation->checkout_date);

        //dd(Tourgroup::all());
       // $tourgroup = Hotelreservation::find($id)->tourgroup->tourgroup_name;
       // dd($tourgroup);
        return view('tourgroups.edit')->with([
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
    public function update(Tourgroup $tourgroup, Request $request)
    {
        $attributes =  request()->validate([
            'tourgroup_name' => ['required', 'max:255'],
             'tourgroup_country' => ['required', 'max:255'],
             'tourgroup_pax' => ['required','numeric', 'max:255'],
             'tourgroup_ci' => ['required', 'max:255'],
             'tourgroup_co' => ['required', 'max:255'],
             'tourgroup_status' => ['required', 'max:255']
        ]);
        // $attributes['tourgroup_ci'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_ci)->format('Y-m-d');
        // $attributes['tourgroup_co'] = Carbon::createFromFormat('m/d/Y', $request->tourgroup_co)->format('Y-m-d');
       // dd($attributes);
        $tourgroup->update($attributes);
        
        return redirect('tourgroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tourgroup $tourgroup)
    {
        $tourgroup->delete();
        return redirect('tourgroups');
    }
}
