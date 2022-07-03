<?php

namespace Database\Seeders;

use App\Models\DonorBloodType;
use Illuminate\Database\Seeder;

class DonorBloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DonorBloodType::create([
            'name' => '未選擇'
        ]);
        DonorBloodType::create([
            'name' => 'A型'
        ]);
        DonorBloodType::create([
            'name' => 'B型'
        ]);
        DonorBloodType::create([
            'name' => 'AB型'
        ]);
        DonorBloodType::create([
            'name' => 'O型'
        ]);
        DonorBloodType::create([
            'name' => '無捐贈者'
        ]);
    }
}
