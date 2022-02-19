<?php

namespace App\Http\Controllers;

use App\Models\BloodComponent;
use App\Models\CaseModel;
use App\Models\DiseaseClass;
use App\Models\DiseaseState;
use App\Models\DiseaseType;
use App\Models\Gender;
use App\Models\TransplantType;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CaseController extends Controller
{
    public function index(){
        $cases = CaseModel::all();
        $genders = Gender::all();
        $transplant_types = TransplantType::all();
        $disease_types = DiseaseType::all();
        $disease_states = DiseaseState::all();
        $disease_classes = DiseaseClass::all();

        $today = Carbon::now();
        $title = '個案管理';
        return response(
            view('root.case', get_defined_vars()),
            200
        );
    }

    public function store(Request $request){
        // Validated input
        $rules = [
            'createCaseAccount' => ['required'],
            'createCasePassword' => ['required'],
            'createCaseTransplantNum' => ['required'],
            'createCaseName' => ['required'],
            'createCaseGender' => ['required', 'numeric', 'gt:1'],
            'createCaseBirth' => ['required'],
            'createCaseDate' => ['required'],
            'createCaseTransplantType' => ['required', 'numeric', 'gt:1'],
            'createCaseDiseaseType' => ['required', 'numeric', 'gt:1'],
            'createCaseDiseaseState' => ['required'],
            'createCaseDiseaseClass' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('cases.index')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        // Query database
        $data = [
            'account' => $request->createCaseAccount,
            'password' => $request->createCasePassword,
            'transplant_num' => $request->createCaseTransplantNum,
            'name' => $request->createCaseName,
            'gender_id' => $request->createCaseGender,
            'birthday' => $request->createCaseBirth,
            'date' => $request->createCaseDate,
            'transplant_type_id' => $request->createCaseTransplantType,
            'disease_type_id' => $request->createCaseDiseaseType,
            'disease_state_id' => $request->createCaseDiseaseState,
            'disease_class_id' => $request->createCaseDiseaseClass,
        ];
        try {
            CaseModel::create($data);
            return redirect()
                ->route('cases.index')
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增個案成功。'
                ]);
        } catch (QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            if ($errorInfo[0] == 23000) {
                $message = '帳號重複';
            } else {
                $message = 'SQLState: ' . $errorInfo[0];
            }
            return redirect()
                ->route('cases.index')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => $message
                ]);
        }
    }

    public function show($account){
        $case = CaseModel::where('account', $account)->first();
        $genders = Gender::all();
        $transplant_types = TransplantType::all();
        $disease_types = DiseaseType::all();
        $disease_states = DiseaseState::all();
        $disease_classes = DiseaseClass::all();

        $blood_components = $case->blood_components;

        $title = '個人資料';
        return response(
            view('case.person', get_defined_vars()),
            200
        );
    }

    public function update(Request $request, $account){
        // Validated input
        $rules = [
            'updateCasePassword' => ['required'],
            'updateCaseTransplantNum' => ['required'],
            'updateCaseName' => ['required'],
            'updateCaseGender' => ['required', 'numeric', 'gt:1'],
            'updateCaseBirth' => ['required'],
            'updateCaseDate' => ['required'],
            'updateCaseTransplantType' => ['required', 'numeric', 'gt:1'],
            'updateCaseDiseaseType' => ['required', 'numeric', 'gt:1'],
            'updateCaseDiseaseState' => ['required'],
            'updateCaseDiseaseClass' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('cases.index')
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        // Query database
        $case = CaseModel::where('account', $account)->first();
        if (is_null($case)){
            return redirect()
                ->route('cases.index')
                ->with([
                    'type' => 'error',
                    'msg' => '內容錯誤'
                ]);
        }
        $data = [
            'password' => $request->updateCasePassword,
            'transplant_num' => $request->updateCaseTransplantNum,
            'name' => $request->updateCaseName,
            'gender_id' => $request->updateCaseGender,
            'birthday' => $request->updateCaseBirth,
            'date' => $request->updateCaseDate,
            'transplant_type_id' => $request->updateCaseTransplantType,
            'disease_type_id' => $request->updateCaseDiseaseType,
            'disease_state_id' => $request->updateCaseDiseaseState,
            'disease_class_id' => $request->updateCaseDiseaseClass,
        ];
        $case->update($data);
        return redirect()
            ->route('cases.index')
            ->with([
                'type' => 'success-toast',
                'msg' => '修改個案成功。'
            ]);
    }

    public function destroy($account){
        $case = CaseModel::where('account', $account)->first();
        if (!is_null($case)){
            $case->delete();
        }
        return redirect()
            ->route('cases.index')
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除個案成功。'
            ]);
    }

    public function task($account)
    {
        $title = '修改個案任務';
        return response(
            view('case.task', get_defined_vars()),
            200
        );
    }
}
