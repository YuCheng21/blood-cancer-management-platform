<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $templates = $templates->map(function ($template){
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
        foreach ($tasks as $key=>$value){
            if (!isset($categories[$value->category_1])){
                $categories[$value->category_1] = array();
            }
            $categories[$value->category_1][$value->category_2] = $value;
        }

        $title = '修改任務主模板';
        return response(
            view('task.main', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function sub_create()
    {
        $tasks = Task::all();
        $categories = array();
        foreach ($tasks as $key=>$value){
            if (!isset($categories[$value->category_1])){
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
        $task_list = json_decode($request->taskList, true);
        if (empty($task_list)){
            return 1;
        }
        $name = $request->name;
        $template = Template::where(['name' => $name])->first();
        if (!is_null($template)){
            return 2;  // find duplicated
        }
        foreach ($task_list as $task){
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
    }

    public function sub_update($name)
    {
        $tasks = Task::all();
        $categories = array();
        foreach ($tasks as $key=>$value){
            if (!isset($categories[$value->category_1])){
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

    public function sub_update_post(Request $request, $name){
        $task_list = json_decode($request->taskList, true);
        if (empty($task_list)){
            return 1;
        }
        $name = $request->name;
        $template = Template::where(['name' => $name]);
        $template->delete();
        foreach ($task_list as $task){
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
    }

    public function sub_destroy($name)
    {
        $template = Template::where([
            'name' => $name
        ]);

        $template->delete();
        return 0;
    }
}
