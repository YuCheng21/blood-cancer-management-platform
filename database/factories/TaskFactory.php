<?php

namespace Database\Factories;

use App\Models\CategoryInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
//    private static $category_1 = 1;
    private static $category_2 = array();

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_1_list = CategoryInformation::select('category_1')->get()->map(function ($var){
            return $var->category_1;
        })->toArray();
        $category_1 = $this->faker->randomElement($category_1_list);
        if (!isset(self::$category_2[$category_1])){
            self::$category_2[$category_1] = 1;
        }

        return [
            'category_1' => $category_1,
            'category_2' => self::$category_2[$category_1]++,
            'name' => $this->faker->text(30)
        ];
    }
}
