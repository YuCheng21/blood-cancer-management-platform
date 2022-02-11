<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaseController;
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

Route::get(
    '/login',
    [UserController::class, 'show']
)->name('user.index');



Route::get(
    '/',
    [CaseController::class, 'index']
)->name('cases.index');

Route::get(
    '/cases/{account}',
    [CaseController::class, 'show']
)->name('cases.show');

Route::get(
    '/cases/{account}/task',
    [CaseController::class, 'task']
)->name('cases.task');



Route::get(
    '/tasks',
    [TaskController::class, 'index']
)->name('tasks.index');

Route::get(
    '/tasks/main/edit',
    [TaskController::class, 'main']
)->name('tasks.main.edit');

Route::get(
    '/tasks/sub/add',
    [TaskController::class, 'sub_create']
)->name('tasks.sub.add');

Route::get(
    '/tasks/sub/edit',
    [TaskController::class, 'sub_update']
)->name('tasks.sub.edit');


Route::get(
    '/topics',
    [TopicController::class, 'index']
)->name('topics.index');


Route::get(
    '/faqs',
    [FaqController::class, 'index']
)->name('faqs.index');

Route::get(
    '/messages',
    [MessageController::class, 'index']
)->name('messages.index');

Route::get(
    '/exports',
    [ExportController::class, 'index']
)->name('exports.index');
