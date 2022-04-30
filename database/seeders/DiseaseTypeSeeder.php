<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiseaseType;

class DiseaseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiseaseType::create([
            'name' => '未選擇'
        ]);
        DiseaseType::create([
            'name' => 'AML'
        ]);
        DiseaseType::create([
            'name' => 'ALL'
        ]);
        DiseaseType::create([
            'name' => 'MM'
        ]);
        DiseaseType::create([
            'name' => '何杰金氏淋巴癌'
        ]);
        DiseaseType::create([
            'name' => '非何杰金氏淋巴癌'
        ]);
        DiseaseType::create([
            'name' => '其他'
        ]);
    }
}
