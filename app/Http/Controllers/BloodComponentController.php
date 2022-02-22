<?php

namespace App\Http\Controllers;

use App\Models\BloodComponent;
use App\Models\CaseModel;
use Illuminate\Database\QueryException;
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
        if ($validator->fails()) {
            return;
        }
        $case_id = CaseModel::where('account', $auth_account)->first()->toArray()['id'];
        $result = ['case_id' => $case_id] + $validator->validate();
        try {
            $blood_component = BloodComponent::create($result);
            $blood_component = $blood_component->refresh();
            return response(['data' => $blood_component], Response::HTTP_CREATED);
        } catch (QueryException $exception) {
            return;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $account)
    {
        $auth_account = $request->get('$auth_account');
        $case = CaseModel::where('account', $auth_account)->first();
        $blood_components = $case->blood_components;
        return response(['data' => $blood_components], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return string
     */
    public function update(Request $request, $blood_component_id)
    {
        $auth_account = $request->get('$auth_account');
        $case_id = CaseModel::where('account', $auth_account)->first()->toArray()['id'];
        $blood_component = BloodComponent::where([
            'id' => $blood_component_id,
            'case_id' => $case_id
        ])->first();

        if (is_null($blood_component)) {
            return;
        }
        try {
            $data = $request->toArray();
            unset($data['_method']);
            $blood_component->update($data);
            return response(['data' => $blood_component], Response::HTTP_OK);
        }catch (QueryException $queryException){
            return;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return string
     */
    public function destroy(Request $request, $blood_component_id)
    {
        $auth_account = $request->get('$auth_account');
        $case_id = CaseModel::where('account', $auth_account)->first()->toArray()['id'];
        $blood_component = BloodComponent::where([
            'id' => $blood_component_id,
            'case_id' => $case_id
        ])->first();
        if (is_null($blood_component)) {
            return;
        }
        $blood_component->delete();
        return response(['data' => null], Response::HTTP_NO_CONTENT);

    }
}
