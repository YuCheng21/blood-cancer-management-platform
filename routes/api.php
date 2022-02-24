<?php

use Illuminate\Support\Facades\Route;
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
    Route::prefix('blood-components')->name('blood-components.')
        ->controller(BloodComponentController::class)->group(function () {
            Route::post('/', 'store')->name('store');
//            Route::get('/{bloodComponent}', 'show');
            Route::patch('/{blood_component_id}', 'update')->name('update');
            Route::delete('/{blood_component_id}', 'destroy')->name('destroy');
            Route::get('/account/{account}', 'account')->name('account');
        });
});
