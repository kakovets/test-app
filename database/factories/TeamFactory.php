<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;
use App\Models\Pilot;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->company,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Team $team) {
            $team->pilots()->saveMany(Pilot::factory()->count(2)->create(['team_id' => $team->id]));
        });
    }
}
