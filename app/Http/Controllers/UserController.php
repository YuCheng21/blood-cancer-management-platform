<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function show()
    {
        if (Auth::check()) {
            return redirect()
                ->intended(route('cases.index'));
        }

        $title = '登入';
        return response(
            view('root.login', get_defined_vars()),
            200
        );
    }

    function login(Request $request)
    {
        $input = [
            'account' => ['required'],
            'password' => ['required'],
        ];
        $rules = [
            'required' => ':attribute 欄位為必填欄位。',
        ];
        $messages = [
            'account' => '帳號',
            'password' => '密碼',
        ];
        // validate input data
        $validator = Validator::make($request->all(), $input, $rules, $messages)->validated();

        // login successes
        if (Auth::attempt($validator)) {
            $request->session()->regenerate();
            return redirect()
                ->intended(route('cases.index'))
                ->with([
                    'type' => 'success-toast',
                    'msg' => '登入成功'
                ]);
        }

        // login failed
        return back()
            ->withInput()
            ->with([
                'type' => 'error',
                'msg' => '帳號或密碼錯誤'
            ]);
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('users.index')
            ->with([
                'type' => 'success-toast',
                'msg' => '登出成功'
            ]);
    }
}
