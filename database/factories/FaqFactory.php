<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoryInformation;

class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_1 = CategoryInformation::select('category_1')->get()->map(function ($var){
            return $var->category_1;
        })->toArray();

        return [
            'category_1' => $this->faker->randomElement($category_1),
            'title' => $this->faker->text(15),
            'content' => $this->faker->text(30),
        ];
    }
}
