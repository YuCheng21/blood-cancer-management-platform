<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiseaseClass;

class DiseaseClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiseaseClass::create([
            'name' => '未選擇'
        ]);
        DiseaseClass::create([
            'name' => 'B-cell'
        ]);
        DiseaseClass::create([
            'name' => 'T-cell'
        ]);
        DiseaseClass::create([
            'name' => 'Mantle-cell'
        ]);
        DiseaseClass::create([
            'name' => '邊緣 B-cell'
        ]);
        DiseaseClass::create([
            'name' => '其他型'
        ]);
    }
}
