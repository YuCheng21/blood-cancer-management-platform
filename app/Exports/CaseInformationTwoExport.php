<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseInformationTwoExport implements FromArray, WithTitle, WithHeadings
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
                $case->diagnosed,

                $case->date,
                $case->transplant_type->id - 1,
                $case->transplant_type_other,
                $case->disease_type->id - 1,
                $case->disease_type_other,
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
            '確診日期',

            '移植日期',
            '移植種類（1自體移植 2異體移植）',
            '移植種類其他',
            '疾病種類（1(1期)2(2期)3(3期)4(4期)）',
            '疾病種類其他',
            '疾病分期（1(AML) 2(ALL) 3(MM) 4(何杰金氏淋巴癌) 5(非何杰金氏淋巴癌)）',
            '疾病類型（1(B-cell) 2(T-cell) 3(濾泡型) 4(Mantle-cell) 5(邊緣B-cell 6其他型)）',
        ];
    }

    public function title(): string
    {
        return '疾病特性';
    }
}
