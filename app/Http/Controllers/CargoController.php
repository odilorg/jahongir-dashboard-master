<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cargo;

use App\Models\Inventory;
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
            'margin_cargo' => ['required', 'numeric'],
            
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
    public function show(Cargo $cargo)
    {
        
        $cargos = Inventory::join('cargos', 'inventories.cargo_id', '=', 'cargos.id')
            ->join('products', 'inventories.product_id', '=', 'products.id')
            ->where('cargos.id',$cargo->id)
            
            ->select([
                'inventories.*',
                'products.*',
                'cargos.*',
                             ])
                                         
            ->get();
             
        $sum_cargos = Inventory::join('cargos', 'inventories.cargo_id', '=', 'cargos.id')
        ->join('products', 'inventories.product_id', '=', 'products.id')
        ->where('cargos.id',$cargo->id)
        
        ->sum('inventories.product_total_weight');
                                     
        
//calculations

$i=-1;
foreach ($cargos as $cargo) {
    $i=$i+1;
$perc[$i] = $cargo->product_total_weight / $sum_cargos * 100;
$cargo_add[$i] = $perc[$i] * $cargo->cargo_total_sum / 100;
$product_cargo_add[$i] = ($cargo->product_price + $cargo_add[$i]);
}
foreach($cargos as $object)
{
    $cargos_items[] = $object->toArray();
    
}

// $assoc = array();
//dd($product_cargo_add);
//kurs from cbu Uz + 100 som
$url = 'https://cbu.uz/ru/arkhiv-kursov-valyut/json/USD/'.now();
$json = file_get_contents($url);
$kurs_dol = json_decode($json);
$kurs_dol =  floatval($kurs_dol[0]->Rate) + 100;

foreach ($product_cargo_add as $i=>$value) {
    $rr = array('sell_price' => $value);
    $qq = array('sell_price_uzs' =>  $value * $kurs_dol); 
    $w[] = array_merge($cargos_items[$i], $rr, $qq  );
}


//dd($jo[0]->Rate);




            return view('cargos.show', compact('w', 'cargo', 'kurs_dol'));
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
            'margin_cargo' => ['required', 'numeric'],
            
        ]);
        $attributes['user_id'] = auth()->user()->id;
        $attributes['cargo_arrival_date'] = Carbon::createFromFormat('d/m/Y', $request->cargo_arrival_date)->format('Y-m-d');
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
