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

Route::post('/login', function (Request $request){
    $input = [
        'account' => ['required'],
        'password' => ['required'],
    ];
    $validator = Validator::make($request->all(), $input);

    if ($validator->fails()) {
        return response(
            json_encode([], JSON_FORCE_OBJECT),
            401
        );
    }

    $case = CaseModel::where('account', $request->account)->first();
    if (is_null($case)){
        return response(
            json_encode([], JSON_FORCE_OBJECT),
            401
        );
    }

    return response(
        json_encode($case, JSON_FORCE_OBJECT|JSON_UNESCAPED_UNICODE),
        200
    );
});
