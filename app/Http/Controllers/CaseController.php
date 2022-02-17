<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
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
        try {
            CaseModel::create([
                'account' => $request->createCaseAccount,
                'password' => $request->createCasePassword,
                'transplantNum' => $request->createCaseTransplantNum,
                'name' => $request->createCaseName,
                'gender' => $request->createCaseGender,
                'birthday' => $request->createCaseBirth,
                'date' => $request->createCaseDate,
                'transplantType' => $request->createCaseTransplantType,
                'diseaseType' => $request->createCaseDiseaseType,
                'diseaseState' => $request->createCaseDiseaseState,
                'diseaseClass' => $request->createCaseDiseaseClass,
            ]);

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
        $case = CaseModel::where('account', $account)->first();
        if (!is_null($case)){
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

            $case->update([
                'password' => $request->updateCasePassword,
                'transplantNum' => $request->updateCaseTransplantNum,
                'name' => $request->updateCaseName,
                'gender' => $request->updateCaseGender,
                'birthday' => $request->updateCaseBirth,
                'date' => $request->updateCaseDate,
                'transplantType' => $request->updateCaseTransplantType,
                'diseaseType' => $request->updateCaseDiseaseType,
                'diseaseState' => $request->updateCaseDiseaseState,
                'diseaseClass' => $request->updateCaseDiseaseClass,
            ]);
        }
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
