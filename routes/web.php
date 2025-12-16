<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])
        ->name('dashboard.index');

    // Route::resource('tasks', TaskController::class);
    // Route::resource('categories', CategoryController::class);
});
