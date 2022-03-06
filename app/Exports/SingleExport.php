<?php

namespace App\Exports;

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
        $sheets = [];

        $sheets[] = new CaseInformationExport($this->account);
        $sheets[] = new CaseBloodExport($this->account);
        $sheets[] = new CaseTaskExport($this->account);
        $sheets[] = new CaseMedicineExport($this->account);
        $sheets[] = new CaseEffectExport($this->account);
        $sheets[] = new CaseReportExport($this->account);

        return $sheets;
    }
}
