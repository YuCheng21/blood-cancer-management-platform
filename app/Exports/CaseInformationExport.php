<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseInformationExport implements FromArray, WithTitle, WithHeadings
{
    protected $accounts;

    public function __construct(array $accounts)
    {
        $this->accounts = $accounts;
    }

    public function array(): array
    {
        $cases = CaseModel::whereIn('id', $this->accounts)->get();
        $cases = $cases->map(function ($case) {
            return [
                $case->account,
                $case->password,
                $case->transplant_num,
                $case->name,
                $case->gender_id - 1,
                $case->birthday,

                $case->hometown_id - 1,
                $case->hometown_other,
                $case->education_id - 1,
                $case->marriage_id - 1,
                $case->religion_id - 1,
                $case->religion_other,
                $case->profession_id - 1,
                $case->profession_detail_id - 1,
                $case->income_id - 1,
                $case->source_id - 1,

                $case->diagnosed,

                $case->date,
                $case->transplant_type->id - 1,
                $case->disease_type->id - 1,
                $case->disease_state->id - 1,
                $case->disease_class->id - 1,
            ];
        });
        return $cases->toArray();
    }

    public function headings(): array
    {
        return [
            '帳號',
            '密碼',
            '移植編號',
            '姓名',
            '性別',
            '生日',

            '籍貫',
            '籍貫其他',
            '教育程度',
            '婚姻',
            '宗教',
            '宗教其他',
            '職業',
            '職業細節',
            '收入',
            '來源人數',

            '確診日期',

            '移植日期',
            '移植種類',
            '疾病種類',
            '疾病分期',
            '疾病類型',
        ];
    }

    public function title(): string
    {
        return '個人資料';
    }
}
