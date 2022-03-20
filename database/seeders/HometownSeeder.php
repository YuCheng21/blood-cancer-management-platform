<?php

namespace Database\Seeders;

use App\Models\Hometown;
use Illuminate\Database\Seeder;

class HometownSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hometown::create([
            'name' => '未選擇'
        ]);
        Hometown::create([
            'name' => '閩南'
        ]);
        Hometown::create([
            'name' => '外省'
        ]);
        Hometown::create([
            'name' => '客家'
        ]);
        Hometown::create([
            'name' => '原住民'
        ]);
        Hometown::create([
            'name' => '其他'
        ]);
    }
}
