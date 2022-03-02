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
        CategoryInformation::factory()
            ->count(9)
            ->create();
    }
}
