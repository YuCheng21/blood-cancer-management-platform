<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\MedicineRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MedicineRecordController extends Controller
{
    /**
     * @OA\Get (path="/api/medicine/account/{account}", tags={"施打藥物及劑量紀錄"}, summary="取得施打藥物及劑量紀錄",
     *      description="取得施打藥物及劑量紀錄",
     *      @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema (type="string")
     *      ),
     *      @OA\Response (response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  allOf={
     *                      @OA\Schema (
     *                          @OA\Property(property="id", type="integer", description="施打藥物及劑量紀錄編號", example=1),
     *                          @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
     *                          @OA\Property(property="date", type="integer", description="施打日期", example=1),
     *                          @OA\Property(property="course", type="integer", description="週期", example=1),
     *                          @OA\Property(property="type", type="integer", description="藥物種類", example=1),
     *                          @OA\Property(property="dose", type="integer", description="劑量", example=1),
     *                      ),
     *                  }
     *              )
     *          )
     *      )
     * )
     */

    public function account(Request $request, $account){
        $case = CaseModel::where([
            'account' => $account,
        ])->first();
        if (!Auth::check()){
            $case = CaseModel::where([
                'account' => $request->get('auth_account'),
            ])->first();
        }

        return response(['data' => $case->medicine_records], Response::HTTP_OK);
    }
}
