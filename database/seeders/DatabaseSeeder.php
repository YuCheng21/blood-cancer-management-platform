<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,


            GenderSeeder::class,
            TransplantTypeSeeder::class,
            DiseaseTypeSeeder::class,
            DiseaseStateSeeder::class,
            DiseaseClassSeeder::class,

            CaseSeeder::class,


            BloodComponentsSeeder::class
        ]);
    }
}
