<?php

namespace App\Http\Controllers;

use App\Exports\BloodExport;
use App\Exports\CaseInformationExport;
use App\Exports\EffectExport;
use App\Exports\MedicineExport;
use App\Exports\ReportExport;
use App\Exports\SingleExport;
use App\Exports\TaskExport;
use App\Exports\TotalExport;
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

    public function account($account){
        return Excel::download(new SingleExport($account), $account . '.xlsx');
    }

    public function total(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new TotalExport($selected), '總資料.xlsx');
    }

    public function information(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new CaseInformationExport($selected), '個案資料.xlsx');
    }

    public function blood(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new BloodExport($selected), '抽血數據.xlsx');
    }

    public function task(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new TaskExport($selected), '每週任務.xlsx');
    }

    public function medicine(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new MedicineExport($selected), '藥物劑量.xlsx');
    }

    public function effect(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new EffectExport($selected), '副作用.xlsx');
    }

    public function report(Request $request){
        $selected = json_decode($request->selected);
        if (empty($selected)){
            return back()
                ->with([
                    'type' => 'error',
                    'msg' => '尚未勾選資料'
                ]);
        }
        return Excel::download(new ReportExport($selected), '報告個管師.xlsx');
    }
}
