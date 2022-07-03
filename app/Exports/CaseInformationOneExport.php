<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseInformationOneExport implements FromArray, WithTitle, WithHeadings
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

                $case->end_date,
                $case->experimental_id - 1,
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

            '籍貫（1閩南2外省3客家4原住民5其他）',
            '籍貫其他',
            '教育程度（1不識字2識字，但未上過小學3國小4國中5高中(職)6大專7研究所以上）',
            '婚姻（1未婚2同居3已婚4分居5離婚6喪偶）',
            '宗教（1無2佛教3基督教4天主教5回教6道教7其他）',
            '宗教其他',
            '職業（1無2有3退休）',
            '職業細節（1全職2兼職）',
            '收入（1(2萬以下)、2(2萬元-4萬元以下)、3(4萬元-6萬元以下)、4(6萬元- 8萬元以下)、5(8萬元-10萬元以下)、6(10萬元以上)）',
            '來源人數（1(1人)、2(2人)、3(3人)、4(4人)、5(5人)、6(6人)）',
            '收案日期(西元年月日)',
            '分組(1實驗組2對照組)',
        ];
    }

    public function title(): string
    {
        return '個人資料';
    }
}
