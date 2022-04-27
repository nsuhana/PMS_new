<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'superuser' => $this->faker->randomElement(['0', '1']),
            'admin' => $this->faker->randomElement(['0', '1']),
            'staffuser' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
