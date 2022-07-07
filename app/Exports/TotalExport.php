<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TotalExport implements WithMultipleSheets
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function sheets(): array
    {
        $sheets = [];

//        $sheets[] = new CaseInformationExport($this->accounts);
        $sheets[] = new CaseInformationOneExport($this->accounts);
        $sheets[] = new CaseInformationTwoExport($this->accounts);
        $sheets[] = new CaseBloodExport($this->accounts);
        $sheets[] = new CaseTaskExport($this->accounts);
        $sheets[] = new CaseMedicineExport($this->accounts);
        $sheets[] = new CaseEffectExport($this->accounts);
        $sheets[] = new CaseReportExport($this->accounts);
        $sheets[] = new CaseVideoExport($this->accounts);

        return $sheets;
    }
}
