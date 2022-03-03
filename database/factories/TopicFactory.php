<?php

namespace Database\Factories;

use App\Models\Task;
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
        $task_list = Task::select('id')->get()->map(function ($var){
            return $var->id;
        })->toArray();
        $question_type = $this->faker->randomElement(['true-false', 'multiple-choice']);
        $answer = function () use ($question_type) {
            if ($question_type == 'true-false'){
                return $this->faker->numberBetween(1,2);
            }elseif ($question_type == 'multiple-choice'){
                return $this->faker->numberBetween(3,6);
            }
        };
        return [
            'task_id' => $this->faker->randomElement($task_list),
            'question' => $this->faker->text(50),
            'question_type' => $question_type,
            'answer' => $answer,
            'option_a' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
            'option_b' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
            'option_c' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
            'option_d' => $question_type == 'multiple-choice' ? $this->faker->text(10) : null,
        ];
    }
}
