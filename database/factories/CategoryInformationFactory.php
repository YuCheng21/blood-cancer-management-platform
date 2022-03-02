<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryInformationFactory extends Factory
{
    private static $category_1 = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_1' => self::$category_1,
            'name' => '類別 - ' . self::$category_1++,
            'short' => self::$category_1,
        ];
    }
}
