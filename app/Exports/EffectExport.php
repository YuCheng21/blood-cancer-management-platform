<?php

namespace App\Exports;

use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EffectExport implements WithMultipleSheets
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function sheets(): array
    {
        $cases = CaseModel::whereIn('id', $this->accounts)->get();
        $sheets = [];
        foreach ($cases as $case){
            $sheets[] = new CaseEffectExport($case->account, true);
        }

        return $sheets;
    }
}
