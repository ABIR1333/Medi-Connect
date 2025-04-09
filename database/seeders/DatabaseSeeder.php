<?php

namespace Database\Seeders;

use App\Models\CovertureSante;
use App\Models\EtatAppointment;
use App\Models\EtatConsultation;
use App\Models\Role;
use App\Models\Service;
use App\Models\Specialite;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [
            ['role' => 'admin'],
            ['role' => 'reception'], 
            ['role' => 'medecin']
        ];

        foreach($roles as $role){
            Role::create($role);
        }

        User::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'email' => 'admin@admin',
            'password' => Hash::make('admin'),
            'telephone' => '0606060606',
            'role_id' => 1
        ]);

        $services = [
            ['service' => 'Gastro', 'couleur' => '#A0522D'],  // Sienna (darker brown)
            ['service' => 'Urgences', 'couleur' => '#B22222'],  // FireBrick (dark red)
            ['service' => 'Urologie', 'couleur' => '#00008B'],  // DarkBlue
            ['service' => 'Anesthésie', 'couleur' => '#B22222'],  // FireBrick (dark red)
            ['service' => 'Cardiologie', 'couleur' => '#8B0000'],  // DarkRed
            ['service' => 'Gynécologie', 'couleur' => '#800080'],  // Purple
            ['service' => 'Oncologie', 'couleur' => '#8B0000'],  // DarkRed
            ['service' => 'Traumatologie', 'couleur' => '#006400'],  // DarkGreen
            ['service' => 'Bloc opératoire', 'couleur' => '#8B4513'],  // SaddleBrown
            ['service' => 'Chirurgie générale', 'couleur' => '#8B0000'],  // DarkRed
            ['service' => 'Chirurgie vasculaire', 'couleur' => '#8B4513'],  // SaddleBrown
            ['service' => 'Chirurgie plastique', 'couleur' => '#A52A2A'],  // Brown
            ['service' => 'Chirurgie cardio-vasculaire', 'couleur' => '#8B0000'],  // DarkRed
            ['service' => 'Chirurgie infantile', 'couleur' => '#4682B4'],  // SteelBlue
            ['service' => 'Réanimation', 'couleur' => '#8B008B'],  // DarkMagenta
            ['service' => 'Neurochirurgie', 'couleur' => '#4B0082'],  // Indigo
            ['service' => 'Hémodialyse', 'couleur' => '#228B22'],  // ForestGreen
            ['service' => 'Néphrologie', 'couleur' => '#00008B'],  // DarkBlue
            ['service' => 'Hématologie', 'couleur' => '#8B0000'],  // DarkRed
            ['service' => 'Soins palliatifs', 'couleur' => '#A0522D'],  // Sienna (darker brown)
        ];

        // Sort specialties by name length in descending order (longest to shortest)
        usort($services, function ($a, $b) {
            return strlen($b['service']) - strlen($a['service']);
        });

        foreach ($services as $service) {
            Service::create($service);
        }

        $etats = [
            ['etat' => 'En attente', 'couleur' => '#FFA500'],  // Orange
            ['etat' => 'En cours', 'couleur' => '#1E90FF'],    // DodgerBlue
            ['etat' => 'Terminé', 'couleur' => '#32CD32'],     // LimeGreen
            ['etat' => 'Annulée', 'couleur' => '#FF0000'],     // Red
            ['etat' => 'Reportée', 'couleur' => '#FFD700'],    // Gold
            ['etat' => 'Non présent', 'couleur' => '#808080'], // Gray
        ];

        foreach ($etats as $etat) {
            EtatAppointment::create($etat);
        }

        $covertures= [
            ['coverture' => 'CNSS'],
            ['coverture' => 'AMO'],
            ['coverture' => 'CNOPS'],
            ['coverture' => 'PAYANT'],
            ['coverture' => 'RAMED_ETABLISSMENT_SOCIAL'],
            ['coverture' => 'MAFAR'],
            ['coverture' => 'CNOPS'],
            ['coverture' => 'CNSS'],
            ['coverture' => 'EN INSTANCE'],
        ];

        foreach ($covertures as $coverture) {
            CovertureSante::create($coverture);
        }
    }
}
