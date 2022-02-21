<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    private static $category_1 = 1;
    private static $category_2 = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_1' => function () {
                $random = $this->faker->randomFloat(5, 1, 0) > 0.2;
                if ($random < 0.2){
                    self::$category_2 = 1;
                    return self::$category_1++;
                }else{
                    return self::$category_1;
                }
            },
            'category_2' => self::$category_2++,
            'name' => $this->faker->text(30)
        ];
    }
}
