<?php

namespace Database\Seeders;

use App\Models\CategoryInformation;
use Illuminate\Database\Seeder;

class CategoryInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        CategoryInformation::factory()
//            ->count(9)
//            ->create();
        CategoryInformation::create([
            'category_1' => 1,
            'name' => '造血幹細胞移植的認識',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 2,
            'name' => '造血幹細胞移植前評估',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 3,
            'name' => '移植室的環境介紹',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 4,
            'name' => '移植前的自我準備',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 5,
            'name' => '造血幹細胞移植前的調理治療',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 6,
            'name' => '輸造血幹細胞日',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 7,
            'name' => '造血幹細胞移植併發症及治療',
            'short' => '',
        ]);
        CategoryInformation::create([
            'category_1' => 8,
            'name' => '自我照護',
            'short' => '',
        ]);
    }
}
