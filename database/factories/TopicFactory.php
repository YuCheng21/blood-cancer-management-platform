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
        $question_type = $this->faker->randomElement(['true-false', 'multiple-choice']);
        return [
            'type' => $this->faker->text(5),
            'question' => $this->faker->text(50),
            'question_type' => $question_type,
            'answer' => $this->faker->numberBetween(1,6),
            'option_a' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
            'option_b' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
            'option_c' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
            'option_d' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
        ];
    }
}
