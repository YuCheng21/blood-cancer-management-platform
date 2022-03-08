<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseMedicineExport implements FromArray, WithTitle, WithHeadings
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

        $medicine_records = $cases->map(function ($case){
            $medicine_records = $case
                ->medicine_records()
                ->orderBy('date')
                ->get();
            $medicine_records = $medicine_records->map(function ($medicine_record) {
                return [
                    $medicine_record->cases->account,
                    $medicine_record->date,
                    $medicine_record->course,
                    $medicine_record->type,
                    $medicine_record->dose,
                ];
            });
            return $medicine_records;
        });

        return $medicine_records->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
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
