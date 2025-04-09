<?php

namespace Database\Seeders;

use App\Models\CouvertureSante;
use Illuminate\Database\Seeder;

class CovertureSanteSeeder extends Seeder
{
    public function run(): void
    {
        // Crée 10 enregistrements de couvertures de santé
        CovertureSante::factory()->count(10)->create();
    }
}
