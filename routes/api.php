<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->name('login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('tasks')->controller(TaskController::class)->group(function () {
        Route::post('/', 'store');
        Route::put('/{task}', 'update');
        Route::patch('/{task}/complete', 'complete');
        Route::delete('/{task}', 'destroy');
    });
});
