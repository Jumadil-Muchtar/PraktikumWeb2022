<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\mahasiswa>
 */
class mahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $fakultas =['Mipa','Teknik', 'Kedokteran','Keperawatan', 'Feb',' Fib', 'Hukum'];
        return [
            'Nim' => $this->faker->unique()->regexify('[A-Z]{1}[0-9]{9}'),
            'Nama' => $this->faker->name(),
            'Alamat' => $this->faker->address(),
            'Fakultas' => $this->faker->randomElement(['Matematika dan ilmu pengetahuan alam','Teknik', 'Kedokteran','Keperawatan', 'Ekonomi dan Bisnis',' Ilmu Budaya', 'Hukum']),
        ];
    }
}
