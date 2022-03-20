<?php

namespace Database\Seeders;

use App\Models\Income;
use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Income::create([
            'name' => '未選擇'
        ]);
        Income::create([
            'name' => '2 萬以下'
        ]);
        Income::create([
            'name' => '2 萬元 - 4 萬元以下'
        ]);
        Income::create([
            'name' => '4 萬元 - 6 萬元以下'
        ]);
        Income::create([
            'name' => '6 萬元 - 8 萬元以下'
        ]);
        Income::create([
            'name' => '8 萬元 - 10 萬元以下'
        ]);
        Income::create([
            'name' => '10 萬元以上'
        ]);
    }
}
