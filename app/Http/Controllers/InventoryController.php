<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::paginate(13);
        $inventories = Inventory::with(['cargo'])->paginate(13);
        // dd($inventories);
           return view('inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = Cargo::all();
        
        return view('inventories.create', compact('cargos'));
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

            'product_name' => ['required ', 'max:255'],
            'product_quantity' => ['required', 'numeric'],
            'product_price' => ['required', 'numeric'],
            
            'product_weight' => ['required', 'numeric'],
            'inventory_extra_info' => ['max:255'],
            'cargo_id' => ['required', 'max:10'],
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['product_price_total'] =  $attributes['product_price'] * $attributes['product_quantity'];
        $attributes['product_total_weight'] =  $attributes['product_weight'] * $attributes['product_quantity'];
       // dd($attributes); 
        Inventory::create($attributes);
        session()->flash('success', 'Maxsulot yaratildi');
        session()->flash('type', 'Yangi Maxsulot');

       return redirect('inventories'); 
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
    public function edit(Inventory $inventory)
    {
        $cargo_date = $inventory->cargo->cargo_arrival_date;
        $cargos = Cargo::all();
        return view('inventories.edit', compact('inventory', 'cargo_date', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $attributes =  request()->validate([

            'product_name' => ['required ', 'max:255'],
            'product_quantity' => ['required', 'numeric'],
            'product_price' => ['required', 'numeric'],
            
            'product_weight' => ['required', 'numeric'],
            'inventory_extra_info' => ['max:255'],
            'cargo_id' => ['required', 'max:10'],
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['product_price_total'] =  $attributes['product_price'] * $attributes['product_quantity'];
        $attributes['product_total_weight'] =  $attributes['product_weight'] * $attributes['product_quantity'];
        $inventory->update($attributes);
        session()->flash('success', 'Sklad ozgartrildi');
        session()->flash('type', 'Sklad');
 
        
        return redirect('inventories');
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
