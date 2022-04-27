<?php

namespace Database\Factories;
use App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vendor_id' => vendor::inRandomOrder()->where('status', '1')->first()->id,
            'tajuk_projek' => $this->faker->bs(),
            'pemilik_projek' => $this->faker->name(),
            'rujukan_projek' => 'samplePDF.pdf',
            'kos_projek_sebelum_sst' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'kos_projek_selepas_sst' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'bon_pelaksanaan_projek' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'tempoh_mula_kontrak' => now(),
            'tempoh_tamat_kontrak' => now(),
            'skop_projek' => $this->faker->randomElement(['pembekalan', 'perkhidmatan']),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif', 'selesai']),
            'publish' => $this->faker->randomElement(['0', '1']),
            'description' => $this->faker->paragraph(),
        ];
    }
}
