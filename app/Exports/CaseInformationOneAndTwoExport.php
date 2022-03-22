<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CaseInformationOneAndTwoExport implements WithMultipleSheets
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new CaseInformationOneExport($this->accounts);
        $sheets[] = new CaseInformationTwoExport($this->accounts);

        return $sheets;
    }
}
