<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CaseModelController extends Controller
{
    /**
     *  @OA\Get(path="/api/cases/{account}", tags={"個案資料"}, summary="取得個案資料",
     *      description="取得個案資料",
     *      @OA\Parameter(name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string")),
     *      @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="id",type="integer",description="個案編號"),
     *                 @OA\Property(property="account",type="string",description="個案帳號"),
     *                 @OA\Property(property="transplant_num",type="string",description="個案移植編號"),
     *                 @OA\Property(property="name",type="string",description="個案姓名"),
     *                 @OA\Property(property="gender",type="string",description="個案性別"),
     *                 @OA\Property(property="birthday",type="string",description="個案生日"),
     *
     *                 @OA\Property(property="hometown",type="string",description="個案籍貫"),
     *                 @OA\Property(property="hometown_other",type="string",description="籍貫其他"),
     *                 @OA\Property(property="education",type="string",description="教育程度"),
     *                 @OA\Property(property="marriage",type="string",description="婚姻"),
     *                 @OA\Property(property="religion",type="string",description="宗教"),
     *                 @OA\Property(property="religion_other",type="string",description="宗教其他"),
     *                 @OA\Property(property="profession",type="string",description="職業"),
     *                 @OA\Property(property="profession_detail",type="string",description="職業細節"),
     *                 @OA\Property(property="income",type="string",description="收入"),
     *                 @OA\Property(property="source",type="string",description="來源人數"),
     *
     *                 @OA\Property(property="diagnosed",type="string",description="確診日期"),
     *
     *                 @OA\Property(property="date",type="string",description="個案移植日期"),
     *                 @OA\Property(property="transplant_type",type="string",description="個案移植種類"),
     *                 @OA\Property(property="disease_type",type="string",description="個案疾病種類")))))
     */

    public function show(Request $request, $account)
    {
        $cases = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $cases = $cases->where('account', $request->get('auth_account'));
        }
        $cases = $cases->map(function ($case){
            return [
                'id' => $case->id,
                'account' => $case->account,
                'transplant_num' => $case->transplant_num,
                'name' => $case->name,
                'gender' => $case->gender->name,
                'birthday' => $case->birthday,

                'hometown' => $case->hometown->name,
                'hometown_other' => $case->hometown_other,
                'education' => $case->education->name,
                'marriage' => $case->marriage->name,
                'religion' => $case->religion->name,
                'religion_other' => $case->religion_other,
                'profession' => $case->profession->name,
                'profession_detail' => $case->profession_detail->name,
                'income' => $case->income->name,
                'source' => $case->source->name,

                'diagnosed' => $case->diagnosed,

                'date' => $case->date,
                'transplant_type' => $case->transplant_type->name,
                'disease_type' => $case->disease_type->name,
                'disease_state' => $case->disease_state->name,
                'disease_class' => $case->disease_class->name,
            ];
        });
        return response(['data' => $cases], Response::HTTP_OK);
    }
}
