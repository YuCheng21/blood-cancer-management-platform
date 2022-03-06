<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CaseTaskFactory extends Factory
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
            'case_id' => 1,
            'task_id' => self::$counter++,
            'week' => $this->faker->numberBetween(1, 12),
            'start_at' => $this->faker->date('Y-m-d'),
            'state' => 'uncompleted'
        ];
    }
}
