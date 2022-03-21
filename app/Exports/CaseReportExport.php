<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseReportExport implements FromArray, WithTitle, WithHeadings
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

        $report_records = $cases->map(function ($case){
            $report_records = $case
                ->report_records()
                ->orderBy('date')
                ->get();
            $report_records = $report_records->map(function ($report_record) {
                return [
                    $report_record->cases->account,
                    $report_record->date,
                    $report_record->physical_strength->id - 1,
                    $report_record->hospital->id - 1,
                    $report_record->hospital_other,
                ];
            });
            return $report_records;
        });
        return $report_records->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
            '日期',
            '體力滿意度（5非常好4好3普通2不好1非常不好）',
            '固定回診醫院（1高醫2大同3小港4其他）',
            '固定回診醫院其他',
        ];
    }

    public function title(): string
    {
        return '報告個管師' . $this->title;
    }
}
