<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SideEffectRecordFactory extends Factory
{
    private static $counter = 1;
    private static $counter2 = 1;
    private static $date;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (self::$counter2 % 3 == 1){
            self::$date = $this->faker->date('Y-m-d') . ' ' . $this->faker->time('H:i:s');
        }
        self::$counter2++;
        $symptom = $this->faker->randomElement(['皮疹', '掉髮', '腹瀉', '疲倦', '拍照']);
        if ($symptom == '拍照'){
            $has_image = true;
            $path = 'https://lipsum.app/id/' . self::$counter . '/800x800/';
            $caption = 'Cation #' . self::$counter++;
        }else{
            $has_image = false;
            $path = null;
            $caption = null;
        }
        return [
            'case_id' => '1',
            'date' => self::$date,
            'symptom' => $symptom,
            'difficulty' => $this->faker->numberBetween(0, 10),
            'severity' => $this->faker->numberBetween(0, 10),
            'has_image' => $has_image,
            'path' => $path,
            'caption' => $caption,
        ];
    }
}
