<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineRecordFactory extends Factory
{
    private static $counter = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'case_id' => '1',
            'date' => $this->faker->date('Y_m_d'),
            'course' => 'Cycle' . self::$counter++,
            'type' => '藥物' . '-' . strtoupper($this->faker->randomLetter()),
            'dose' => $this->faker->numberBetween(1, 999) . ' mg',
        ];
    }
}
