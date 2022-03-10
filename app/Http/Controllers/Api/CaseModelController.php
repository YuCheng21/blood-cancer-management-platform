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
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="id",type="integer",description="個案編號"),
     *                 @OA\Property(property="account",type="string",description="個案帳號"),
     *                 @OA\Property(property="transplant_num",type="string",description="個案移植編號"),
     *                 @OA\Property(property="name",type="string",description="個案姓名"),
     *                 @OA\Property(property="gender",type="string",description="個案性別"),
     *                 @OA\Property(property="birthday",type="string",description="個案生日"),
     *                 @OA\Property(property="date",type="string",description="個案移植日期"),
     *                 @OA\Property(property="transplant_type",type="string",description="個案移植種類"),
     *                 @OA\Property(property="disease_type",type="string",description="個案疾病種類"),
     *             )
     *         )
     *      )
     *  )
     */

    public function show(Request $request, $account)
    {
        $cases = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $cases = $cases->where('account', $request->get('auth_account'));
        }
        $cases = $cases->map(function ($case){
            $disease_type = $case->disease_type->name;
            $disease_type = $disease_type . ($case->disease_state->name == 1 ? '' : '- ' . $case->disease_state->name);
            $disease_type = $disease_type . ($case->disease_class->name == 1 ? '' : '- ' . $case->disease_class->name);
            return [
                'id' => $case->id,
                'account' => $case->account,
                'transplant_num' => $case->transplant_num,
                'name' => $case->name,
                'gender' => $case->gender->name,
                'birthday' => $case->birthday,
                'date' => $case->date,
                'transplant_type' => $case->transplant_type->name,
                'disease_type' => $disease_type,
            ];
        });
        return response(['data' => $cases], Response::HTTP_OK);
    }
}
