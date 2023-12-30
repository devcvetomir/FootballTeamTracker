<?php

namespace Database\Seeders;

use App\Models\Team;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $teams = [
            'Real Madrid',
            'FC Barcelona',
            'Manchester United',
            'Sevigla',
            'Levski',
            'CSKA',
            'Ludogorec',
            'Liteks',
            'Slaviq',
        ];

        foreach ($teams as $team) {
            Team::create(['name' => $team]);

        }
    }
}
