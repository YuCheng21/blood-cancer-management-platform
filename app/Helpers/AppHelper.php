<?php

namespace App\Helpers;

class AppHelper
{
    public static function split_task($task): array
    {
//        $task = "1-2-3-4-5. [Ab cum-numquam susci-pit. . dd-]";
        $elements_1 = explode('. ', $task);
        $number = $elements_1[0];
        $name = implode('. ',  array_slice($elements_1, 1));

        $elements_2 = explode('-', $number);
        $category_1 = $elements_2[0];
        $category_2 = implode('-', array_slice($elements_2, 1));

        return [
            'category_1' => $category_1,
            'category_2' => $category_2,
            'name' => $name,
        ];
    }

    public static function reformat_task($tasks){
        $categories = array();
        foreach ($tasks as $key => $value) {
            $category_name = $value->category_information->name;
            if (!isset($categories[$category_name])) {
                $categories[$category_name] = array();
            }
            $categories[$category_name][$value->category_2] = $value;
        }
        return $categories;
    }
}
