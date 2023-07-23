<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodComponent;
use App\Models\CaseBloodComponent;
use Illuminate\Database\QueryException;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use function response;

class BloodComponentController extends Controller
{
    public function add($account, Request $request)
    {
        $rules = [
            'createBloodComponentName' => ['required'],
            'createBloodComponentValue' => ['required'],
            'createBloodComponentDate' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()
                ->route('cases.show', ['account' => $account, '#BloodComponent'])
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成。'
                ]);
        }
        $case = CaseModel::where([
            'account' => $account,
        ])->first();

        $blood_component = BloodComponent::where('name', $validator->validate()['createBloodComponentName'])->first();
        if (is_null($blood_component)){
            $blood_component = BloodComponent::create([
                'name' => $validator->validate()['createBloodComponentName'],
            ]);
        }

        $data = [
                'case_id' => $case->id,
                'blood_id' => $blood_component->id,
                'value' => $request->createBloodComponentValue,
                'created_at' => $request->createBloodComponentDate,
            ] + $validator->validate();

        $case_blood_component = CaseBloodComponent::create($data);
        $case_blood_component = $case_blood_component->refresh();
        $case_blood_component['blood_component'] = $blood_component;

        try {
            $case_blood_component = CaseBloodComponent::create($data);
            $case_blood_component = $case_blood_component->refresh();
            $case_blood_component['blood_component'] = $blood_component;
            return redirect()
                ->route('cases.show', ['account' => $account, '#BloodComponent'])
                ->with([
                    'type' => 'success-toast',
                    'msg' => '新增抽血數據成功。'
                ]);
        }catch (QueryException $queryException){
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }
    /**
     * @OA\Get (path="/api/blood-components/account/{account}", tags={"抽血數據"}, summary="取得抽血數據",
     *     description="取得抽血數據",
     *     @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/case-blood"),
     *                          @OA\Schema (
     *                              @OA\Property(property="blood_component", type="object", allOf={
     *                                  @OA\Schema (ref="#/components/schemas/blood")}))}))))))
     */

    public function account(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('auth_account'));
        }
        $case = $case->first();
        if (is_null($case)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $case_blood_components = $case->case_blood_components;
        foreach ($case_blood_components as $case_blood_component){
            $_ = $case_blood_component->blood_component;
        }
        return response(['data' => $case_blood_components], Response::HTTP_OK);
    }

    /**
     * @OA\Post (path="/api/blood-components", tags={"抽血數據"}, summary="新增抽血數據",
     *      description="新增抽血數據",
     *      @OA\RequestBody (
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(allOf={
     *                  @OA\Schema (required={"account", "blood_component_name","created_at","value"},
     *                      @OA\Property(property="account", type="string", description="個案帳號", example="user1"),
     *                      @OA\Property(property="blood_component_name", type="string", description="抽血項目類型名稱", example="new_name"),
     *                      @OA\Property(property="created_at", type="string", description="日期", example="2022-03-28 17:32:25"),
     *                      @OA\Property(property="value", type="integer", description="抽血項目類型數值", example="999"))}))),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/case-blood"),
     *                          @OA\Schema (
     *                              @OA\Property(property="blood_component", type="object", allOf={
     *                                  @OA\Schema (ref="#/components/schemas/blood")}))}))))))
     */

    public function store(Request $request)
    {
        $rules = [
            'account' => ['required'],
            'blood_component_name' => ['required'],
            'value' => ['required'],
            'created_at' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);

        $case = CaseModel::where('account', $validator->validate()['account'])->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('auth_account'));
        }
        $case = $case->first();
        if (is_null($case)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }

        $blood_component = BloodComponent::where('name', $validator->validate()['blood_component_name'])->first();
        if (is_null($blood_component)){
            $blood_component = BloodComponent::create([
                'name' => $validator->validate()['blood_component_name'],
            ]);
        }

        $data = [
            'case_id' => $case->id,
            'blood_id' => $blood_component->id,
        ] + $validator->validate();
        $case_blood_component = CaseBloodComponent::create($data);
        $case_blood_component = $case_blood_component->refresh();
        $case_blood_component['blood_component'] = $blood_component;
        return response(['data' => $case_blood_component], Response::HTTP_CREATED);
    }

    /**
     * @OA\Patch (path="/api/blood-components/{id}", tags={"抽血數據"}, summary="更新抽血數據",
     *     description="更新抽血數據",
     *     @OA\Parameter (name="id", description="抽血數據編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer")),
     *      @OA\RequestBody (
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema (allOf={
     *                  @OA\Schema (required={"value"},
     *                      @OA\Property(property="value", type="integer", description="抽血項目類型數值", example="999"))}))),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="object", allOf={
     *                      @OA\Schema (ref="#/components/schemas/case-blood")})))))
     */

    public function update(Request $request, $case_blood_component_id)
    {
        $rules = [
            'value' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);

        $condition = [
            'id' => $case_blood_component_id,
        ];
        if (!Auth::check()) {
            $case = CaseModel::where('account', $request->get('auth_account'))->first();
            $condition += [
                'case_id' => $case->id,
            ];
        }
        $case_blood_component = CaseBloodComponent::where($condition)->first();

        if (is_null($case_blood_component)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $case_blood_component->update($validator->validate());
        $case_blood_component = $case_blood_component->refresh();
        return response(['data' => $case_blood_component], Response::HTTP_OK);
    }

    /**
     * @OA\Delete (path="/api/blood-components/{id}", tags={"抽血數據"}, summary="刪除抽血數據",
     *     description="刪除抽血數據",
     *     @OA\RequestBody (
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded")),
     *     @OA\Parameter (name="id", description="抽血數據編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="success"))
     */

    public function destroy(Request $request, $case_blood_component_id)
    {
        $condition = [
            'id' => $case_blood_component_id
        ];
        if (!Auth::check()) {
            $case = CaseModel::where('account', $request->get('auth_account'))->first();
            $condition += [
                'case_id' => $case->id,
            ];
        }
        $case_blood_component = CaseBloodComponent::where($condition)->first();
        if (is_null($case_blood_component)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $case_blood_component->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
