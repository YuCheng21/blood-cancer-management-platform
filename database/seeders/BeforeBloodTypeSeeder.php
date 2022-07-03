<?php

namespace Database\Seeders;

use App\Models\BeforeBloodType;
use Illuminate\Database\Seeder;

class BeforeBloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BeforeBloodType::create([
            'name' => '未選擇'
        ]);
        BeforeBloodType::create([
            'name' => 'A型'
        ]);
        BeforeBloodType::create([
            'name' => 'B型'
        ]);
        BeforeBloodType::create([
            'name' => 'AB型'
        ]);
        BeforeBloodType::create([
            'name' => 'O型'
        ]);
    }
}
