<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageRecordFactory extends Factory
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
            'case_id' => '1',
            'date' => $this->faker->date('Y-m-d'),
            'path' => 'https://lipsum.app/id/' . self::$counter . '/800x800/',
            'caption' => 'Cation #' . self::$counter++,
        ];
    }
}
