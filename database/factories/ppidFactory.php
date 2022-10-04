<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ppid>
 */
class ppidFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_petugas' => 'P001',
            'nip' => '001001',
            'nama_petugas' => $this->faker->name(),
            'jabatan' => 'CEO',
            'username' => $this->faker->userName(),
            'password' => '12345', // password
        ];
    }
}
