<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MedicineRecord;

class MedicineRecordController extends Controller
{
    public function store($account, Request $request)
    {
        $rules = [
            'createMedicineRecordType' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'createMedicineRecordDose' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('cases.show', ['account' => $account, '#medicineRecord'])
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
            'type' => $request->createMedicineRecordType,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'dose' => $request->createMedicineRecordDose,
        ];
        try {
            MedicineRecord::create($data);
            return redirect()
                ->route('cases.show', ['account' => $account, '#medicineRecord'])
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增施打藥物紀錄成功。'
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

    public function update($account, $id, Request $request)
    {
        $rules = [
            'updateMedicineRecordType' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'updateMedicineRecordDose' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('cases.show', ['account' => $account, '#medicineRecord'])
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }

        $data = [
            'type' => $request->updateMedicineRecordType,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'dose' => $request->updateMedicineRecordDose,
        ];
        $medicine_record = MedicineRecord::where([
            'id' => $id,
        ])->first();
        try{
            $medicine_record->update($data);
            return redirect()
                ->route('cases.show', ['account' => $account, '#medicineRecord'])
                ->with([
                    'type' => 'success-toast',
                    'msg' => '修改施打藥物紀錄成功。'
                ]);
        }catch (QueryException $queryException){
            return redirect()
                ->route('cases.show', ['account' => $account, '#medicineRecord'])
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
        $medicine_record = $case->medicine_records()->where([
            'id' => $id,
        ])->first();
        if (!is_null($medicine_record)) {
            $medicine_record->delete();
        }
        return redirect()
            ->route('cases.show', ['account' => $account, '#medicineRecord'])
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除施打藥物紀錄成功。'
            ]);
    }
}
