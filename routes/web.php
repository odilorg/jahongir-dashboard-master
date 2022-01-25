<?php

use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TourgroupController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HotelreservationController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Models\Inventory;

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
        'guides' => GuideController::class,
        'restaurants' => RestaurantController::class,
        'tickets' => TicketController::class,
        'products' => ProductController::class,
        'invnetories' => InventoryController::class,
    
    ]);
    // Route::post('/transports/auto', [TransportController::class, 'auto'])->name('auto');
    // Route::post('/transports/air', [TransportController::class, 'air'])->name('air');
    // Route::post('/transports/train', [TransportController::class, 'train'])->name('train');    
    
});

Route::resource('users', UserController::class)->middleware(['can:admin','revalidate']);
Route::get('/status', [TourgroupController::class, 'status'])->name('tourgroups_status');

