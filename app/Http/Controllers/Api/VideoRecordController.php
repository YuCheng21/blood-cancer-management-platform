<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\VideoRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class VideoRecordController extends Controller
{
    /**
     * @OA\Post (path="/api/video", tags={"影片觀看紀錄"}, summary="新增影片觀看紀錄",
     *      description="新增影片觀看紀錄",
     *      @OA\RequestBody (
     *          @OA\MediaType( mediaType="multipart/form-data",
     *              @OA\Schema(allOf={
     *                  @OA\Schema (required={"account", "date", "name", "end"},
     *                      @OA\Property(property="account", type="string", description="個案帳號", example="user1"),),
     *                  @OA\Schema (ref="#/components/schemas/video"),}),),),
     *      @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="object", allOf={
     *                      @OA\Schema (ref="#/components/schemas/video")})))))
     */
    public function store(Request $request)
    {
        $rules = [
            'account' => ['required'],
            'date' => ['required'],
            'name' => ['required'],
            'duration' => ['nullable'],
            'end' => ['required'],
            'start' => ['nullable'],
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
        $video_record = VideoRecord::create($data);
        $video_record = $video_record->refresh();
        return response(['data' => $video_record], Response::HTTP_CREATED);
    }
}
