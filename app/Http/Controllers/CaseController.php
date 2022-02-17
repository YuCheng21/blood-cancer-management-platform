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
            'createCaseGender' => ['required', 'numeric', 'gt:1'],
            'createCaseBirth' => ['required'],
            'createCaseDate' => ['required'],
            'createCaseTransplantType' => ['required', 'numeric', 'gt:1'],
            'createCaseDiseaseType' => ['required', 'numeric', 'gt:1'],
            'createCaseDiseaseState' => ['required'],
            'createCaseDiseaseClass' => ['required'],
        ];
        $validator = Validator::make($request->all(), $input);

        if ($validator->fails()) {
            return redirect(route('cases.index'))
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

            return redirect(route('cases.index'))
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

            return redirect(route('cases.index'))
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

    public function update($account){
        return 'ok';
    }

    public function destroy($account){
        $case = CaseModel::where('account', $account)->first();
        if (!is_null($case)){
            $case->delete();
        }
        return redirect()->route('cases.index');
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
