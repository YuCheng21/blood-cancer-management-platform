<?php

namespace App\Http\Controllers;

use App\Models\CaseModel;

class EffectRecordController extends Controller
{
    public function destroy($account, $id)
    {
        $case = CaseModel::where([
            'account' => $account,
        ])->first();
        $effect_record = $case->side_effect_records()->where([
            'id' => $id,
        ])->first();
        if (!is_null($effect_record)) {
            $effect_record->delete();
        }
        return redirect()
            ->route('cases.show', ['account' => $account, '#effectRecord'])
            ->with([
                'type' => 'success-toast',
                'msg' => '刪除副作用紀錄成功。'
            ]);
    }
}
