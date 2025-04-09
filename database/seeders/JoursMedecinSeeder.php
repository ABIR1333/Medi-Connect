<?php
// database/seeders/JoursMedecinSeeder.php
use App\Models\JoursMedecin;
use App\Models\Doctor;
use Illuminate\Database\Seeder;

class JoursMedecinSeeder extends Seeder
{
    public function run(): void
    {
        User::all()->each(function ($doctor) {
            // Chaque médecin travaille 2 à 4 jours
            $jours = collect(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'])->random(rand(2, 4));
            foreach ($jours as $jour) {
                JoursMedecin::factory()->create([
                    'medecin_id' => $doctor->id,
                    'jour' => $jour,
                ]);
            }
        });
    }
}

