<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseMedicineExport implements FromArray, WithTitle, WithHeadings
{
    protected $account;
    protected $title;

    public function __construct($account, $has_title=null)
    {
        $this->account = $account;
        $this->title = is_null($has_title) ? null : ' - ' . $account;
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
        return '藥物劑量' . $this->title;
    }
}
