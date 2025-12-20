<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [Controllers\DashboardController::class, 'index'])
        ->name('dashboard.index');

    Route::resource('tasks', Controllers\TaskController::class)
        ->middlewareFor('index', 'can:viewAny,App\Models\Task')
        ->middlewareFor('create', 'can:create,App\Models\Task')
        ->middlewareFor('store', 'can:create,App\Models\Task')
        ->middlewareFor('edit', 'can:update,Task')
        ->middlewareFor('update', 'can:update,Task')
        ->middlewareFor('destroy', 'can:delete,Task')
        ->except('show');

    Route::patch(
        'tasks/{task}/toggle-complete',
        [Controllers\TaskController::class, 'toggleComplete']
    )->name('tasks.toggle-complete');

    Route::resource('categories', Controllers\CategoryController::class)
        ->middlewareFor('index', 'can:viewAny,App\Models\Category')
        ->middlewareFor('create', 'can:create,App\Models\Category')
        ->middlewareFor('store', 'can:create,App\Models\Category')
        ->middlewareFor('edit', 'can:update,category')
        ->middlewareFor('update', 'can:update,category')
        ->middlewareFor('destroy', 'can:delete,category')
        ->except('show');
});
