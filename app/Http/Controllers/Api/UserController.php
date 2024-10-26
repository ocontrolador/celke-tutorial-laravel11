<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{    
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(2);
        
        return response()->json([
            'status' => true,
            'users' => $users,
            'message' => $users->count() . ' Usuários listados com sucesso'
        ], 200);
    }
}
