<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class vendor_profileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'telefon' => $this->faker->phoneNumber, 
            'faks' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
            'website' => $this->faker->url,
        ];
    }
}
