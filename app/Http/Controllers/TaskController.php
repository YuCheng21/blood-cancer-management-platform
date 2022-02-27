<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\CaseTask;
use App\Models\MainTemplate;
use App\Models\Task;
use App\Models\Template;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $names = DB::table('templates')->select('name')->distinct()->get();

        $templates = Template::all();
        $templates = $templates->map(function ($template) {
            return [
                'id' => $template->id,
                'name' => $template->name,
                'task' => [
                    'id' => $template->task->id,
                    'category_1' => $template->task->category_1,
                    'category_2' => $template->task->category_2,
                    'name' => $template->task->name,
                    'created_at' => $template->task->created_at,
                    'updated_at' => $template->task->updated_at,
                ],
                'week' => $template->week,
                'created_at' => $template->created_at,
                'updated_at' => $template->updated_at,
            ];
        });

        $cases = CaseModel::all();

        $csrf_token = csrf_token();
        $title = '任務管理';
        return response(
            view('root.task', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function main()
    {
        $tasks = Task::all();
        $categories = array();
        foreach ($tasks as $key => $value) {
            if (!isset($categories[$value->category_1])) {
                $categories[$value->category_1] = array();
            }
            $categories[$value->category_1][$value->category_2] = $value;
        }

        $main_templates = MainTemplate::all();


        $csrf_token = csrf_token();
        $title = '修改任務主模板';
        return response(
            view('task.main', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function main_post(Request $request)
    {
        $task_list = json_decode($request->taskList, true);
        if (empty($task_list)) {
            // task is empty
            return redirect()
                ->route('tasks.main.index')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板沒有任務內容。'
                ]);
        }
        $main_template = MainTemplate::all();
        $main_template->each->delete();
        foreach ($task_list as $task) {
            $week = $task['week'];
            $content = explode('-', $task['content']);
            $category_1 = $content[0];
            $category_2 = $content[1];
            $task_id = Task::where([
                'category_1' => $category_1,
                'category_2' => $category_2,
            ])->first();
            $main_template = MainTemplate::create([
                'task_id' => $task_id->id,
                'week' => $week,
            ]);
        }

        return redirect()
            ->route('tasks.index')
            ->withInput()
            ->with([
                'type' => 'success-toast',
                'msg' => '修改主模板成功。'
            ]);
    }

    public function sub_create()
    {
        $tasks = Task::all();
        $categories = array();
        foreach ($tasks as $key => $value) {
            if (!isset($categories[$value->category_1])) {
                $categories[$value->category_1] = array();
            }
            $categories[$value->category_1][$value->category_2] = $value;
        }
        $csrf_token = csrf_token();
        $title = '新增任務副模板';
        return response(
            view('task.create', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function sub_create_post(Request $request)
    {
        $rules = [
            'taskList' => ['required'],
            'name' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('tasks.sub.add')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板缺少內容'
                ]);
        }
        $task_list = json_decode($request->taskList, true);
        if (empty($task_list)) {
            // task is empty
            return redirect()
                ->route('tasks.sub.add')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板缺少內容。'
                ]);
        }
        $name = $request->name;
        $template = Template::where(['name' => $name])->first();
        if (!is_null($template)) {
            // find duplicated
            return redirect()
                ->route('tasks.sub.add')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板名稱重複。'
                ]);
        }
        foreach ($task_list as $task) {
            $week = $task['week'];
            $content = explode('-', $task['content']);
            $category_1 = $content[0];
            $category_2 = $content[1];
            $task_id = Task::where([
                'category_1' => $category_1,
                'category_2' => $category_2,
            ])->first();
            $template = Template::create([
                'name' => $name,
                'task_id' => $task_id->id,
                'week' => $week,
            ]);
        }

        return redirect()
            ->route('tasks.index')
            ->withInput()
            ->with([
                'type' => 'success-toast',
                'msg' => '新增模板成功。'
            ]);
    }

    public function sub_update($name)
    {
        $tasks = Task::all();
        $categories = array();
        foreach ($tasks as $key => $value) {
            if (!isset($categories[$value->category_1])) {
                $categories[$value->category_1] = array();
            }
            $categories[$value->category_1][$value->category_2] = $value;
        }

        $templates = Template::where([
            'name' => $name
        ])->get();

        $csrf_token = csrf_token();
        $title = '修改任務副模板';
        return response(
            view('task.update', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function sub_update_post(Request $request, $name)
    {
        $rules = [
            'taskList' => ['required'],
            'name' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('tasks.sub.update_post', ['name' => $name])
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板缺少內容'
                ]);
        }
        $task_list = json_decode($request->taskList, true);
        if (empty($task_list)) {
            // task is empty
            return redirect()
                ->route('tasks.sub.update_post', ['name' => $name])
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板沒有任務內容。'
                ]);
        }
        $new_name = $request->name;
        $template = Template::where(['name' => $name]);
        $template->delete();
        foreach ($task_list as $task) {
            $week = $task['week'];
            $content = explode('-', $task['content']);
            $category_1 = $content[0];
            $category_2 = $content[1];
            $task_id = Task::where([
                'category_1' => $category_1,
                'category_2' => $category_2,
            ])->first();
            $template = Template::create([
                'name' => $new_name,
                'task_id' => $task_id->id,
                'week' => $week,
            ]);
        }

        return redirect()
            ->route('tasks.index')
            ->withInput()
            ->with([
                'type' => 'success-toast',
                'msg' => '修改模板成功。'
            ]);
    }

    public function apply_post(Request $request, $name)
    {
        $apply_cases = json_decode($request->applyList);
        $templates = Template::where([
            'name' => $name
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
        return redirect()
            ->route('tasks.index')
            ->withInput()
            ->with([
                'type' => 'success-toast',
                'msg' => '套用模板成功。'
            ]);
    }

    public function sub_destroy($name)
    {
        $template = Template::where([
            'name' => $name
        ]);

        $template->delete();

        return redirect()
            ->route('tasks.index')
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除模板成功。'
            ]);
    }
}
