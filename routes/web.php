<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin.index');
});

Route::get('/test', function() {
    $pizzas = [
        ['type' => 'crunchi', 'price' => '10', 'base'=> 'cheese' ],
        ['type' => 'bunchi', 'price' => '8', 'base'=> 'veggy' ],
        ['type' => 'munchi', 'price' => '9', 'base'=> 'garlic' ]
    ];

    return view('test', ['pizzas' => $pizzas]);
});
