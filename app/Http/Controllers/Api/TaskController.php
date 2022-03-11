<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\CaseTask;
use App\Models\CategoryInformation;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    /**
     * @OA\Get (path="/api/tasks", tags={"任務"}, summary="取得所有任務",
     *     description="取得所有任務",
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/task"),
     *                          @OA\Schema (
     *                              @OA\Property(property="category_information", type="object", allOf={
     *                                  @OA\Schema (ref="#/components/schemas/category_1")}))}))))))
     */

    public function index(){
        $tasks = Task::all();
        foreach ($tasks as $task){
            $_ = $task->category_information;
        }
        return response(['data' => $tasks], Response::HTTP_OK);
    }

    /**
     * @OA\Get (path="/api/tasks/category_information", tags={"任務"}, summary="取得所有任務類別",
     *     description="取得所有任務類別",
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/category_1")}))))))
     */

    public function category_information(){
        $category_information = CategoryInformation::all();
        return response(['data' => $category_information], Response::HTTP_OK);
    }

    /**
     * @OA\Get (path="/api/tasks/account/{account}", tags={"每週任務"}, summary="取得每週任務",
     *     description="取得每週的任務相關資訊，如：週數、任務 id、該資料的獨立 id（在新增個案任務的完成狀態時會用到）",
     *     @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/case-task"),
     *                          @OA\Schema (
     *                              @OA\Property(property="task", type="object", allOf={
     *                                  @OA\Schema (ref="#/components/schemas/task")}))}))))))
     */

    public function account(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('auth_account'));
        }
        $case = $case->first();
        if (is_null($case)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $case_task = $case->case_tasks;
        foreach ($case_task as $val){
            $_ = $val->task;
        }
        return response(['data' => $case_task], Response::HTTP_OK);
    }

    /**
     * @OA\Patch (path="/api/tasks/state/{id}", tags={"每週任務"}, summary="更新每週任務完成狀態",
     *     description="更新每週任務完成狀態。<p>先用 GET 該個案的所有任務後，再用任務 id 使用此方法。</p>",
     *     @OA\Parameter (name="id", description="任務 id", required=true, in="path", example="1",
     *          @OA\Schema(type="integer",)),
     *      @OA\RequestBody (
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(required={"state"},
     *                  @OA\Property(property="state", type="string", enum={"completed","uncompleted"}, example="completed"),),),),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/case-task")})))))
     */

    public function state(Request $request ,$case_task_id){
        $rules = [
            'state' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        $case_task = CaseTask::where('id', $case_task_id)->get();
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $case_task = $case_task->where('case_id', $case_id);
        }
        $case_task = $case_task->first();
        if (is_null($case_task)){
            return \response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $case_task->update($validator->validate());
        $case_task = $case_task->refresh();
        return response(['data' => $case_task], Response::HTTP_OK);
    }
}
