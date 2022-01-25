<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cargo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cargos = Cargo::paginate(13);
       
     
        // dd($products);
            
           return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cargos.create');
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

            'cargo_arrival_date' => ['required ', 'max:255'],
            'total_cargo_weight' => ['required','numeric'],
            'cargo_total_sum' => ['required','numeric'],
            'cargo_extra_info' => ['max:255'],
            
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['cargo_arrival_date'] = Carbon::createFromFormat('m/d/Y', $request->cargo_arrival_date)->format('Y-m-d');
        Cargo::create($attributes);
        session()->flash('success', 'Cargo kiritildi');
        session()->flash('type', 'Yangi Cargo');

       return redirect('cargos'); 
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
    public function edit(Cargo $cargo)
    {
        // $tourgroup_name = $ticket->tourgroup->tourgroup_name;
       // $tourgroups = Tourgroup::with('user')->whereUserId(Auth::user()->id)->get();
        return view('cargos.edit', compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cargo $cargo)
    {
        
        $attributes =  request()->validate([

            'cargo_arrival_date' => ['required ', 'max:255'],
            'total_cargo_weight' => ['required','numeric'],
            'cargo_total_sum' => ['required','numeric'],
            'cargo_extra_info' => ['max:255'],
            
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['cargo_arrival_date'] = Carbon::createFromFormat('m/d/Y', $request->cargo_arrival_date)->format('Y-m-d');
        $cargo->update($attributes);
        
        return redirect('cargos');
        
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cargo $cargo)
    {
        $cargo->delete();
        return redirect('cargos');
    }
}
