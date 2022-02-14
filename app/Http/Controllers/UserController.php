<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function show()
    {
        $title = '登入';

        return response(
            view('root.login', get_defined_vars()),
            200
        );
    }

    function login(Request $request)
    {
//        $account = $request['account'];
//        $password = $request['password'];
//        $role = $request['role'];
//
//        $users = DB::table('users')->get();
//
//        return response($users, 200);



        return redirect()->route('user.index')
            ->with('category', 'success-toast')
            ->with('message', 'testing message');

    }
}
