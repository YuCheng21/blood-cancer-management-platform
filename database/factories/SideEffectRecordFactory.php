<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SideEffectRecordFactory extends Factory
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
            'date' => $this->faker->date('Y-m-d'),
            'symptom' => $this->faker->randomElement(['皮疹', '掉髮', '熱潮紅', '噁心嘔吐', '皮膚反應', '腹瀉', '疲倦']),
            'difficulty' => $this->faker->numberBetween(0, 10),
            'severity' => $this->faker->numberBetween(0, 10),
        ];
    }
}
