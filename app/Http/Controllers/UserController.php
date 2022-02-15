<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
//
//        $real = User::where('account', $account)->first();
//        if(Hash::check($password, $real->password)){
//            $result = 'true';
//        }else{
//            $result = 'false';
//        }
//        return response($result, 200);

//        $users = User::all();
//        foreach ($users as $user) {
//            echo $user->account;
//        }
//        return response($users, 200);

//        $users = User::first()
//            ->update([
//                'account' => 'admin'
//            ]);
//        return response($users, 200);

//        return redirect()->route('users.index')
//            ->with('category', 'success-toast')
//            ->with('message', 'testing message');

    }
}
