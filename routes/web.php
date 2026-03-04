<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
    Route::get('/login', [UserController::class, 'showLogin'])->name('show.login');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'showRegister'])->name('show.register');
    Route::post('/register', [UserController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/', [TaskController::class, 'index'])->name('dashboard');
    Route::get('/tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('show.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('store');
    Route::get('/tasks/view/{task}', [TaskController::class, 'view'])->name('task.show');
    Route::post('/tasks/complete/{task}', [TaskController::class, 'mark_as_completed'])->name('task.complete');
    Route::delete('/tasks/delete/{task}', [TaskController::class, 'delete'])->name('task.delete');
    // Route::resource('tasks', TaskController::class);
});
