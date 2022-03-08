<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseBloodExport implements FromArray, WithTitle, WithHeadings
{
    protected $accounts;
    protected $title;

    public function __construct($accounts, $has_title=null)
    {
        $this->accounts = $accounts;
        $this->title = is_null($has_title) ? null : ' - ' . $accounts;
    }

    public function array(): array
    {
        $cases = CaseModel::whereIn('id', $this->accounts)->get();

        $blood_components = $cases->map(function ($case){
            $blood_components = $case
                ->blood_components()
                ->orderBy('updated_at')
                ->get();
            $blood_components = $blood_components->map(function ($blood_component) {
                return [
                    $blood_component->cases->account,
                    $blood_component->wbc,
                    $blood_component->hb,
                    $blood_component->plt,
                    $blood_component->got,
                    $blood_component->gpt,
                    $blood_component->cea,
                    $blood_component->ca153,
                    $blood_component->bun,
                    $blood_component->updated_at,
                ];
            });
            return $blood_components;
        });
        return $blood_components->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
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
        return '抽血數據' . $this->title;
    }
}
