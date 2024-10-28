<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    /**
     * Retorna todos os usuários em ordem decrescente por id
     * e paginado por 2 registros no formato JSON
     *
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        // recuperar os usuários em ordem decrescente por id e paginar por 2 registros
        $users = User::orderBy('id', 'desc')->paginate(2);
        
        // retornar os usuários em formato JSON
        return response()->json([
            'status' => true,
            'users' => $users,
            'message' => $users->count() . ' Usuários listados com sucesso'
        ], 200);
    }
}
