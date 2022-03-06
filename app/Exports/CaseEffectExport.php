<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseEffectExport implements FromArray, WithTitle, WithHeadings
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
        $side_effect_records = $cases
            ->side_effect_records()
            ->orderBy('date')
            ->get();
        $side_effect_records = $side_effect_records->map(function ($case) {
            return [
                $case->date,
                $case->symptom,
                $case->severity,
            ];
        });
        return $side_effect_records->toArray();
    }

    public function headings(): array
    {
        return [
            '紀錄時間',
            '副作用',
            '嚴重度',
        ];
    }

    public function title(): string
    {
        return '副作用紀錄';
    }
}
