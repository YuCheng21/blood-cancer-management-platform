<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseBloodExport implements FromArray, WithTitle, WithHeadings
{
    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
    }


    public function array(): array
    {
        $cases = CaseModel::where([
            'account' => $this->account,
        ])->first();
        $blood_components = $cases
            ->blood_components()
            ->orderBy('updated_at')
            ->get();
        $blood_components = $blood_components->map(function ($case) {
            return [
                $case->wbc,
                $case->hb,
                $case->plt,
                $case->got,
                $case->gpt,
                $case->cea,
                $case->ca153,
                $case->bun,
                $case->updated_at,
            ];
        });
        return $blood_components->toArray();
    }

    public function headings(): array
    {
        return [
            '白血球(WBC)',
            '血紅素(Hb)',
            '血小板(PLT)',
            '肝指數(GOT)',
            '肝指數(GPT)',
            '癌指數(CEA)',
            '癌指數(CA153)',
            '尿素氮(BUN)',
            '新增日期',
        ];
    }

    public function title(): string
    {
        return '抽血數據';
    }
}
