<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseVideoExport implements FromArray, WithTitle, WithHeadings
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

        $video_records = $cases->map(function ($case){
            $video_records = $case
                ->video_records()
                ->orderBy('date')
                ->get();
            $video_records = $video_records->map(function ($video_record) {
                return [
                    $video_record->cases->account,
                    $video_record->date,
                    $video_record->end,
                ];
            });
            return $video_records;
        });
        return $video_records->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
            '日期',
            '觀看時間（秒）',
        ];
    }

    public function title(): string
    {
        return '觀影紀錄' . $this->title;
    }
}
