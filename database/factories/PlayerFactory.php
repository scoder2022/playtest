<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Player;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'is_alive' => fake()->boolean(80),
            'is_knocked' => fake()->boolean(30),
            'eliminations' => fake()->numberBetween(0, 6),
            'in_blue_zone' => fake()->boolean(60),
        ];
    }
}
