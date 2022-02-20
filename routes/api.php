<?php

use App\Models\CaseModel;
use Illuminate\Database\QueryException;
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
    Route::post('/blood-components', function (Request $request) {
        $account = $request->get('account');
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
        if ($validator->fails()) {
            return;
        }
        $case_id = CaseModel::where('account', $account)->first()->toArray()['id'];
        $result = ['case_id' => $case_id] + $validator->validate();
        try {
            \App\Models\BloodComponent::create($result);
            return 'success';
        } catch (QueryException $exception) {
            return;
        }
    });

    Route::post('/test', function (Request $request) {
        $account = $request->get('account');
        $rules = [
            'data1' => ['required'],
            'data2' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return;
        }

        $cases = CaseModel::where('account', $account)->first();
        if (is_null($cases)) {
            return;
        }

        $result = [
            'cases' => $cases->toArray(),
            'validate' => $validator->validate()
        ];
        $result['validate']['data2'] = $result['validate']['data2'] . ' 3';
        return response(json_encode(
            $result,
            JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE
        ), 200)
            ->header('Content-Type', 'application/json');
    });
});
