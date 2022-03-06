<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseMedicineExport implements FromArray, WithTitle, WithHeadings
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
        $medicine_records = $cases
            ->medicine_records()
            ->orderBy('date')
            ->get();
        $medicine_records = $medicine_records->map(function ($case) {
            return [
                $case->date,
                $case->course,
                $case->type,
                $case->dose,
            ];
        });
        return $medicine_records->toArray();
    }

    public function headings(): array
    {
        return [
            '日期',
            '療程',
            '施打藥物種類',
            '藥物劑量',
        ];
    }

    public function title(): string
    {
        return '施打藥物紀錄及劑量';
    }
}
