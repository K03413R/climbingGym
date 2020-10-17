<?php

use App\Http\Controllers\TicksController;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Route\IndexRoutes;
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

//Redirects
Route::get('/', function () {
    if(auth()->user()){
        return redirect('routes');
    } else {
        return view('welcome');
    }
});

// Routes
Route::get('/routes', IndexRoutes::class)->middleware(['auth:sanctum', 'verified'])->name('routes');
Route::post('/routes/{route}/ticks', [TicksController::class, 'store'])->middleware(['auth:sanctum', 'verified'])->name('ticks');

//Dashboard
Route::get('/dashboard', Dashboard::class)->middleware(['auth:sanctum', 'verified'])->name('dashboard');
