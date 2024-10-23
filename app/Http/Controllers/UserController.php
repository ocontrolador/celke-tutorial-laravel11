<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar os registros do banco de dados
        $users = User::all();

        // Retornar os registros para a view
        return view('users.index', ['users' => $users]);
    }

    /**
     * Importar CSV para o banco de dados na tabela 'users'
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048',
        ], [
            'file.mimes' => 'O arquivo deve ser do tipo CSV',
            'file.max' => 'O arquivo deve ter no máximo 2 MB',
            'file.required' => 'O arquivo é obrigatório',
        ]);

        $dataFile = array_map('str_getcsv', file($request->file('file')));

        $registros = 0;
        $erros = [];

        foreach ($dataFile as $row) {
            $keys = ['name', 'email', 'password'];
            $values = explode(';', $row[0]);

            $users = array_combine($keys, $values);

            $validator = \Validator::make($users, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ], [    
                'name.required' => 'O nome é obrigatório',
                'email.required' => 'O e-mail é obrigatório',
                'email.email' => "O e-mail ({$users['email']}) é inválido",
                'email.unique' => "O e-mail ({$users['email']}) já está em uso",
                'password.required' => 'A senha é obrigatória',
                'password.min' => 'A senha deve ter pelo menos 6 caracteres',
            ]);

            if ($validator->fails()) {
                $erros[] = $validator->errors()->first();                
                //dd($users,$validator->errors());
                continue;
            }   

            $users['password'] = bcrypt($users['password']);

            $user = User::create($users);
            $user->save();
            $registros++;            
        }

        
        if ($registros == 0) 
            return redirect()->route('users.index')
                ->with('success', 'Nenhum registro importado!')
                ->withErrors($erros);

        if ($registros == 1)
            return redirect()->route('users.index')
                ->with('success', $registros . ' Usuário importado com sucesso!')
                ->withErrors($erros);
        
        return redirect()->route('users.index')
                ->with('success', $registros . ' Usuários importados com sucesso!')
                ->withErrors($erros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Excluir o registro
        $user = User::find($id);
        $user->delete();

        // Redirecionar para a listagem de usuários
        return redirect()->route('users.index');
    }
}
