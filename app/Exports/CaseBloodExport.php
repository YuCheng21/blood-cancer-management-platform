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

        $blood_components_name = $this->get_blood_components_name();

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
                $sorted = array_merge(array('account', 'created_at'), $blood_components_name->toArray());
                $result = array_merge(array_fill_keys($sorted, null), $buffer);
                $rows[] = $result;
            }
            return $rows;
        });
        return $blood_components->toArray();
    }

    public function headings(): array
    {
        $blood_components_name = $this->get_blood_components_name();
        foreach ($blood_components_name as $key => $value){
            if ($value == 'wbc'){
                $blood_components_name[$key] = 'WBC(單位10e3/ul)';
            }elseif ($value == 'hb'){
                $blood_components_name[$key] = 'Hb(g/dl)';
            }elseif ($value == 'plt'){
                $blood_components_name[$key] = 'PLT( 10e3/ul)';
            }elseif ($value == 'gpt'){
                $blood_components_name[$key] = 'GPT(IU/ul)';
            }elseif ($value == 'got'){
                $blood_components_name[$key] = 'GOT(IU/ul)';
            }elseif ($value == 'cea'){
                $blood_components_name[$key] = 'CEA(ng/ml)';
            }elseif ($value == 'ca153'){
                $blood_components_name[$key] = 'CA153(U/mL)';
            }elseif ($value == 'bun'){
                $blood_components_name[$key] = 'BUN(mg/dl)';
            }else{
                $blood_components_name[$key] = $value . '(ug/L)';
            }
        }
        return array_merge(array('帳號', '時間'), $blood_components_name->toArray());
    }

    public function title(): string
    {
        return '抽血數據' . $this->title;
    }

    /**
     * @return BloodComponent[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function get_blood_components_name()
    {
        $blood_components = BloodComponent::all();
        $blood_components_name = $blood_components->map(function ($blood_component) {
            return $blood_component->name;
        });
        return $blood_components_name;
    }
}
