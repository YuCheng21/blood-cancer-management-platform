<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TransplantType;

class TransplantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransplantType::create([
            'name' => '未選擇'
        ]);
        TransplantType::create([
            'name' => '自體移植'
        ]);
        TransplantType::create([
            'name' => '異體移植-親屬'
        ]);
        TransplantType::create([
            'name' => '異體移植-非親屬'
        ]);
        TransplantType::create([
            'name' => '異體移植-半相合'
        ]);
        TransplantType::create([
            'name' => '其他'
        ]);
    }
}
