<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class SingleExport implements WithMultipleSheets
{
    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function sheets(): array
    {
        $case_id = CaseModel::where('account', $this->account)->first()['id'];

        $sheets = [];

        $sheets[] = new CaseInformationExport([$case_id]);
        $sheets[] = new CaseBloodExport([$case_id]);
        $sheets[] = new CaseTaskExport([$case_id]);
        $sheets[] = new CaseMedicineExport([$case_id]);
        $sheets[] = new CaseEffectExport([$case_id]);
        $sheets[] = new CaseReportExport([$case_id]);

        return $sheets;
    }
}
