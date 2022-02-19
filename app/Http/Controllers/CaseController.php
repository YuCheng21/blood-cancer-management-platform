<?php

namespace App\Http\Controllers;

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
        $today = Carbon::now();

        $title = '個案管理';
        return response(
            view('root.case', get_defined_vars()),
            200
        );
    }

    public function store(Request $request){
        $input = [
            'createCaseAccount' => ['required'],
            'createCasePassword' => ['required'],
            'createCaseTransplantNum' => ['required'],
            'createCaseName' => ['required'],
            'createCaseGender' => ['required', 'in:男性,女性'],
            'createCaseBirth' => ['required'],
            'createCaseDate' => ['required'],
            'createCaseTransplantType' => ['required', 'in:自體移植,異體移植'],
            'createCaseDiseaseType' => ['required', 'in:AML,ALL,MM,何杰金氏淋巴癌,非何杰金氏淋巴癌'],
            'createCaseDiseaseState' => ['required'],
            'createCaseDiseaseClass' => ['required'],
        ];
        $validator = Validator::make($request->all(), $input);

        if ($validator->fails()) {
            return redirect()
                ->route('cases.index')
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $data = [
            'account' => $request->createCaseAccount,
            'password' => $request->createCasePassword,
            'transplant_num' => $request->createCaseTransplantNum,
            'name' => $request->createCaseName,
            'gender_id' => Gender::where('name', $request->createCaseGender)->first()->id,
            'birthday' => $request->createCaseBirth,
            'date' => $request->createCaseDate,
            'transplant_type_id' => TransplantType::where('name', $request->createCaseTransplantType)->first()->id,
            'disease_type_id' => DiseaseType::where('name', $request->createCaseDiseaseType)->first()->id,
            'disease_state_id' => DiseaseState::where('name', $request->createCaseDiseaseState)->first()->id,
            'disease_class_id' => DiseaseClass::where('name', $request->createCaseDiseaseClass)->first()->id,
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
        $title = '個人資料';
        return response(
            view('case.person', get_defined_vars()),
            200
        );
    }

    public function update(Request $request, $account){
        // Validated input
        $input = [
            'updateCasePassword' => ['required'],
            'updateCaseTransplantNum' => ['required'],
            'updateCaseName' => ['required'],
            'updateCaseGender' => ['required', 'in:男性,女性'],
            'updateCaseBirth' => ['required'],
            'updateCaseDate' => ['required'],
            'updateCaseTransplantType' => ['required', 'in:自體移植,異體移植'],
            'updateCaseDiseaseType' => ['required', 'in:AML,ALL,MM,何杰金氏淋巴癌,非何杰金氏淋巴癌'],
            'updateCaseDiseaseState' => ['required'],
            'updateCaseDiseaseClass' => ['required'],
        ];
        $validator = Validator::make($request->all(), $input);
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
            'gender_id' => Gender::where('name', $request->updateCaseGender)->first()->id,
            'birthday' => $request->updateCaseBirth,
            'date' => $request->updateCaseDate,
            'transplant_type_id' => TransplantType::where('name', $request->updateCaseTransplantType)->first()->id,
            'disease_type_id' => DiseaseType::where('name', $request->updateCaseDiseaseType)->first()->id,
            'disease_state_id' => DiseaseState::where('name', $request->updateCaseDiseaseState)->first()->id,
            'disease_class_id' => DiseaseClass::where('name', $request->updateCaseDiseaseClass)->first()->id,
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
