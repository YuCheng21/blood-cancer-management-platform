<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportRecordFactory extends Factory
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
            'physical_strength' => $this->faker->randomElement(['很好', '好', '普通', '差']),
            'symptom' => $this->faker->randomElement(['皮疹', '掉髮', '熱潮紅', '噁心嘔吐', '皮膚反應', '腹瀉', '疲倦']),
            'hospital' => $this->faker->randomElement(['高醫', '榮總', '長庚', '義大', '聯合', '小港'])
        ];
    }
}
