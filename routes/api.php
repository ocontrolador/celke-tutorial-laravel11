<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// get users - http://localhost:8000/api/users?page=2
Route::get('/users', [UserController::class, 'index']);
// get user - http://localhost:8000/api/users/1
Route::get('/user/{user}', [UserController::class, 'show']);
