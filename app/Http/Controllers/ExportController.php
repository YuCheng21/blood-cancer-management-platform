<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cases = CaseModel::all();

//        dd($cases[1]->case_tasks->toArray());

        $title = '匯出';
        return response(
            view('root.export', get_defined_vars()),
            Response::HTTP_OK
        );
    }
}
