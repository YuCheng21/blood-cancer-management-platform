<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseReportExport implements FromArray, WithTitle, WithHeadings
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
        $report_records = $cases
            ->report_records()
            ->orderBy('date')
            ->get();
        $report_records = $report_records->map(function ($case) {
            return [
                $case->date,
                $case->physical_strength,
                $case->symptom,
                $case->hospital,
            ];
        });
        return $report_records->toArray();
    }

    public function headings(): array
    {
        return [
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
