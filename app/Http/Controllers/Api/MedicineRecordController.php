<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use App\Models\MedicineRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MedicineRecordController extends Controller
{
    public function account(Request $request, $account){
        $case = CaseModel::where([
            'account' => $account,
        ])->first();
        if (!Auth::check()){
            $case = CaseModel::where([
                'account' => $request->get('auth_account'),
            ])->first();
        }

        return response(['data' => $case->medicine_records], Response::HTTP_OK);
    }
}
