<?php

use App\Http\Controllers;
use App\Models;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])
        ->name('dashboard.index');

    Route::resource('categories', Controllers\CategoryController::class)
        ->middlewareFor('index', 'can:viewAny,App\Models\Category')
        ->middlewareFor('create', 'can:create,App\Models\Category')
        ->middlewareFor('store', 'can:create,App\Models\Category')
        ->middlewareFor('edit', 'can:update,category')
        ->middlewareFor('update', 'can:update,category')
        ->middlewareFor('destroy', 'can:delete,category')
        ->except('show');
});
