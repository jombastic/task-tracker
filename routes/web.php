<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', DashboardController::class);

    // Route::resource('tasks', TaskController::class);
    // Route::resource('categories', CategoryController::class);
});

Route::get('/', function(){
    return redirect()->route('login');
});
