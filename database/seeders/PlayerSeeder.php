<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\Team;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $teams = Team::all();

        foreach (range(1, 50) as $index) {
            $playerData = [
                'name' => $faker->name,
                'position' => $faker->randomElement(['Forward', 'Midfielder', 'Defender', 'Goalkeeper']),
                'age' => $faker->numberBetween(18, 40),
                'nationality' => $faker->country,
                'goals_season' => $faker->numberBetween(0, 20),
                'team_id' => $teams->random()->id,
            ];

            Player::create($playerData);
        }
    }
}
