<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Team;

class PlayerFactory extends Factory
{


    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'position' => $this->faker->randomElement(['Goalkeeper', 'Defender', 'Midfielder', 'Forward', 'Useless', 'Injured']),
            'age' => $this->faker->numberBetween(18, 35),
            'nationality' => $this->faker->country,
            'goals_season' => $this->faker->numberBetween(0, 20),
            'team_id' => Team::factory()->create()->id, // Assign a random team
        ];
    }
}
