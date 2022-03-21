<?php

namespace App\Exports;

use App\Helpers\AppHelper;
use App\Models\BloodComponent;
use App\Models\CaseModel;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseBloodExport implements FromArray, WithTitle, WithHeadings
{
    protected $accounts;
    protected $title;

    public function __construct($accounts, $has_title=null)
    {
        $this->accounts = $accounts;
        $this->title = is_null($has_title) ? null : ' - ' . CaseModel::where('id', $accounts[0])->first()['account'];
    }

    public function array(): array
    {
        $cases = CaseModel::whereIn('id', $this->accounts)->get();

        $blood_components = BloodComponent::all();
        $blood_components_name = $blood_components->map(function ($blood_component){
            return $blood_component->name;
        });

        $blood_components = $cases->map(function ($case) use ($blood_components_name) {
            $case_blood_components = $case
                ->case_blood_components()
                ->orderBy('updated_at')
                ->get();

            foreach ($case_blood_components as $case_blood_component){
                $_ = $case_blood_component->blood_component;
            }
            $reformat_blood_components = AppHelper::reformat_by_key($case_blood_components->toArray(), 'created_at');

            $rows = array();
            foreach ($reformat_blood_components as $key => $value){
                $buffer = array();
                $buffer['account'] = $case->account;
                $buffer['created_at'] = $key;
                foreach ($value as $index => $item){
                    $buffer[$item['blood_component']['name']] = $item['value'];
                }
                $sortable = array_merge(array('account', 'created_at'), $blood_components_name->toArray());
                $result = array_merge(array_fill_keys($sortable, null), $buffer);
                $rows[] = $result;
            }
            return $rows;
        });
        return $blood_components->toArray();
    }

    public function headings(): array
    {
        $blood_components = BloodComponent::all();
        $blood_components_name = $blood_components->map(function ($blood_component){
            return $blood_component->name;
        });
        return array_merge(array('帳號', '時間'), $blood_components_name->toArray());
    }

    public function title(): string
    {
        return '抽血數據' . $this->title;
    }
}
