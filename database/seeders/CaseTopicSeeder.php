<?php

namespace Database\Seeders;

use App\Models\CaseTask;
use App\Models\CaseTopic;
use Illuminate\Database\Seeder;

class CaseTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        第一版

//        $state = ['correct', 'wrong'];  // 'state' => $state[array_rand($state)]
//        $case_id = 1;
//        $week = 1;
//        $case = CaseTask::where([
//            'case_id' => $case_id,
//            'week' => $week,
//        ])->get();
//        $case_task_id = array_column($case->toArray(), 'id');
//        $case_tasks = CaseTask::whereIn('id', $case_task_id)->get();
//        foreach($case_tasks as $var){
//            $task = $var->task->topics;
//            foreach (array_column($task->toArray(), 'id') as $id){
//                CaseTopic::create([
//                    'case_task_id' => $var->id,
//                    'topic_id' => $id,
//                    'state' => $state[array_rand($state)],
//                ]);
//            }
//        }
    }
}
