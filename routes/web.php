<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/index', [DashboardController::class, 'index'])->name('index');
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/driver_page', [DriverController::class, 'index'])->name('driver_page');
Route::post('/drivers/update', [DriverController::class, 'update'])->name('drivers.update');
Route::delete('/drivers/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy');
