<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CaseModelController extends Controller
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
            Response::HTTP_OK
        );
    }

    public function store(Request $request)
    {
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
            return 1;
        }
        if (!Auth::check()) {
            return 2;
        }

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
        $case = CaseModel::create($data);
        $case = $case->refresh();
        return response(['data' => $case], Response::HTTP_CREATED);
    }
    public function show(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('$auth_account'));
        }
        return response(['data' => $case], Response::HTTP_OK);
    }

    public function update(Request $request, $account)
    {
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
            return 1;
        }
        $case = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('$auth_account'));
        }
        if (is_null($case)) {
            return 2;
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
        $case = $case->first();
        $case->update($data);
        $case = $case->refresh();
        return response(['data' => $case, '' => $data], Response::HTTP_OK);
    }

    public function destroy(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->first();
        if (!Auth::check()) {
            return ;
        }
        $case->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
