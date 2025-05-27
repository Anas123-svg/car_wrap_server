<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CampaignController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [UserController::class, 'getUser']);
    Route::put('/user', [UserController::class, 'update']);
    Route::delete('/user', [UserController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
    Route::post('/campaigns/token/apply', [CampaignController::class, 'applyCampaignWithtoken']);
    Route::get('/campaigns/token/user', [CampaignController::class, 'getCampaignsByToken']);
});

Route::get('/campaigns/user', [CampaignController::class, 'getCampaignsByUserId']);
Route::get('/campaigns', [CampaignController::class, 'index']);
Route::post('/campaigns/apply', [CampaignController::class, 'applyCampaignWithUserId']);
