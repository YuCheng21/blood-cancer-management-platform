<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseEffectExport implements FromArray, WithTitle, WithHeadings
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

        $side_effect_records = $cases->map(function ($case){
            $side_effect_records = $case
                ->side_effect_records()
                ->orderBy('date')
                ->get();
            $side_effect_records = $side_effect_records->map(function ($side_effect_record) {
                return [
                    $side_effect_record->cases->account,
                    $side_effect_record->date,
                    $side_effect_record->symptom,
                    $side_effect_record->severity,
                ];
            });
            return $side_effect_records;
        });

        return $side_effect_records->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
            '紀錄時間',
            '副作用',
            '嚴重度',
        ];
    }

    public function title(): string
    {
        return '副作用' . $this->title;
    }
}
