<?php

namespace Database\Factories;

use App\Models\CouvertureSante;
use Illuminate\Database\Eloquent\Factories\Factory;

class CovertureSanteFactory extends Factory
{
    protected $model = CouvertureSante::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->randomElement(['CNSS', 'RAMED', 'CNOPS', 'AXA', 'Wafa Assurance']),  // Exemples de couverture
            'numero' => $this->faker->unique()->numerify('##########'),  // Numéro unique de couverture
        ];
    }
}

