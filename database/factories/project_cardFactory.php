<?php

namespace Database\Factories;
use App\Models\project;

use Illuminate\Database\Eloquent\Factories\Factory;

class project_cardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => project::inRandomOrder()->first()->id,
            'tajuk_besar'=> $this->faker->bs(),
            'content' => $this->faker->paragraphs(10, true),
            'publish' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
