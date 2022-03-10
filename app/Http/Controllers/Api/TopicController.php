<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\CaseTopic;
use App\Models\Topic;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TopicController extends Controller
{
    /**
     * @OA\Get (
     *     path="/api/topics/{id}",
     *     tags={"任務題目"},
     *     summary="取得任務題目",
     *     description="取得任務的題目相關資訊，如：題目 id。",
     *     @OA\Parameter (name="id", description="任務 id", required=true, in="path", example="1",
     *          @OA\Schema(type="integer",)
     *     ),
     *     @OA\Response(response="200", description="success",)
     * )
     */

    public function account(Request $request, $task_id)
    {
        $topics = Topic::where('task_id', $task_id)->get();

        return response(['data' => $topics], Response::HTTP_OK);
    }

    /**
     * @OA\Post (
     *     path="/api/topics/cases",
     *     tags={"任務題目"},
     *     summary="新增個案任務題目完成狀態",
     *     description="新增個案每週任務題目完成狀態。<p>先 GET 任務 id（每週任務），再 GET 題目 id（任務題目），並以兩組 id 使用此方法設定，完成個案的答題狀態。</p>",
     *     @OA\RequestBody (
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(required={"case_task_id", "topic_id", "state"},
     *                  @OA\Property(property="case_task_id", type="integer", example=1),
     *                  @OA\Property(property="topic_id", type="integer", example=1),
     *                  @OA\Property(property="state", type="string", enum={"correct","wrong"}, example="correct"),
     *              ),
     *          ),
     *      ),
     *     @OA\Response(response="200", description="success")
     * )
     */
    public function cases(Request $request)
    {
        $rules = [
            'case_task_id' => ['required'],
            'topic_id' => ['required'],
            'state' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);

        if (!Auth::check()) {
            // check case_task_id is belongs to it.
            $case_task_id = CaseModel::where('account', $request->get('auth_account'))->first()
                ->case_tasks->map(function ($var){
                    return $var->id;
                });
            if (!in_array($validator->validate()['case_task_id'], $case_task_id->toArray())){
                return response(null, Response::HTTP_BAD_REQUEST);
            }
        }
        try {
            $case_topic = CaseTopic::create($validator->validate());
            $case_topic = $case_topic->refresh();
        }catch (QueryException $queryException){
            $error_info = $queryException->errorInfo;
            if ($error_info[0] == 23000) {
                $error_message = 'unique key duplicated';
            } else {
                $error_message = 'SQLState: ' . $error_info[0];
            }
            return response(['data' => $error_message], Response::HTTP_BAD_REQUEST);
        }
        return response(['data' => $case_topic], Response::HTTP_CREATED);
    }
}
