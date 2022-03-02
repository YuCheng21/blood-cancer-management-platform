<?php

namespace Database\Seeders;

use App\Models\MedicineRecord;
use Illuminate\Database\Seeder;

class MedicineRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MedicineRecord::factory()
            ->count(5)
            ->create();
    }
}
