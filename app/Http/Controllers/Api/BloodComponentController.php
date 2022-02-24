<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodComponent;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use function response;

class BloodComponentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $rules = [
            'account' => ['required'],
            'wbc' => ['required'],
            'hb' => ['required'],
            'plt' => ['required'],
            'got' => ['required'],
            'gpt' => ['required'],
            'cea' => ['required'],
            'ca153' => ['required'],
            'bun' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);

        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('$auth_account'))->first()->toArray()['id'];
        } else {
            $case_id = CaseModel::where('account', $validator->validate()['account'])->first()->toArray()['id'];
        }
        $result = ['case_id' => $case_id] + $validator->validate();
        $blood_component = BloodComponent::create($result);
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_CREATED);
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param int $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Request $request, BloodComponent $bloodComponent)
//    {
//        return response(['data' => $bloodComponent], Response::HTTP_OK);
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string
     */
    public function update(Request $request, $blood_component_id)
    {
        $rules = [
            'wbc' => ['required'],
            'hb' => ['required'],
            'plt' => ['required'],
            'got' => ['required'],
            'gpt' => ['required'],
            'cea' => ['required'],
            'ca153' => ['required'],
            'bun' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        $blood_component = BloodComponent::where('id', $blood_component_id)->get();
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('$auth_account'))->first()->toArray()['id'];
            $blood_component = $blood_component->where('case_id', $case_id)->first();
        }
        $blood_component->update($validator->validate());
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy(Request $request, $blood_component_id)
    {
        $blood_component = BloodComponent::where('id', $blood_component_id)->get();
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('$auth_account'))->first()->toArray()['id'];
            $blood_component = $blood_component->where('case_id', $case_id)->first();
        }
        $blood_component->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function account(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->first();
        $blood_component = $case->blood_components;
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('$auth_account'))->first()->toArray()['id'];
            $blood_component = $blood_component->where('case_id', $case_id);
        }
        return response(['data' => $blood_component], Response::HTTP_OK);
    }
}
