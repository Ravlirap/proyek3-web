<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\MealLogController;
use App\Http\Controllers\Api\ScanController;
use App\Http\Controllers\Api\WeeklyMonitoringController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', fn (Request $request) => $request->user());
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/foods', [FoodController::class, 'index']);

    Route::get('/meal-logs', [MealLogController::class, 'index']);
    Route::post('/meal-logs', [MealLogController::class, 'store']);

    Route::get('/weekly-monitoring', [WeeklyMonitoringController::class, 'index']);

    // Scan Food AI
    Route::post('/scan', [ScanController::class, 'scan']);
    Route::get('/scan/history', [ScanController::class, 'history']);
});
