<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\TopicController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ReportRecordController;
use App\Http\Controllers\Api\SideEffectRecordController;
use App\Http\Controllers\Api\MedicineRecordController;
use App\Http\Controllers\Api\BloodComponentController;
use App\Http\Controllers\Api\CaseModelController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('member.auth')->name('api.')->group(function () {
    Route::prefix('blood-components')->name('blood-components.')
        ->controller(BloodComponentController::class)->group(function () {
            Route::get('/account/{account}', 'account')->name('account');
            Route::post('/', 'store')->name('store');
            Route::patch('/{blood_component_id}', 'update')->name('update');
            Route::delete('/{blood_component_id}', 'destroy')->name('destroy');
        });
    Route::prefix('cases')->name('cases.')
        ->controller(CaseModelController::class)->group(function () {
            Route::get('/{account}', 'show')->name('show');
        });
    Route::prefix('side-effects')->name('side-effects.')
        ->controller(SideEffectRecordController::class)->group(function (){
            Route::get('/account/{account}', 'account')->name('account');
            Route::post('/', 'store')->name('store');
        });

    Route::prefix('medicine')->name('medicine.')
        ->controller(MedicineRecordController::class)->group(function (){
        Route::get('/account/{account}', 'account')->name('account');
    });

    Route::prefix('reports')->name('reports.')
        ->controller(ReportRecordController::class)->group(function (){
            Route::get('/account/{account}', 'account')->name('account');
            Route::post('/', 'store')->name('store');
            Route::patch('/{report_id}', 'update')->name('update');
            Route::delete('/{report_id}', 'destroy')->name('destroy');
        });

    Route::prefix('tasks')->name('tasks.')
        ->controller(TaskController::class)->group(function (){
            Route::get('/', 'index')->name('index');
            Route::get('/category_information', 'category_information')->name('category_information');
            Route::get('/account/{account}', 'account')->name('account');
            Route::patch('/state/{case_task_id}', 'state')->name('state');
        });

    Route::prefix('topics')->name('topics.')
        ->controller(TopicController::class)->group(function (){
            Route::get('/{task_id}', 'account')->name('account');
            Route::post('/cases', 'cases')->name('cases');
        });

    Route::prefix('faqs')->name('faqs.')
        ->controller(FaqController::class)->group(function (){
            Route::get('/', 'index')->name('index');
            Route::get('/category_1/{category_1}', 'show')->name('show');
        });

    Route::prefix('messages')->name('messages.')
        ->controller(MessageController::class)->group(function (){
            Route::get('/account/{account}', 'account')->name('account');
        });
});
