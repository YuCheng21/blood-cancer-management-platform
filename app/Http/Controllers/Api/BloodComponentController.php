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
     * @OA\Get (path="/api/blood-components/account/{account}", tags={"抽血數據"}, summary="取得抽血數據",
     *     description="取得抽血數據",
     *     @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/blood")}))))))
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
        $blood_components = $case->blood_components;
        return response(['data' => $blood_components], Response::HTTP_OK);
    }

    /**
     * @OA\Post (path="/api/blood-components", tags={"抽血數據"}, summary="新增抽血數據",
     *      description="新增抽血數據",
     *      @OA\RequestBody (
     *          @OA\MediaType(mediaType="multipart/form-data",
     *              @OA\Schema(allOf={
     *                  @OA\Schema (
     *                      required={"account", "wbc","hb","plt","got","gpt","cea","ca153","bun"},
     *                      @OA\Property(property="account", type="string", description="個案帳號", example="user1")),
     *                  @OA\Schema (ref="#/components/schemas/blood")}))),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="object", allOf={
     *                      @OA\Schema (ref="#/components/schemas/blood")})))))
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

        $case = CaseModel::where('account', $validator->validate()['account'])->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('auth_account'));
        }
        $case = $case->first();
        if (is_null($case)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $data = [
            'case_id' => $case->id,
        ] + $validator->validate();
        $blood_component = BloodComponent::create($data);
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_CREATED);
    }

    /**
     * @OA\Patch (path="/api/blood-components/{id}", tags={"抽血數據"}, summary="更新抽血數據",
     *     description="更新抽血數據",
     *     @OA\Parameter (name="id", description="抽血數據編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer")),
     *      @OA\RequestBody (
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema (allOf={
     *                  @OA\Schema (required={"wbc","hb","plt","got","gpt","cea","ca153","bun"}),
     *                  @OA\Schema (ref="#/components/schemas/blood")}))),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="object", allOf={
     *                      @OA\Schema (ref="#/components/schemas/blood")})))))
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

        $case = CaseModel::all();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('auth_account'));
        }
        $case = $case->first();
        if (is_null($case)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $blood_component = $case->blood_components->where('id', $blood_component_id)->first();
        if (is_null($blood_component)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $blood_component->update($validator->validate());
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_OK);
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

    public function destroy(Request $request, $blood_component_id)
    {
        $case = CaseModel::all();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('auth_account'));
        }
        $case = $case->first();
        if (is_null($case)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $blood_component = $case->blood_components->where('id', $blood_component_id)->first();
        if (is_null($blood_component)){
            return response(['data' => 'id not exist'], Response::HTTP_NOT_FOUND);
        }
        $blood_component->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
