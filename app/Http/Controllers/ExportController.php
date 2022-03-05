<?php

namespace App\Http\Controllers;

use App\Exports\CaseExport;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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

        $title = '匯出';
        return response(
            view('root.export', get_defined_vars()),
            Response::HTTP_OK
        );
    }

    public function test(){
        return Excel::download(new CaseExport, 'test.xlsx');
    }
}
