<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::create([
            'name' => '未選擇'
        ]);
        Profession::create([
            'name' => '無'
        ]);
        Profession::create([
            'name' => '有'
        ]);
        Profession::create([
            'name' => '退休'
        ]);
    }
}
