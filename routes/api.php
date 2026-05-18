<?php

use App\Http\Controllers\Api\Admin\ClientController;
use App\Http\Controllers\Api\Admin\MessageController;
use App\Http\Controllers\Api\Admin\ProjectController;
use App\Http\Controllers\Api\Admin\ServiceController;
use App\Http\Controllers\Api\Admin\StatController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PublicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public API
|--------------------------------------------------------------------------
*/
Route::get('/stats',    [PublicController::class, 'stats']);
Route::get('/services', [PublicController::class, 'services']);
Route::get('/projects', [PublicController::class, 'projects']);
Route::get('/clients',  [PublicController::class, 'clients']);
Route::post('/contact', [PublicController::class, 'contact']);

/*
|--------------------------------------------------------------------------
| Admin Auth
|--------------------------------------------------------------------------
*/
Route::post('/admin/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Admin (Sanctum protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me',      [AuthController::class, 'me']);

    Route::get('/messages/summary', [MessageController::class, 'summary']);
    Route::apiResource('stats',    StatController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('clients',  ClientController::class);
    Route::apiResource('messages', MessageController::class)->only(['index', 'show', 'update', 'destroy']);
});
