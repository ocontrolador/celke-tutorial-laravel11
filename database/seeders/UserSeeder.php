<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // array de usuario para criar
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Guest',
                'email' => 'guest@example.com',
                'password' => bcrypt('123456'),
            ],
        ];

        // valida e cria os usuários
        foreach ($users as $user) {
            if (User::where('email', $user['email'])->exists())
                continue;            
            User::create($user);
        }

        // cria 10 usuários aleatórios
        User::factory(10)->create();  

    }
}
