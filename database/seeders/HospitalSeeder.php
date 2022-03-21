<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'name' => '未選擇'
        ]);
        Hospital::create([
            'name' => '高醫'
        ]);
        Hospital::create([
            'name' => '大同'
        ]);
        Hospital::create([
            'name' => '小港'
        ]);
        Hospital::create([
            'name' => '其他'
        ]);
    }
}
