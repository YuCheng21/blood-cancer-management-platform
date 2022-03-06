<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CaseTaskFactory extends Factory
{
    private static $counter = 1;
    private static $start_at = '2022-03-07';
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
            'start_at' => self::$start_at,
            'state' => 'uncompleted'
        ];
    }
}
