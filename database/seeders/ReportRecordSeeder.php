<?php

namespace Database\Seeders;

use App\Models\ReportRecord;
use Illuminate\Database\Seeder;

class ReportRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReportRecord::factory()
            ->count(5)
            ->create();
    }
}
