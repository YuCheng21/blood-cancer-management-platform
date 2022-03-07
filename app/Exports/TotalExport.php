<?php

namespace App\Exports;

use App\Models\CaseModel;
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

//        $sheets[] = new CaseInformationExport($this->account);
//        $sheets[] = new CaseBloodExport($this->account);
//        $sheets[] = new CaseTaskExport($this->account);
//        $sheets[] = new CaseMedicineExport($this->account);
//        $sheets[] = new CaseEffectExport($this->account);
//        $sheets[] = new CaseReportExport($this->account);

        return $sheets;
    }
}
