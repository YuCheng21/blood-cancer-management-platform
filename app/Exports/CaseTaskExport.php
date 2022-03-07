<?php

namespace App\Exports;

use App\Models\CaseModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseTaskExport implements FromArray, WithTitle, WithHeadings
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
        $case_tasks = $cases
            ->case_tasks()
            ->orderBy('week')
            ->get();
        $case_tasks = $case_tasks->map(function ($case) {
            return [
                $case->week,
                Carbon::parse($case->start_at)->addDays(($case->week - 1) * 7),
                Carbon::parse($case->start_at)->addDays($case->week * 7 - 1),
                $case->task->category_1 . '-' . $case->task->category_2,
                $case->task->name,
                ($case->state == 'completed' ? '已完成' : '未完成') ,
            ];
        });
        return $case_tasks->toArray();
    }

    public function headings(): array
    {
        return [
            '週次',
            '起始時間',
            '結束時間',
            '任務類別',
            '任務名稱',
            '完成進度',
        ];
    }

    public function title(): string
    {
        return '每週任務' . $this->title;
    }
}
