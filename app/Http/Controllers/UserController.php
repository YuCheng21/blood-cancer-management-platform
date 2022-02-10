<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function show()
    {
        $title = '登入';
        return view('root.login', [
            'title' => $title
        ]);
    }
}
