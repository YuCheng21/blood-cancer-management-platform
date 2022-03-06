<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BloodComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'case_id' => 1,
            'wbc' => $this->faker->numberBetween(0, 999),
            'hb' => $this->faker->numberBetween(0, 999),
            'plt' => $this->faker->numberBetween(0, 999),
            'got' => $this->faker->numberBetween(0, 999),
            'gpt' => $this->faker->numberBetween(0, 999),
            'cea' => $this->faker->numberBetween(0, 999),
            'ca153' => $this->faker->numberBetween(0, 999),
            'bun' => $this->faker->numberBetween(0, 999),
        ];
    }
}
