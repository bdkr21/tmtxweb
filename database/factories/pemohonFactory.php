<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use Illuminate\Support\Str;

class pemohonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'dob' => $this->faker->date,
            'area' => $this->faker->address,
            'noSC' => $this->faker->unique()->randomNumber(),
            'noKTP' => $this->faker->unique()->randomNumber(),
            'agency' => $this->faker->company,
            'namaAtasan' => $this->faker->name,
            'tanggalPengajuan' => $this->faker->date,
            'noTelpAtasan' => $this->faker->phoneNumber,
            'nominalPermohonan' => $this->faker->randomNumber(6), // Adjust the argument as needed
            'role' => $this->faker->word, // Change to a suitable field type
            'pencairanTahap1' => $this->faker->randomNumber(6), // Adjust the argument as needed
            'pencairanTahap2' => $this->faker->randomNumber(6), // Adjust the argument as needed
            'totalDiterima' => $this->faker->randomNumber(6), // Adjust the argument as needed
        ];
    }
}
