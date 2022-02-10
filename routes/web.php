<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('root.login', [
        'title'=>'登入'
    ]);
});

Route::get('/', function () {
    return view('root.case', [
        'title'=>'個案管理'
    ]);
});

Route::get('/case/person', function () {
    return view('case.person', [
        'title'=>'個人資料'
    ]);
});

Route::get('/task', function () {
    return view('root.task', [
        'title'=>'任務管理'
    ]);
});

Route::get('/task/main', function () {
    return view('task.main', [
        'title'=>'修改任務主模板'
    ]);
});

Route::get('/task/create', function () {
    return view('task.create', [
        'title'=>'新增任務副模板'
    ]);
});

Route::get('/task/update', function () {
    return view('task.update', [
        'title'=>'修改任務副模板'
    ]);
});

Route::get('/topic', function () {
    return view('root.topic', [
        'title'=>'題庫管理'
    ]);
});

Route::get('/faq', function () {
    return view('root.faq', [
        'title'=>'QA 管理'
    ]);
});

Route::get('/message', function () {
    return view('root.message', [
        'title'=>'消息管理'
    ]);
});

Route::get('/export', function () {
    return view('root.export', [
        'title'=>'匯出'
    ]);
});
