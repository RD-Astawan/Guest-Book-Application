<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kspp>
 */
class ksppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nip' => '102405',
            'nama_kabag' => $this->faker->name(),
            'jabatan' => 'CTO',
            'username' => $this->faker->userName(),
            'password' => '12345', // password
        ];
    }
}
