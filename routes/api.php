<?php

use App\Http\Controllers\v1\Auth\AuthController;
use App\Http\Controllers\v1\Report\ReportController;
use App\Http\Controllers\v1\User\ClientController;
use App\Http\Controllers\v1\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::apiResource('/tourist', ClientController::class);
Route::apiResource('/user', UserController::class);
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/report', ReportController::class);
    Route::post('/logout', [AuthController::class, 'logout']);
});
