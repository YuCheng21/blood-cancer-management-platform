<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFactory extends Factory
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
            'name' => '測試模板',
            'task_id' => self::$counter++,
            'week' => $this->faker->numberBetween(1, 12),
        ];
    }
}
