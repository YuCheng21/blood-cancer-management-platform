<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * @OA\Get (path="/api/messages/account/{account}", tags={"個案消息"}, summary="取得個案消息",
     *     description="取得個案消息",
     *     @OA\Parameter (name="account", description="個案帳號", required=true, in="path", example="user1",
     *          @OA\Schema(type="string")),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/case-message"),
     *                          @OA\Schema (
     *                              @OA\Property(property="message", type="object", allOf={
     *                                  @OA\Schema (ref="#/components/schemas/message")}))}))))))
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

        $case_messages = $case->case_messages;
        foreach ($case_messages as $key => $case_message){
            $limit = Carbon::createFromTimeString($case_message->created_at)->addDays($case_message->limit);
            $now = Carbon::now();
            if ($now->lt($limit)){
                $_ = $case_message->message;
            }
        }
        return response(['data' => $case_messages], Response::HTTP_OK);
    }
}
