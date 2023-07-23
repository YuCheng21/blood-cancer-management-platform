<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use App\Models\SideEffectRecord;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EffectRecordController extends Controller
{
    public function store($account, Request $request)
    {
        $rules = [
            'createEffectRecordDate' => ['required'],
            'createEffectRecordSymptom' => ['required'],
            'createEffectRecordSeverity' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('cases.show', ['account' => $account, '#effectRecord'])
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成。'
                ]);
        }
        $case = CaseModel::where([
            'account' => $account,
        ])->first();
        $data = [
            'case_id' => $case->id,
            'date' => $request->createEffectRecordDate,
            'symptom' => $request->createEffectRecordSymptom,
            'difficulty' => 0,
            'severity' => $request->createEffectRecordSeverity,
            'has_image' => 0,
            'path' => null,
            'caption' => null,
        ];
        try {
            SideEffectRecord::create($data);
            return redirect()
                ->route('cases.show', ['account' => $account, '#effectRecord'])
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增副作用紀錄成功。'
                ]);
        }catch (QueryException $queryException){
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }
    public function destroy($account, $id)
    {
        $case = CaseModel::where([
            'account' => $account,
        ])->first();
        $effect_record = $case->side_effect_records()->where([
            'id' => $id,
        ])->first();
        if (!is_null($effect_record)) {
            $effect_record->delete();
        }
        return redirect()
            ->route('cases.show', ['account' => $account, '#effectRecord'])
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除副作用紀錄成功。'
            ]);
    }
}
