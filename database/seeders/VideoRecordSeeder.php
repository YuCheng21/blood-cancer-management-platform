<?php

namespace Database\Seeders;

use App\Models\VideoRecord;
use Illuminate\Database\Seeder;

class VideoRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VideoRecord::factory()
            ->count(5)
            ->create();
    }
}
