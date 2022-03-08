<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Topic;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::orderBy('updated_at', 'desc')->get();
        $tf_number = Topic::where([
            'question_type' => 'true-false'
        ])->count();
        $mc_number = Topic::where([
            'question_type' => 'multiple-choice'
        ])->count();

        $tasks = Task::orderBy('category_1', 'ASC')->get();

        $title = '題目管理';
        return response(
            view('root.topic', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function store(Request $request)
    {
        $rules = [
            'createSelectTopicType' => ['required'],
            'createTopicTitle' => ['required'],
            'questionType' => ['required'],
            'answer' => ['required'],
        ];
//        if ($request->questionType == 'multiple-choice'){
//            $rules['createItemContent1'] = ['required'];
//            $rules['createItemContent2'] = ['required'];
//            $rules['createItemContent3'] = ['required'];
//            $rules['createItemContent4'] = ['required'];
//        }
        $flag = false;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $flag = true;
        }
        if ($request->questionType == 'true-false' && !in_array($request->answer, range(1, 2))) {
            $flag = true;
        } elseif ($request->questionType == 'multiple-choice' && !in_array($request->answer, range(3, 6))) {
            $flag = true;
        }
        if ($flag) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $data = [
            'task_id' => $request->createSelectTopicType,
            'question' => $request->createTopicTitle,
            'question_type' => $request->questionType,
            'answer' => $request->answer,
            'option_a' => $request->createItemContent1,
            'option_b' => $request->createItemContent2,
            'option_c' => $request->createItemContent3,
            'option_d' => $request->createItemContent4,
        ];
        try {
            Topic::create($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增題庫成功。'
                ]);
        } catch (QueryException $queryException) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'updateSelectTopicType' => ['required'],
            'updateTopicTitle' => ['required'],
            'questionType' => ['required'],
            'answer' => ['required'],
        ];
        $flag = false;
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $flag = true;
        }
        if ($request->questionType == 'true-false' && !in_array($request->answer, range(1, 2))) {
            $flag = true;
        } elseif ($request->questionType == 'multiple-choice' && !in_array($request->answer, range(3, 6))) {
            $flag = true;
        }
        if ($flag) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }

        $data = [
            'task_id' => $request->updateSelectTopicType,
            'question' => $request->updateTopicTitle,
            'question_type' => $request->questionType,
            'answer' => $request->answer,
            'option_a' => $request->updateItemContent1,
            'option_b' => $request->updateItemContent2,
            'option_c' => $request->updateItemContent3,
            'option_d' => $request->updateItemContent4,
        ];
        $topic = Topic::where([
            'id' => $id,
        ])->first();
        try {
            $topic->update($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增題庫成功。'
                ]);
        } catch (QueryException $queryException) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }

    public function destroy(Request $request, $id)
    {
        $topic = Topic::where([
            'id' => $id,
        ])->first();
        if (!is_null($topic)) {
            $topic->delete();
        }
        return back()
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除題庫成功。'
            ]);
    }
}
