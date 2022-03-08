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
        $this->title = is_null($has_title) ? null : ' - ' . $accounts;
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
                    $report_record->physical_strength,
                    $report_record->symptom,
                    $report_record->hospital,
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
            '體力狀況',
            '症狀',
            '固定回診醫院',
        ];
    }

    public function title(): string
    {
        return '報告個管師' . $this->title;
    }
}
