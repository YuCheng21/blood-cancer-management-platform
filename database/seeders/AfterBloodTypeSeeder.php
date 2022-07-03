<?php

namespace Database\Seeders;

use App\Models\AfterBloodType;
use Illuminate\Database\Seeder;

class AfterBloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AfterBloodType::create([
            'name' => '未選擇'
        ]);
        AfterBloodType::create([
            'name' => 'A型'
        ]);
        AfterBloodType::create([
            'name' => 'B型'
        ]);
        AfterBloodType::create([
            'name' => 'AB型'
        ]);
        AfterBloodType::create([
            'name' => 'O型'
        ]);
    }
}
