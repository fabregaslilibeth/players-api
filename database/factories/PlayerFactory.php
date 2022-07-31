<?php

namespace Database\Factories;

use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'second_name' => $this->faker->lastName(),
            'form' => mt_rand(.1, 10),
            'total_points' => mt_rand(20, 500),
            'influence' => mt_rand(.1, 10),
            'creativity' => mt_rand(.1, 10),
            'threat' => mt_rand(.1, 10),
            'ict_index' => mt_rand(.1, 10),
        ];
    }
}
