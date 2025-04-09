<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JoursMedecin>
 */
class JoursMedecinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   // database/factories/JoursMedecinFactory.php
public function definition(): array
{
    return [
        'medecin_id' => \App\Models\User::factory(), 
        'jour' => $this->faker->randomElement(['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi']),
        'heure_debut' => $this->faker->time('H:i'),
        'heure_fin' => $this->faker->time('H:i'),
    ];
}

}
