<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::all();

        $title = '消息管理';
        return response(
            view('root.message', get_defined_vars()),
            Response::HTTP_OK
        );
    }

}
