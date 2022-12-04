<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => substr(Str::upper(fake()->unique()->bothify('?##########')), 0, 9),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'fakultas' => fake()->randomElement([
                'Fakultas Teknik',
                'Fakultas Matematika dan Ilmu Pengetahuan Alam',
                'Fakultas Ekonomi Bisnis',
                'Fakultas Hukum',
                'Fakultas Ilmu Sosial Politik',
                'Fakultas Ilmu Budaya',
                'Fakultas Kedokteran',
                'Fakultas Kedokteran Gigi',
                'Fakultas Kesehatan Masyarakat',
                'Fakultas Farmasi',
                'Fakultas Keperawatan',
                'Fakultas Pertanian',
                'Fakultas Peternakan',
                'Fakultas Ilmu Kelautan dan Perikanan',
                'Fakultas Kehutanan',
            ]),
        ];
    }
}
