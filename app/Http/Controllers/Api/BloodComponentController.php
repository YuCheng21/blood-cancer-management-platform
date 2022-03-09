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
     * @OA\Post (
     *      path="/api/blood-components",
     *      tags={"抽血數據"},
     *      summary="新增抽血數據",
     *      description="新增抽血數據",
     *      @OA\RequestBody (
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(required={"wbc","hb","plt","got","gpt","cea","ca153","bun","account"},
     *                  @OA\Property(property="account", type="string", example=555),
     *                  @OA\Property(property="wbc", type="integer", example=555),
     *                  @OA\Property(property="hb", type="integer", example=555),
     *                  @OA\Property(property="plt", type="integer", example=555),
     *                  @OA\Property(property="got", type="integer", example=555),
     *                  @OA\Property(property="gpt", type="integer", example=555),
     *                  @OA\Property(property="cea", type="integer", example=555),
     *                  @OA\Property(property="ca153", type="integer", example=555),
     *                  @OA\Property(property="bun", type="integer", example=555),
     *              ),
     *          ),
     *      ),
     *      @OA\Response(response=200, description="success")
     * )
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
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
        } else {
            $case_id = CaseModel::where('account', $validator->validate()['account'])->first()->toArray()['id'];
        }
        $result = ['case_id' => $case_id] + $validator->validate();
        $blood_component = BloodComponent::create($result);
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_CREATED);
    }

    /**
     * @OA\Patch (
     *      path="/api/blood-components/{id}",
     *     tags={"抽血數據"},
     *     summary="更新抽血數據",
     *     description="更新抽血數據",
     *     @OA\Parameter (name="id", description="抽血數據編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer",)
     *     ),
     *      @OA\RequestBody (
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema(required={"wbc","hb","plt","got","gpt","cea","ca153","bun"},
     *                  @OA\Property(property="wbc", type="integer", example=555),
     *                  @OA\Property(property="hb", type="integer", example=555),
     *                  @OA\Property(property="plt", type="integer", example=555),
     *                  @OA\Property(property="got", type="integer", example=555),
     *                  @OA\Property(property="gpt", type="integer", example=555),
     *                  @OA\Property(property="cea", type="integer", example=555),
     *                  @OA\Property(property="ca153", type="integer", example=555),
     *                  @OA\Property(property="bun", type="integer", example=555),
     *              ),
     *          ),
     *      ),
     *     @OA\Response(response="200", description="success",)
     * )
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
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $blood_component = $blood_component->where('case_id', $case_id)->first();
        }
        $blood_component->update($validator->validate());
        $blood_component = $blood_component->refresh();
        return response(['data' => $blood_component], Response::HTTP_OK);
    }

    /**
     * @OA\Delete (
     *      path="/api/blood-components/{id}",
     *     tags={"抽血數據"},
     *     summary="刪除抽血數據",
     *     description="刪除抽血數據",
     *     @OA\RequestBody (
     *          @OA\MediaType(
     *              mediaType="application/x-www-form-urlencoded",
     *          )
     *      ),
     *     @OA\Parameter (name="id", description="抽血數據編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer",)
     *     ),
     *     @OA\Response(response="200", description="success",)
     * )
     */

    public function destroy(Request $request, $blood_component_id)
    {
        $blood_component = BloodComponent::where('id', $blood_component_id)->get();
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $blood_component = $blood_component->where('case_id', $case_id)->first();
        }
        $blood_component->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @OA\Get (
     *     path="/api/blood-components/account/{account}",
     *     tags={"抽血數據"},
     *     summary="取得抽血數據",
     *     description="取得抽血數據",
     *     @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string",)
     *     ),
     *     @OA\Response(response="200", description="success",)
     * )
     */

    public function account(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->first();
        $blood_component = $case->blood_components;
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $blood_component = $blood_component->where('case_id', $case_id);
        }
        return response(['data' => $blood_component], Response::HTTP_OK);
    }
}
