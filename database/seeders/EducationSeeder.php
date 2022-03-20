<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Education::create([
            'name' => '未選擇'
        ]);
        Education::create([
            'name' => '不識字'
        ]);
        Education::create([
            'name' => '識字，但未上過小學'
        ]);
        Education::create([
            'name' => '國小'
        ]);
        Education::create([
            'name' => '國中'
        ]);
        Education::create([
            'name' => '高中（職）'
        ]);
        Education::create([
            'name' => '大專'
        ]);
        Education::create([
            'name' => '研究所（以上）'
        ]);
    }
}
