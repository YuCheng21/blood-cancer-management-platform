<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\AfterBloodType;
use App\Models\BeforeBloodType;
use App\Models\CaseModel;
use App\Models\CaseTask;
use App\Models\CaseTopic;
use App\Models\DiseaseClass;
use App\Models\DiseaseState;
use App\Models\DiseaseType;
use App\Models\DonorBloodType;
use App\Models\Education;
use App\Models\Experimental;
use App\Models\Gender;
use App\Models\HlaType;
use App\Models\Hometown;
use App\Models\Income;
use App\Models\Marriage;
use App\Models\Profession;
use App\Models\ProfessionDetail;
use App\Models\Religion;
use App\Models\Source;
use App\Models\Task;
use App\Models\TransplantState;
use App\Models\TransplantType;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CaseModelController extends Controller
{
    public function index(){
        $cases = CaseModel::orderBy('updated_at', 'desc')->get();

        $genders = Gender::all();

        $hometowns = Hometown::all();
        $educations = Education::all();
        $marriages = Marriage::all();
        $religions = Religion::all();
        $professions = Profession::all();
        $profession_details = ProfessionDetail::all();
        $incomes = Income::all();
        $sources = Source::all();

        $experimental = Experimental::all();

        $transplant_types = TransplantType::all();

        $hla_types = HlaType::all();

        $disease_types = DiseaseType::all();
        $disease_states = DiseaseState::all();
        $disease_classes = DiseaseClass::all();

        $transplant_states = TransplantState::all();
        $before_blood_types = BeforeBloodType::all();
        $donor_blood_types = DonorBloodType::all();
        $after_blood_types = AfterBloodType::all();

        $today = Carbon::now();
        $title = '個案管理';
        return response(
            view('root.case', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function store(Request $request){
        // Validated input
        $rules = [
            'createCaseAccount' => ['required'],
            'createCasePassword' => ['required'],
            'createCaseTransplantNum' => ['required'],
            'createCaseName' => ['required'],
            'createCaseGender' => ['required', 'numeric', 'gt:0'],
            'createCaseBirth' => ['required'],

            'hometown_id' => ['required', 'numeric', 'gt:0'],
            'hometown_other' => ['nullable'],
            'education_id' => ['required', 'numeric', 'gt:0'],
            'marriage_id' => ['required', 'numeric', 'gt:0'],
            'religion_id' => ['required', 'numeric', 'gt:0'],
            'religion_other' => ['nullable'],
            'profession_id' => ['required', 'numeric', 'gt:0'],
            'profession_detail_id' => ['nullable', 'numeric'],
            'income_id' => ['required', 'numeric', 'gt:0'],
            'source_id' => ['required', 'numeric', 'gt:0'],

            'end_date' => ['required'],
            'experimental_id' => ['required', 'numeric', 'gt:0'],

            'diagnosed' => ['required'],

            'createCaseDate' => ['required'],
            'createCaseTransplantType' => ['required', 'numeric', 'gt:0'],

            'hla_type_id' => ['required', 'numeric', 'gt:0'],
            'patient_hla_a1' => ['nullable'],
            'patient_hla_a2' => ['nullable'],
            'patient_hla_b1' => ['nullable'],
            'patient_hla_b2' => ['nullable'],
            'patient_hla_c1' => ['nullable'],
            'patient_hla_c2' => ['nullable'],
            'patient_hla_dr1' => ['nullable'],
            'patient_hla_dr2' => ['nullable'],
            'patient_hla_dq1' => ['nullable'],
            'patient_hla_dq2' => ['nullable'],
            'patient_hla_match' => ['nullable'],
            'donor_hla_a1' => ['nullable'],
            'donor_hla_a2' => ['nullable'],
            'donor_hla_b1' => ['nullable'],
            'donor_hla_b2' => ['nullable'],
            'donor_hla_c1' => ['nullable'],
            'donor_hla_c2' => ['nullable'],
            'donor_hla_dr1' => ['nullable'],
            'donor_hla_dr2' => ['nullable'],
            'donor_hla_dq1' => ['nullable'],
            'donor_hla_dq2' => ['nullable'],
            'donor_hla_match' => ['nullable'],

            'transplant_type_other' => ['nullable'],
            'createCaseDiseaseType' => ['required', 'numeric', 'gt:0'],
            'disease_type_other' => ['nullable'],
            'createCaseDiseaseState' => ['required'],
            'createCaseDiseaseClass' => ['required'],

            'transplant_state_id' => ['nullable', 'numeric', 'gt:0'],
            'before_blood_type_id' => ['nullable', 'numeric', 'gt:0'],
            'donor_blood_type_id' => ['nullable', 'numeric', 'gt:0'],
            'after_blood_type_id' => ['nullable', 'numeric', 'gt:0'],

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
        ] + $validator->validate();
        try {
            CaseModel::create($data);
            return back()
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
            return back()
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

        $hometowns = Hometown::all();
        $educations = Education::all();
        $marriages = Marriage::all();
        $religions = Religion::all();
        $professions = Profession::all();
        $profession_details = ProfessionDetail::all();
        $incomes = Income::all();
        $sources = Source::all();

        $experimental = Experimental::all();

        $transplant_types = TransplantType::all();

        $hla_types = HlaType::all();

        $disease_types = DiseaseType::all();
        $disease_states = DiseaseState::all();
        $disease_classes = DiseaseClass::all();

        $transplant_states = TransplantState::all();
        $before_blood_types = BeforeBloodType::all();
        $donor_blood_types = DonorBloodType::all();
        $after_blood_types = AfterBloodType::all();

        $case_blood_components = $case->case_blood_components;
        foreach ($case_blood_components as $case_blood_component){
            $_ = $case_blood_component->blood_component;
        }
        $reformat_blood_components = AppHelper::reformat_by_key($case_blood_components->toArray(), 'created_at');

        $case_tasks = $case
            ->case_tasks()
            ->join('tasks', 'task_id', '=', 'tasks.id')
            ->orderBy('week', 'ASC')
            ->orderBy('category_1', 'ASC')
            ->select('case_tasks.*', 'tasks.category_1', 'tasks.category_2', 'tasks.name')
            ->get();

        $medicine_records = $case->medicine_records;
        $side_effect_records = $case->side_effect_records;
        $report_records = $case->report_records;
        $image_records = $case
            ->side_effect_records()
            ->where('has_image', '1')
            ->get();

        $title = '個人資料';
        return response(
            view('case.person', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function update(Request $request, $account){
        // Validated input
        $rules = [
            'updateCasePassword' => ['required'],
            'updateCaseTransplantNum' => ['required'],
            'updateCaseName' => ['required'],
            'updateCaseGender' => ['required', 'numeric', 'gt:0'],
            'updateCaseBirth' => ['required'],

            'hometown_id' => ['required', 'numeric', 'gt:0'],
            'hometown_other' => ['nullable'],
            'education_id' => ['required', 'numeric', 'gt:0'],
            'marriage_id' => ['required', 'numeric', 'gt:0'],
            'religion_id' => ['required', 'numeric', 'gt:0'],
            'religion_other' => ['nullable'],
            'profession_id' => ['required', 'numeric', 'gt:0'],
            'profession_detail_id' => ['nullable'],
            'income_id' => ['required', 'numeric', 'gt:0'],
            'source_id' => ['required', 'numeric', 'gt:0'],

            'end_date' => ['required'],
            'experimental_id' => ['required', 'numeric', 'gt:0'],

            'diagnosed' => ['required'],

            'updateCaseDate' => ['required'],
            'updateCaseTransplantType' => ['required', 'numeric', 'gt:0'],

            'hla_type_id' => ['required', 'numeric', 'gt:0'],
            'patient_hla_a1' => ['nullable'],
            'patient_hla_a2' => ['nullable'],
            'patient_hla_b1' => ['nullable'],
            'patient_hla_b2' => ['nullable'],
            'patient_hla_c1' => ['nullable'],
            'patient_hla_c2' => ['nullable'],
            'patient_hla_dr1' => ['nullable'],
            'patient_hla_dr2' => ['nullable'],
            'patient_hla_dq1' => ['nullable'],
            'patient_hla_dq2' => ['nullable'],
            'patient_hla_match' => ['nullable'],
            'donor_hla_a1' => ['nullable'],
            'donor_hla_a2' => ['nullable'],
            'donor_hla_b1' => ['nullable'],
            'donor_hla_b2' => ['nullable'],
            'donor_hla_c1' => ['nullable'],
            'donor_hla_c2' => ['nullable'],
            'donor_hla_dr1' => ['nullable'],
            'donor_hla_dr2' => ['nullable'],
            'donor_hla_dq1' => ['nullable'],
            'donor_hla_dq2' => ['nullable'],
            'donor_hla_match' => ['nullable'],

            'transplant_type_other' => ['nullable'],
            'updateCaseDiseaseType' => ['required', 'numeric', 'gt:0'],
            'disease_type_other' => ['nullable'],
            'updateCaseDiseaseState' => ['required'],
            'updateCaseDiseaseClass' => ['required'],

            'transplant_state_id' => ['nullable', 'numeric', 'gt:0'],
            'before_blood_type_id' => ['nullable', 'numeric', 'gt:0'],
            'donor_blood_type_id' => ['nullable', 'numeric', 'gt:0'],
            'after_blood_type_id' => ['nullable', 'numeric', 'gt:0'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        // Query database
        $case = CaseModel::where('account', $account)->first();
        if (is_null($case)){
            return back()
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
        ] + $validator->validate();
        $case->update($data);
        return back()
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
        $tasks = Task::orderBy('category_1', 'ASC')->get();

        $case = CaseModel::where([
            'account' => $account,
        ])->first();

        $case_tasks = $case
            ->case_tasks()
            ->join('tasks', 'task_id', '=', 'tasks.id')
            ->orderBy('week', 'ASC')
            ->orderBy('category_1', 'ASC')
            ->select('case_tasks.*', 'tasks.category_1', 'tasks.category_2', 'tasks.name')
            ->get();

        if (!empty($case_tasks->toArray())){
            $start_at = Carbon::parse($case_tasks[0]['start_at'])->subDays(1);
        }

        $csrf_token = csrf_token();

        $title = '修改個案任務';
        return response(
            view('case.task', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function task_post(Request $request, $account){
        $task_list = json_decode($request->taskList, true);
        if (empty($task_list)) {
            // task is empty
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '模板沒有任務內容。'
                ]);
        }
        $case_id = CaseModel::where([
            'account' => $account
        ])->first()->id;
        $case_task = CaseTask::where([
            'case_id' => $case_id,
        ])->get();
        if (empty($case_task->toArray())){
            $start_at = Carbon::today()->toDateTimeString();
        }else{
            $start_at = $case_task->toArray()[0]['start_at'];
            $case_task->each->delete();
        }
        foreach ($task_list as $task) {
            $task_id = Task::where([
                'category_1' => $task['category_1'],
                'category_2' => $task['category_2'],
            ])->first()->id;
            try {
                CaseTask::create([
                    'case_id' => $case_id,
                    'task_id' => $task_id,
                    'week' => $task['week'],
                    'start_at' => $start_at,
                    'state' => 'uncompleted',
                ]);
            } catch (QueryException $queryException) {

            }
        }
        return redirect()
            ->route('cases.show', ['account' => $account, '#weeklyTask'])
            ->withInput()
            ->with([
                'type' => 'success-toast',
                'msg' => '修改個案任務成功。'
            ]);
    }

    public function topic(Request $request, $account, $case_task_id){
        $case_topics = CaseTopic::where('case_task_id', $case_task_id)->get();

        $case_task = CaseTask::where('id', $case_task_id)->first();
        $task = $case_task->task;
        $topics = $task->topics;

        $title = '答題結果';
        return response(
            view('case.topic', get_defined_vars()),
            Response::HTTP_OK
        );
    }
}
