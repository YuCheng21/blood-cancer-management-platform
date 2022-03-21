<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'case_id' => '1',
            'type' => '藥物' . '-' . strtoupper($this->faker->randomLetter()),
            'start_date' => $this->faker->date('Y_m_d'),
            'end_date' => $this->faker->date('Y_m_d'),
            'dose' => $this->faker->numerify('### mg'),
        ];
    }
}
