<?php

namespace App\Http\Controllers;

use App\Models\BloodComponent;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

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
        $auth_account = $request->get('$auth_account');
        $case_id = CaseModel::where('account', $auth_account)->first()->toArray()['id'];
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
        $result = ['case_id' => $case_id] + $validator->validate();
        $blood_component = BloodComponent::create($result);
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BloodComponent $bloodComponent)
    {
//        $auth_account = $request->get('$auth_account');
//        $case = CaseModel::where('account', $auth_account)->first();
//        $blood_components = $case->blood_components;
//        return response(['data' => $blood_components], Response::HTTP_OK);

        return response(['data' => $bloodComponent], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string
     */
    public function update(Request $request, BloodComponent $bloodComponent)
    {
//        $case_id = CaseModel::where('account', $request->get('$auth_account'))->first()->toArray()['id'];
//        $blood_component = BloodComponent::where([
//            'id' => $blood_component_id,
//            'case_id' => $case_id
//        ])->first();
//        $rules = [
//            'wbc' => ['required'],
//            'hb' => ['required'],
//            'plt' => ['required'],
//            'got' => ['required'],
//            'gpt' => ['required'],
//            'cea' => ['required'],
//            'ca153' => ['required'],
//            'bun' => ['required'],
//        ];
//        $validator = Validator::make($request->all(), $rules);
//        $blood_component->update($validator->validate());
//        $blood_component = $blood_component->refresh();
//        return response(['data' => $blood_component], Response::HTTP_OK);

        $bloodComponent->update($request->all());
        $bloodComponent->refresh();
        return response(['data' => $bloodComponent], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy(Request $request, BloodComponent $bloodComponent)
    {
//        $auth_account = $request->get('$auth_account');
//        $case_id = CaseModel::where('account', $auth_account)->first()->toArray()['id'];
//        $blood_component = BloodComponent::where([
//            'id' => $blood_component_id,
//            'case_id' => $case_id
//        ])->first();

        $bloodComponent->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
