<?php

namespace Database\Seeders;

use App\Models\PhysicalStrength;
use Illuminate\Database\Seeder;

class PhysicalStrengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhysicalStrength::create([
            'name' => '未選擇'
        ]);
        PhysicalStrength::create([
            'name' => '非常好'
        ]);
        PhysicalStrength::create([
            'name' => '好'
        ]);
        PhysicalStrength::create([
            'name' => '普通'
        ]);
        PhysicalStrength::create([
            'name' => '不好'
        ]);
        PhysicalStrength::create([
            'name' => '非常不好'
        ]);
    }
}
