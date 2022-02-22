<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaseModelController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::name('users.')->controller(UserController::class)->group(function () {
    Route::get('/login', 'show')->name('index');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::name('cases.')->controller(CaseModelController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::prefix('cases')->group(function () {
            Route::post('/', 'store')->name('store');
            Route::get('/{account}', 'show')->name('show');
            Route::patch('/{account}', 'update')->name('update');
            Route::delete('/{account}', 'destroy')->name('destroy');

            Route::get('/{account}/task', 'task')->name('task');
        });
    });

    Route::prefix('tasks')->name('tasks.')->controller(TaskController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        Route::prefix('main')->name('main.')->group(function () {
            Route::get('/edit', 'main')->name('edit');
        });

        Route::prefix('sub')->name('sub.')->group(function () {
            Route::get('/add', 'sub_create')->name('add');

            Route::get('/edit', 'sub_update')->name('edit');
        });
    });


    Route::prefix('topics')->name('topics.')->controller(TopicController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });


    Route::prefix('faqs')->name('faqs.')->controller(FaqController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::prefix('messages')->name('messages.')->controller(MessageController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::prefix('exports')->name('exports.')->controller(ExportController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

});

