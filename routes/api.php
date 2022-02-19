<?php

use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('member.auth')->group(function () {
    Route::get('/test', function (Request $request) {
        $cases = CaseModel::where('account', $request->account)->first();
        if (is_null($cases)) {
            $result = [
                'msg' => 'Account error',
            ];
            return response(json_encode($result, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 400)
                ->header('Content-Type', 'application/json');
        }
        $result = [
            'account' => $cases->account,
            'name' => $cases->name,
            'text' => $request->text . ' world.'
        ];
        return response(json_encode($result, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 200)
            ->header('Content-Type', 'application/json');
    });

    Route::post('/demo', function (Request $request) {
        $input = [
            'account' => ['required'],
            'data1' => ['required'],
            'data2' => ['required'],
        ];
        $validator = Validator::make($request->all(), $input);
        if ($validator->fails()) {
            return response(json_encode([], JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 404);
        }

        return response(json_encode($validator->validate(), JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 200);
    });
});
