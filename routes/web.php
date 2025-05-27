<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CampaignAssignedToUser;

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

Route::get('/', [DashboardController::class, 'login'])->name('login');
Route::get('/index', [DashboardController::class, 'index'])->name('index');
Route::get('/drivers', [DriverController::class, 'index'])->name('drivers.index');
Route::get('/driver_page', [DriverController::class, 'index'])->name('driver_page');
Route::post('/drivers/update', [DriverController::class, 'update'])->name('drivers.update');
Route::delete('/drivers/{id}', [DriverController::class, 'destroy'])->name('drivers.destroy');


Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/add-campaigns', [CampaignController::class, 'add'])->name('campaigns.add');

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index');
Route::post('/campaigns/store', [CampaignController::class, 'store'])->name('campaigns.store');
Route::get('show/campaign/{id}', [CampaignController::class, 'show'])->name('campaigns.show');
Route::put('/campaign-assigned/update-status/{id}', [CampaignAssignedToUser::class, 'updateStatus'])->name('campaign-assigned.update-status');
Route::delete('/campaign-assigned/{id}', [CampaignAssignedToUser::class, 'destroy'])->name('campaign-assigned.destroy');
Route::get('show/update/campaign/{id}', [CampaignController::class, 'updateShow'])->name('campaigns.show');
Route::put('update/campaign/{id}', [CampaignController::class, 'update'])->name('campaigns.update');
Route::delete('/campaigns/{id}', [CampaignController::class, 'delete'])->name('campaigns.delete');


Route::get('/admin', [AdminController::class, 'index'])->name('admins.index');
Route::get('add/admin', [AdminController::class, 'add']);
Route::post('/admin/store', [AdminController::class, 'store'])->name('admins.store');


Route::post('admin/login', [AdminController::class, 'login'])->name('admin.login.submit');

Route::delete('/admins/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admins.destroy');
Route::get('admin/settings', [AdminController::class, 'settings'])->name('admin.settings');




Route::put('/admins/{admin}', [AdminController::class, 'update'])->name('admins.update');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
