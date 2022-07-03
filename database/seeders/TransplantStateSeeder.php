<?php

namespace Database\Seeders;

use App\Models\TransplantState;
use Illuminate\Database\Seeder;

class TransplantStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransplantState::create([
            'name' => '未選擇'
        ]);
        TransplantState::create([
            'name' => '第一次完全緩解'
        ]);
        TransplantState::create([
            'name' => '第二次完全緩解'
        ]);
        TransplantState::create([
            'name' => '部分緩解'
        ]);
        TransplantState::create([
            'name' => '復發'
        ]);
        TransplantState::create([
            'name' => '頑固型'
        ]);
    }
}
