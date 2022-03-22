<?php

namespace App\Exports;

use App\Helpers\AppHelper;
use App\Models\CaseModel;
use App\Models\SideEffectRecord;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class CaseEffectExport implements FromArray, WithTitle, WithHeadings
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

        $effect_item_sorted = $this->get_effect_item_sorted();
        $side_effect_records = $cases->map(function ($case) use ($effect_item_sorted) {
            $side_effect_records = $case
                ->side_effect_records()
                ->orderBy('date')
                ->get();

            $reformat_blood_components = AppHelper::reformat_by_key($side_effect_records->toArray(), 'date');
            $rows = array();
            foreach($reformat_blood_components as $key => $value){
                $buffer = array();
                $buffer['account'] = $case->account;
                $buffer['date'] = $key;
                foreach($value as $index => $item){
                    $buffer[$item['symptom']] = $item['difficulty'];
                }
                $sorted = array_merge(array('account', 'date'), $effect_item_sorted);
                $result = array_merge(array_fill_keys($sorted, '0'), $buffer);
                $rows[] = $result;
            }
            return $rows;
        });
        return $side_effect_records->toArray();
    }

    public function headings(): array
    {
        $effect_item_sorted = $this->get_effect_item_sorted();
        return array_merge(array('帳號', '時間'), $effect_item_sorted);
    }

    public function title(): string
    {
        return '副作用' . $this->title;
    }

    /**
     * @return int[]|string[]
     */
    public function get_effect_item_sorted(): array
    {
        $effect_item = ['白血球', '血小板', '血紅素', '口腔黏膜炎', '噁心嘔吐', '腹瀉', '掉髮', '癲癇', '出血性膀胱炎', '心跳偏快', '臉部潮紅'];
        $effect_unique = DB::table('side_effect_records')->select('symptom')->distinct()->get();
        $effect_unique = array_column($effect_unique->toArray(), 'symptom');
        $effect_item_sorted = array_keys(array_merge(array_fill_keys($effect_item, null), array_flip($effect_unique)));
        return $effect_item_sorted;
    }
}
