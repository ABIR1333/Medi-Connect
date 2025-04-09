<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EtatAppointment>
 */
class EtatAppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
// database/factories/EtatAppointmentFactory.php
public function definition(): array
{
    return [
        'libelle' => $this->faker->randomElement(['en attente', 'confirmé', 'annulé', 'reporté']),
    ];
}
}
