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
     *  @OA\Get(
     *      path="/api/cases/{account}",
     *      tags={"個案資料"},
     *      summary="取得個案資料",
     *      description="取得個案資料",
     *      @OA\Parameter(
     *          name="account",
     *          description="個案帳號",
     *          required=true,
     *          in="path",
     *          example="user1",
     *          @OA\Schema(
     *              type="string",
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="success",
     *          @OA\MediaType(
     *              mediaType="application\json",
     *              @OA\Schema (
     *                  example={{"data": {
     *                      {
     *                          "id": 1,
     *                          "account": "user1",
     *                          "transplant_num": "N0001",
     *                          "name": "王小明1",
     *                          "gender": "男性",
     *                          "birthday": "1999-06-21",
     *                          "date": "2022-02-17",
     *                          "transplant_type": "自體移植",
     *                          "disease_type": "AML- 未選擇- 未選擇"
     *                      },
     *                  },},}
     *              )
     *          )
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
