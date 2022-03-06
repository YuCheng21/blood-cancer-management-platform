<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\SideEffectRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class SideEffectRecordController extends Controller
{
    public function account(Request $request, $account){
        $case = CaseModel::where([
            'account' => $account,
        ])->first();
        if (!Auth::check()){
            $case = CaseModel::where([
                'account' => $request->get('auth_account'),
            ])->first();
        }

        return response(['data' => $case->side_effect_records], Response::HTTP_OK);
    }

    public function store(Request $request){
        $rules = [
            'account' => ['required'],
            'date' => ['required'],
            'symptom' => ['required'],
            'difficulty' => ['nullable'],
            'severity' => ['required'],
            'has_image' => ['required'],
            'image' => ['nullable'],
            'caption' => ['nullable'],
        ];
        $validator = Validator::make($request->all(), $rules);

        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
        } else {
            $case_id = CaseModel::where('account', $validator->validate()['account'])->first()->toArray()['id'];
        }

        $file = $request->file('image');
        if (!is_null($file)) {
            $path = $file->storeAs(
                'effect',
                $file->hashName(),
                'public'
            );
        }else{
            $path = null;
        }

        $data = [
            'case_id' => $case_id,
            'date' => $request['date'],
            'symptom' => $request['symptom'],
            'difficulty' => $request['difficulty'],
            'severity' => $request['severity'],
            'has_image' => $request['has_image'],
            'caption' => $request['caption'],
            'path' => $path,
        ];

        $side_effect_record = SideEffectRecord::create($data);
        $side_effect_record = $side_effect_record->refresh();
        return response(['data' => $side_effect_record], Response::HTTP_CREATED);
    }

    public function test(Request $request){
        $file = $request->file('form-image');
        $path = $file->storeAs(
            'effect',
            $file->hashName(),
            'public'
        );
    }
}
