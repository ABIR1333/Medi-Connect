<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtatAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
// database/seeders/EtatAppointmentSeeder.php

    public function run(): void
    {
        $libelles = ['en attente', 'confirmé', 'annulé', 'reporté'];
        foreach ($libelles as $libelle) {
            EtatAppointment::create(['libelle' => $libelle]);
        }
    }
}
