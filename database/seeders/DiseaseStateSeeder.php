<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DiseaseState;

class DiseaseStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiseaseState::create([
            'name' => '第一期'
        ]);
        DiseaseState::create([
            'name' => '第二期'
        ]);
        DiseaseState::create([
            'name' => '第三期'
        ]);
        DiseaseState::create([
            'name' => '第四期'
        ]);
    }
}
