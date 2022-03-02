<?php

namespace Database\Seeders;

use App\Models\ImageRecord;
use Illuminate\Database\Seeder;

class ImageRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ImageRecord::factory()
            ->count(5)
            ->create();
    }
}
