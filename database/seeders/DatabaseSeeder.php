<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pilot;
use App\Models\PilotSponsor;
use App\Models\Team;
use App\Models\Sponsor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Team::factory(10)->create();
        // Sponsor::factory(40)->create();
        // Pilot::factory(20)->create();
        // PilotSponsor::factory(20)->create();

        $teams = [
            ['name' => 'Red Bull Racing'],
            ['name' => 'Ferrari'],
            ['name' => 'McLaren'],
            ['name' => 'Mercedes'],
            ['name' => 'Aston Martin'],
            ['name' => 'RB'],
            ['name' => 'Haas'],
            ['name' => 'Williams'],
            ['name' => 'Alpine'],
            ['name' => 'Kick Sauber'],
        ];

        foreach ($teams as $team) {
            $team = Team::create($team);
            $pilots = Pilot::factory(2)->create(['team_id' => $team->id]);
            $team->pilots()->saveMany($pilots);
        }

        Sponsor::factory(40)->create();

        Pilot::all()->each(function ($pilot) {
            $sponsors = Sponsor::inRandomOrder()->limit(2)->get();
            $pilot->sponsors()->sync($sponsors);
        });
    }
}
