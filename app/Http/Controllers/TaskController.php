<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Template;
use Illuminate\Http\Request;
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
        $title = '任務管理';
        return response(
            view('root.task', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function main()
    {
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
            return 2;
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

    public function sub_update()
    {
        $title = '修改任務副模板';
        return response(
            view('task.update', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
