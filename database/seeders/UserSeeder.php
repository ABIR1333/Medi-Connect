<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Crée 10 utilisateurs
        User::factory()->count(10)->create();
        
        // Si tu veux créer un utilisateur spécifique, tu peux aussi le faire comme ceci :
        // User::factory()->create([
        //     'name' => 'Admin User',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('adminpassword'),  // S'assurer que le mot de passe est sécurisé
        // ]);
    }
}

