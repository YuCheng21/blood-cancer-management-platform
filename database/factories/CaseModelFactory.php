<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CaseModelFactory extends Factory
{
    private static $transplant_num = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account' => $this->faker->word(),
            'password' => $this->faker->word(),
            'transplant_num' => 'N' . str_pad(self::$transplant_num++, 4, "0", STR_PAD_LEFT),
            'name' => $this->faker->firstName(),
            'gender_id' => $this->faker->randomElement([2, 3]),
            'birthday' => $this->faker->date('Y_m_d'),
            'date' => $this->faker->date('Y_m_d'),
            'transplant_type_id' => $this->faker->randomElement([2, 3]),
            'disease_type_id' => $this->faker->randomElement([2, 3, 4, 5, 6]),
            'disease_state_id' => $this->faker->randomElement([1, 2, 3, 4]),
            'disease_class_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
        ];
    }
}
