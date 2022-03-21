<?php

namespace App\Exports;

use App\Models\CaseModel;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Cell\StringValueBinder;

class CaseTaskExport extends StringValueBinder implements FromArray, WithTitle, WithHeadings, WithCustomValueBinder
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
        $case_tasks = $cases->map(function ($case){
            $case_tasks = $case
                ->case_tasks()
                ->orderBy('week')
                ->get();
            $case_tasks = $case_tasks->map(function ($case_task) {
                return [
                    $case_task->cases->account,
                    $case_task->week,
                    Carbon::parse($case_task->start_at)->addDays(($case_task->week - 1) * 7),
                    Carbon::parse($case_task->start_at)->addDays($case_task->week * 7 - 1),
                    $case_task->task->category_1 . ($case_task->task->category_2 == '0' ? '' : '-' . $case_task->task->category_2),
                    $case_task->task->name,
                    ($case_task->state == 'completed' ? '已完成' : '未完成') ,
                ];
            });
            return $case_tasks;
        });
        return $case_tasks->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
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
