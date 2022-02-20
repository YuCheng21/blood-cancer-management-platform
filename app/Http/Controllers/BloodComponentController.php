<?php

namespace App\Http\Controllers;

use App\Models\BloodComponent;
use App\Models\CaseModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
            \App\Models\BloodComponent::create($result);
            return 'success';
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
        return response(json_encode(
            $blood_components,
            JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE
        ), 200)
            ->header('Content-Type', 'application/json');
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
        $blood_component->update($request);
        return 'success';
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
        return 'success';

    }
}
