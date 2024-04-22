<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PilotSponsor>
 */
class PilotSponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pilot_id'=> $this->faker->numberBetween(1,20),
            'sponsor_id'=> $this->faker->numberBetween(1,40),
        ];
    }
}
