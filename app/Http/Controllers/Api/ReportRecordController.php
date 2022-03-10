<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\ReportRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ReportRecordController extends Controller
{
    /**
     * @OA\Get (path="/api/reports/account/{account}", tags={"報告個管師紀錄"}, summary="取得報告個管師紀錄",
     *     description="取得報告個管師紀錄",
     *     @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string",)
     *     ),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  allOf={
     *                      @OA\Schema (
     *                          @OA\Property(property="id", type="integer", description="報告各管師編號", example=1),
     *                          @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
     *                      ),
     *                      @OA\Schema (ref="#/components/schemas/report"),
     *                  }
     *              )
     *          )
     *      )
     * )
     */

    public function account(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->first();
        $report_records = $case->report_records;
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $report_records = $report_records->where('case_id', $case_id);
        }
        return response(['data' => $report_records], Response::HTTP_OK);
    }

    /**
     * @OA\Post (path="/api/reports", tags={"報告個管師紀錄"}, summary="新增報告個管師紀錄",
     *      description="新增報告個管師紀錄",
     *      @OA\RequestBody (
     *          @OA\MediaType( mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  allOf={
     *                      @OA\Schema (
     *                          required={"account"},
     *                          @OA\Property(property="account", type="string", description="個案帳號", example="user1"),
     *                      ),
     *                      @OA\Schema (ref="#/components/schemas/report"),
     *                  }
     *              ),
     *          ),
     *      ),
     *      @OA\Response(response=200, description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  allOf={
     *                      @OA\Schema (
     *                          @OA\Property(property="id", type="integer", description="報告個管師編號", example=1),
     *                          @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
     *                      ),
     *                      @OA\Schema (ref="#/components/schemas/report"),
     *                  }
     *              )
     *          )
     *      )
     * )
     */

    public function store(Request $request)
    {
        $rules = [
            'account' => ['required'],
            'date' => ['required'],
            'physical_strength' => ['required'],
            'symptom' => ['required'],
            'hospital' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);

        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
        } else {
            $case_id = CaseModel::where('account', $validator->validate()['account'])->first()->toArray()['id'];
        }
        $result = ['case_id' => $case_id] + $validator->validate();
        $report_record = ReportRecord::create($result);
        $report_record = $report_record->refresh();
        return response(['data' => $report_record], Response::HTTP_CREATED);
    }

    /**
     * @OA\Patch (path="/api/reports/{id}", tags={"報告個管師紀錄"}, summary="更新報告個管師紀錄",
     *     description="更新報告個管師紀錄",
     *     @OA\Parameter (name="id", description="報告個管師紀錄編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer",)
     *     ),
     *      @OA\RequestBody (
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *              @OA\Schema (ref="#/components/schemas/report"),
     *          ),
     *      ),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  allOf={
     *                      @OA\Schema (
     *                          @OA\Property(property="id", type="integer", description="報告個管師編號", example=1),
     *                          @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
     *                      ),
     *                      @OA\Schema (ref="#/components/schemas/report"),
     *                  }
     *              )
     *          )
     *      )
     * )
     */

    public function update(Request $request, $report_id)
    {
        $rules = [
            'date' => ['required'],
            'physical_strength' => ['required'],
            'symptom' => ['required'],
            'hospital' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        $report_record = ReportRecord::where('id', $report_id)->get();
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $report_record = $report_record->where('case_id', $case_id)->first();
        }
        $report_record->update($validator->validate());
        $report_record = $report_record->refresh();
        return response(['data' => $report_record], Response::HTTP_OK);
    }

    /**
     * @OA\Delete (path="/api/reports/{id}", tags={"報告個管師紀錄"}, summary="刪除報告個管師紀錄",
     *     description="刪除報告個管師紀錄",
     *     @OA\RequestBody (
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded",)
     *      ),
     *     @OA\Parameter (name="id", description="報告個管師紀錄編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer",)
     *     ),
     *     @OA\Response(response="200", description="success")
     * )
     */

    public function destroy(Request $request, $report_id)
    {

        $report_record = ReportRecord::where('id', $report_id)->get();
        if (!Auth::check()) {
            $case_id = CaseModel::where('account', $request->get('auth_account'))->first()->toArray()['id'];
            $report_record = $report_record->where('case_id', $case_id)->first();
        }
        $report_record->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
