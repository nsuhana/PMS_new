<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_pembekal_dilantik' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['0', '1']),
        ];
    }
}
