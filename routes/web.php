<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [UserController::class, 'index'])->name('users.index');

Route::post('users-import', [UserController::class, 'import'])->name('users.import');

// users.edit
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

// users.destroy
Route::get('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');