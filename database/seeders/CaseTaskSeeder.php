<?php

namespace Database\Seeders;

use App\Models\CaseTask;
use Illuminate\Database\Seeder;

class CaseTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CaseTask::factory()
            ->count(10)
            ->create();
    }
}
