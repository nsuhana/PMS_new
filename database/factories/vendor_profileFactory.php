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
            'no_pendaftaran_syarikat' => $this->faker->phoneNumber,
            'maklumat_bank' => $this->faker->randomElement(['Maybank', 'CIMB', 'BSN', 'Bank Islam']),
            'no_akaun_kewangan' => $this->faker->phoneNumber,
            'kelas' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'bidang'  => $this->faker->paragraph(),
            'telefon' => $this->faker->phoneNumber,
            'faks' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
            'website' => $this->faker->url,
        ];
    }
}
