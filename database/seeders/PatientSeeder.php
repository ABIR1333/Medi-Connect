<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
  // database/seeders/PatientSeeder.php

    public function run(): void
    {
        Patient::factory()->count(20)->create();
    }
}

