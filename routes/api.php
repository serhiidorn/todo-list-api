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
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{task}', 'update')->can('manage', 'task');
        Route::patch('/{task}/complete', 'complete')->can('manage', 'task');
        Route::delete('/{task}', 'destroy')->can('manage', 'task');
    });
});
