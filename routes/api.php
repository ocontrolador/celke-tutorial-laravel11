<?php

use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/users', function (Request $request) {
    return response()->json([
        'status' => true,
        'mensagem' => 'Usuário listado com sucesso'
    ], 200);
}); */

// get users - http://localhost:8000/api/users?page=2
Route::get('/users', [UserController::class, 'index']);
