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
        $this->title = is_null($has_title) ? null : ' - ' . CaseModel::where('id', $accounts[0])->first()['account'];
    }

    public function array(): array
    {
        $cases = CaseModel::whereIn('id', $this->accounts)->get();

        $blood_components = $cases->map(function ($case){
            $case_blood_components = $case
                ->case_blood_components()
                ->orderBy('updated_at')
                ->get();
            $case_blood_components = $case_blood_components->map(function ($case_blood_component) {
                return [
                    $case_blood_component->case->account,
                    $case_blood_component->blood_component->created_at,
                    $case_blood_component->blood_component->name,
                    $case_blood_component->value,
                ];
            });
            return $case_blood_components;
        });
        return $blood_components->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
            '時間',
            '類型',
            '數值',
        ];
    }

    public function title(): string
    {
        return '抽血數據' . $this->title;
    }
}
