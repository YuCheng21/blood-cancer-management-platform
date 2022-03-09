<?php

namespace Database\Seeders;

use App\Models\CaseModel;
use App\Models\CaseTask;
use App\Models\MainTemplate;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class CaseTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CaseTask::factory()
//            ->count(10)
//            ->create();

        $apply_cases = ['user1'];
        $templates = Template::where([
            'name' => 'B模板'
        ])->get()->map(function ($template) {
            return [
                'task_id' => $template->task_id,
                'week' => $template->week,
            ];
        });
        $main_templates = MainTemplate::all()->map(function ($template) {
            return [
                'task_id' => $template->task_id,
                'week' => $template->week,
            ];
        });
        $merge_tasks = array_merge($templates->toArray(), $main_templates->toArray());
        $today = Carbon::today()->toDateTimeString();
        foreach ($apply_cases as $account) {
            $case_id = CaseModel::where([
                'account' => $account
            ])->first()->id;
            CaseTask::where([
                'case_id' => $case_id,
            ])->delete();
            foreach ($merge_tasks as $task) {
                try {
                    CaseTask::create([
                        'case_id' => $case_id,
                        'task_id' => $task['task_id'],
                        'week' => $task['week'],
                        'start_at' => $today,
                        'state' => 'uncompleted',
                    ]);
                } catch (QueryException $queryException) {

                }
            }
        }
    }
}
