<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pinto',  // Nom de l'utilisateur
            'email' => 'Pinto@gmail.com',  // Email de l'utilisateur
            'password' => Hash::make('0000'),  // Mot de passe
        ]);
    }
}
