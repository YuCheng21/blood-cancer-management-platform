<?php

namespace Database\Seeders;

use App\Models\HlaType;
use Illuminate\Database\Seeder;

class HlaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HlaType::create([
            'name' => '未選擇'
        ]);
        HlaType::create([
            'name' => '有'
        ]);
        HlaType::create([
            'name' => '無'
        ]);
    }
}
