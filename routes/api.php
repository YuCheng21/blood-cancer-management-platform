<?php

use App\Models\CaseModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\BloodComponentController;

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
    Route::prefix('blood-components')->controller(BloodComponentController::class)->group(function (){
        Route::post('/', 'store');
        Route::get('/{bloodComponent}', 'show');
        Route::patch('/{bloodComponent}', 'update');
        Route::delete('/{bloodComponent}', 'destroy');
    });

});
