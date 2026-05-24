<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\Api\MealLogController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\ScanController;
use App\Http\Controllers\Api\WeeklyMonitoringController;
use App\Http\Controllers\API\FoodScanController;
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

    // Scan Food AI (legacy)
    Route::post('/scan', [ScanController::class, 'scan']);
    Route::get('/scan/history', [ScanController::class, 'history']);

    // Food Scan AI – FastAPI Integration
    Route::post('/food-scan', [FoodScanController::class, 'scan']);

    // Profile & Foto Profile (CRUD)
    Route::get('/profile', [ProfileController::class, 'index']);          // R - lihat profile
    Route::post('/upload-photo', [ProfileController::class, 'uploadPhoto']);  // C - upload foto
    Route::post('/profile/photo/update', [ProfileController::class, 'updatePhoto']); // U - update foto
    Route::delete('/profile/photo', [ProfileController::class, 'deletePhoto']); // D - hapus foto
    Route::put('/profile', [ProfileController::class, 'updateProfile']);   // update name/email
});
