<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ReportExport implements WithMultipleSheets
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->accounts as $accounts){
            $sheets[] = new CaseReportExport([$accounts], true);
        }

        return $sheets;
    }
}
