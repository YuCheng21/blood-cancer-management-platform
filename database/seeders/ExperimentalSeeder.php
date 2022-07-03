<?php

namespace Database\Seeders;

use App\Models\Experimental;
use Illuminate\Database\Seeder;

class ExperimentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experimental::create([
            'name' => '未選擇'
        ]);
        Experimental::create([
            'name' => '實驗組'
        ]);
        Experimental::create([
            'name' => '對照組'
        ]);
    }
}
