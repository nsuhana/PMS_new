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
            'pengurus_projek' => $this->faker->name(),
            'rujukan_kontrak' => 'samplePDF.pdf',
            'kos_kontrak_tidak_termasuk_caj_perkhidmatan' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'kos_kontrak_termasuk_caj_perkhidmatan' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'bon_pelaksanaan_projek' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = NULL),
            'tempoh_sah_bon' => now(),
            'tempoh_mula_kontrak' => now(),
            'tempoh_tamat_kontrak' => now(),
            'skop_projek' => $this->faker->randomElement(['pembekalan', 'perkhidmatan']),
            'status' => $this->faker->randomElement(['ikut jadual', 'dalam perlaksanaan','projek lewat', 'projek sakit']),
            'publish' => $this->faker->randomElement(['0', '1']),
            'description' => $this->faker->paragraph(),
        ];
    }
}
