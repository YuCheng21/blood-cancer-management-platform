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
        // FakerPHP => https://fakerphp.github.io/formatters/numbers-and-strings/
        $this->call([
            UserSeeder::class,


            GenderSeeder::class,
            TransplantTypeSeeder::class,
            DiseaseTypeSeeder::class,
            DiseaseStateSeeder::class,
            DiseaseClassSeeder::class,

            CaseModelSeeder::class,


            BloodComponentsSeeder::class,


            CategoryInfoSeeder::class,
            TaskSeeder::class,

            MessageSeeder::class,

            FaqSeeder::class,

            TopicSeeder::class,
        ]);
    }
}
