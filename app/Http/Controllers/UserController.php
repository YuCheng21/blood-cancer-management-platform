<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    function show()
    {
        if (Auth::check()) {
            return redirect()->intended(route('cases.index'));
        }

        $title = '登入';
        return response(
            view('root.login', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    function login(Request $request)
    {
        $rules = [
            'account' => ['required'],
            'password' => ['required'],
        ];
        $customAttributes = [
            'account' => '帳號',
            'password' => '密碼',
        ];
        // validate input data
        $validator = Validator::make($request->all(), $rules, [], $customAttributes)->validated();

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

    public function update(Request $request, $id){
        $rules = [
            'oldPassword' => ['required'],
            'password' => ['required'],
            'passwordConfirm' => ['required'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '表單填寫未完成'
                ]);
        }
        $authenticate = Auth::validate([
            'account' => Auth::user(),
            'password' => $request->oldPassword,
        ]);
        if (!$authenticate){
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '舊密碼錯誤。'
                ]);
        }
        if ($request->password != $request->passwordConfirm){
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => '兩次密碼輸入不同，請確認密碼正確無誤。'
                ]);
        }
        $data = [
            'password' => Hash::make($request->password),
        ];
        try {
            $user = User::where([
                'id' => Auth::id(),
            ])->first();
            $user->update($data);
            return back()
                ->with([
                    'type' => 'success-toast',
                    'msg' => '修改密碼成功。'
                ]);
        }catch (QueryException $queryException){
            return back()
                ->withInput()
                ->with([
                    'type' => 'error',
                    'msg' => 'SQLState: ' . $queryException->errorInfo[0]
                ]);
        }
    }
}
