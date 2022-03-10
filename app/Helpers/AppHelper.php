<?php

namespace App\Helpers;

class AppHelper
{
    /*
     * array_column, array_unique, array_filter
     */
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
    public static function flatten(array $array): array
    {
        $return = array();
        array_walk_recursive($array, function($a) use (&$return) { $return[] = $a; });
        return $return;
    }

    public static function reformat_task($tasks): array
    {
        $categories = array();
        foreach ($tasks as $key => $value) {
            $category_name = $value->category_information->category_1 . '. ' . $value->category_information->name;
            if (!isset($categories[$category_name])) {
                $categories[$category_name] = array();
            }
            $categories[$category_name][$value->category_2] = $value;
        }
        return $categories;
    }

    public static function reformat_by_key($case_tasks, $key): array
    {
        $categories = array();
        foreach ($case_tasks as $value) {
            $categories[$value[$key]][] = $value;
        }
        return $categories;
    }

    public static function check_completed($case_tasks): array
    {
        foreach ($case_tasks as $key => $case_task){
            $task_topic = $case_task->task->topics;
            $task_topic_id = array_column($task_topic->toArray(), 'id');
            $case_topics = $case_task->case_topics;
            $case_topics_id = array_column($case_topics->toArray(), 'topic_id');

            $is_completed = count(array_intersect($task_topic_id, $case_topics_id)) == count($task_topic_id);
            $case_tasks[$key]['state'] = $is_completed ? 'completed' : 'uncompleted';
        }
        return $case_tasks;
    }

    public static function tasks_sort($tasks){
        usort($tasks, function ($a, $b) {
            $a1 = $a['category_1'];
            $b1 = $b['category_1'];
            $a2_explode = explode('-', $a['category_2']); //  $a2[0]
            $b2_explode = explode('-', $b['category_2']); //  $b2[0]
            $a2 = $a2_explode[0] ?? '0';
            $b2 = $b2_explode[0] ?? '0';
            $a3 = $a2_explode[1] ?? '0';
            $b3 = $b2_explode[1] ?? '0';
            if ($a1 > $b1) {
                return 1;
            } elseif ($a1 == $b1){
                if ($a2 > $b2){
                    return 1;
                }elseif ($a2 == $b2){
                    if ($a3 > $b3){
                        return 1;
                    }
                }
            } elseif ($a1 < $b1) {
                return -1;
            } elseif ($a1 == $b1){
                if ($a2 < $b2){
                    return -1;
                }elseif ($a2 == $b2){
                    if ($a3 < $b3){
                        return -1;
                    }
                }
            } else {
                return 0;
            }
        });
        return $tasks;
    }
}
