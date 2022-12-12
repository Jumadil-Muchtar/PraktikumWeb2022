<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Nama' => $this->faker->name(),
            'Nim' => $this->faker->phoneNumber(),
            'Alamat' => $this->faker->addres(),
            'Fakultas' => $this->faker->company(),
        ];
    }
}
