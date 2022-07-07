<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoRecordFactory extends Factory
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
            'date' => $this->faker->date('Y-m-d') . ' ' . $this->faker->time('H:i:s'),
            'name' => $this->faker->randomElement([
                '彈力帶運動(國語版)',
                '彈力帶運動（台語版）',
                '肢體關節運動(國語版)',
                '肢體關節運動（台語版）',
                '呼吸練習（二）專注呼吸',
                '呼吸練習（一）找到放鬆的姿勢',
            ]),
            'duration' => '240',
            'end' => rand(0, 240),
            'start' => '0',
        ];
    }
}
