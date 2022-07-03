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

                $case->hla_type_id - 1,
                $case->patient_hla_a1,
                $case->patient_hla_a2,
                $case->patient_hla_b1,
                $case->patient_hla_b2,
                $case->patient_hla_c1,
                $case->patient_hla_c2,
                $case->patient_hla_dr1,
                $case->patient_hla_dr2,
                $case->patient_hla_dq1,
                $case->patient_hla_dq2,
                $case->patient_hla_match,
                $case->donor_hla_a1,
                $case->donor_hla_a2,
                $case->donor_hla_b1,
                $case->donor_hla_b2,
                $case->donor_hla_c1,
                $case->donor_hla_c2,
                $case->donor_hla_dr1,
                $case->donor_hla_dr2,
                $case->donor_hla_dq1,
                $case->donor_hla_dq2,
                $case->donor_hla_match,

                $case->disease_type->id - 1,
                $case->disease_type_other,
                $case->disease_state->id - 1,
                $case->disease_class->id - 1,

                $case->transplant_state_id - 1,
                $case->before_blood_type_id - 1,
                $case->donor_blood_type_id - 1,
                $case->after_blood_type_id - 1,
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

            '異體移植 HLA type(1(有) 2(無))',
            '病人 HLA-A1',
            '病人 HLA-A2',
            '病人 HLA-B2',
            '病人 HLA-B2',
            '病人 HLA-C2',
            '病人 HLA-C2',
            '病人 HLA-DR2',
            '病人 HLA-DR2',
            '病人 HLA-DQ2',
            '病人 HLA-DQ2',
            '病人 HLA-Match',
            '捐贈者 HLA-A1',
            '捐贈者 HLA-A2',
            '捐贈者 HLA-B2',
            '捐贈者 HLA-B2',
            '捐贈者 HLA-C2',
            '捐贈者 HLA-C2',
            '捐贈者 HLA-DR2',
            '捐贈者 HLA-DR2',
            '捐贈者 HLA-DQ2',
            '捐贈者 HLA-DQ2',
            '捐贈者 HLA-Match',

            '疾病種類（1(AML) 2(ALL) 3(MM) 4(何杰金氏淋巴癌) 5(非何杰金氏淋巴癌)）',
            '疾病種類其他',
            '疾病分期（1(1期)2(2期)3(3期)4(4期)）',
            '疾病類型（1(B-cell) 2(T-cell) 3(濾泡型) 4(Mantle-cell) 5(邊緣B-cell) 6(其他型)）',

            '移植時的疾病狀態(1(第一次完全緩解) 2(第二次完全緩解) 3(部份緩解) 4(復發) 5(頑固型)) ',
            '病人移植前血型(1(A型) 2(B型) 3(AB型) 4(O型))',
            '捐贈者血型(1(A型) 2(B型) 3(AB型) 4(O型) 5(無捐贈者))',
            '病人移植後血型(1(A型) 2(B型) 3(AB型) 4(O型))',
        ];
    }

    public function title(): string
    {
        return '疾病特性';
    }
}
