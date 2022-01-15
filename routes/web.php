<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TourgroupController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\HotelreservationController;

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

    Route::get('/', [RegisterController::class, 'loginForm'])->name('loginForm');
Route::post('/', [RegisterController::class, 'login'])->name('login');


Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::resources([
        'hotelreservations' => HotelreservationController::class,
        'transports' => TransportController::class,
        'tourgroups' => TourgroupController::class,
    
    ]);
    
});

Route::resource('users', UserController::class)->middleware(['can:admin','revalidate']);

