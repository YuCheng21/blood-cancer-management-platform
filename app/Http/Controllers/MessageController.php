<?php

namespace App\Http\Controllers;

use App\Models\CaseMessage;
use App\Models\CaseModel;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderBy('updated_at', 'desc')->get();

        $cases = CaseModel::orderBy('updated_at', 'desc')->select('account', 'name', 'id')->get();

        $case_messages = CaseMessage::all();

        $title = '消息管理';
        return response(
            view('root.message', get_defined_vars()),
            Response::HTTP_OK
        );
    }


    public function store(Request $request)
    {
        $rules = [
            'createMessageTitle' => ['required'],
            'createMessageContent' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $data = [
            'title' => $request->createMessageTitle,
            'content' => $request->createMessageContent,
            'user_id' => Auth::id(),
            'date' => Carbon::today()->toDateTimeString(),
        ];
        try {
            Message::create($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增消息成功。'
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
            'updateMessageTitle' => ['required'],
            'updateMessageContent' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $data = [
            'title' => $request->updateMessageTitle,
            'content' => $request->updateMessageContent,
            'user_id' => Auth::id(),
        ];
        $message = Message::where([
            'id' => $id,
        ])->first();
        try {
            $message->update($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增消息成功。'
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
        $message = Message::where([
            'id' => $id,
        ])->first();
        if (!is_null($message)) {
            $message->delete();
        }
        return back()
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除消息成功。'
            ]);
    }

    public function apply(Request $request, $id)
    {
        $selected_case = json_decode($request->selectedCase);

        foreach (array_filter($selected_case) as $key => $value){
            try {
                CaseMessage::create([
                    'case_id' => $value,
                    'message_id' => $id,
                    'state' => 0,
                ]);
            }catch (QueryException $queryException){

            }
        }

        return back()
            ->with([
                'type' => 'success-toast',
                'msg' => '套用消息成功。'
            ]);
    }
}
