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
        $hospital_id = $this->faker->randomElement([2, 3, 4, 5]);
        $hospital_other = null;
        if ($hospital_id == 5){
            $hospital_other = $this->faker->randomElement(['榮總', '長庚', '義大', '聯合']);
        }
        return [
            'case_id' => '1',
            'date' => $this->faker->date('Y-m-d'),
            'physical_strength_id' => $this->faker->randomElement([2, 3, 4, 5, 6]),
            'symptom' => $this->faker->randomElement(['皮疹', '掉髮', '熱潮紅', '噁心嘔吐', '皮膚反應', '腹瀉', '疲倦']),
            'hospital_id' => $hospital_id,
            'hospital_other' => $hospital_other,
        ];
    }
}
