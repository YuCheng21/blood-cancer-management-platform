<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TaskExport implements WithMultipleSheets
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->accounts as $account){
            $sheets[] = new CaseTaskExport([$account], true);
        }

        return $sheets;
    }
}
