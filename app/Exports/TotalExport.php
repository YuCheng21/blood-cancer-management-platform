<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class TotalExport implements FromArray, WithTitle, WithHeadings
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
                $case->gender->name,
                $case->birthday,
                $case->date,
                $case->transplant_type->name,
                $case->disease_type->name . ' - ' . $case->disease_state->name . ' - ' . $case->disease_class->name,
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
            '移植日期',
            '移植種類',
            '疾病種類',
        ];
    }

    public function title(): string
    {
        return '個人資料';
    }
}
