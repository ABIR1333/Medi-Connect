<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * public function definition(): array  */

     public function definition(): array
     {
         return [
             'doctor_id' => \App\Models\User::factory(),
             'patient_name' => $this->faker->name(),
             'scheduled_at' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
             'status' => $this->faker->randomElement(['en attente', 'confirmé', 'annulé']),
         ];
     }
    }