<?php

namespace Database\Seeders;

use App\Models\ProfessionDetail;
use Illuminate\Database\Seeder;

class ProfessionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfessionDetail::create([
            'name' => '未選擇'
        ]);
        ProfessionDetail::create([
            'name' => '全職'
        ]);
        ProfessionDetail::create([
            'name' => '兼職'
        ]);
    }
}
