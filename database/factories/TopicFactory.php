<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'type' => $this->faker->text(5),
            'question' => $this->faker->text(50),
            'question_type' => $this->faker->randomElement(['TF', 'MC']),
            'answer' => $this->faker->numberBetween(1,6),
            'option_a' => $this->faker->text(10),
            'option_b' => $this->faker->text(10),
            'option_c' => $this->faker->text(10),
            'option_d' => $this->faker->text(10),
        ];
    }
}
