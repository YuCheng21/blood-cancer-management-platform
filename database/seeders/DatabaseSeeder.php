<?php

namespace Database\Seeders;

use App\Models\CaseTask;
use App\Models\Education;
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

            HometownSeeder::class,
            EducationSeeder::class,
            MarriageSeeder::class,
            ReligionSeeder::class,
            ProfessionSeeder::class,
            ProfessionDetailSeeder::class,
            IncomeSeeder::class,
            SourceSeeder::class,

            CaseModelSeeder::class,
            BloodComponentsSeeder::class,

            CategoryInformationSeeder::class,
            TaskSeeder::class,
            TemplateSeeder::class,
            MainTemplateSeeder::class,
            CaseTaskSeeder::class,

            MedicineRecordSeeder::class,
            SideEffectRecordSeeder::class,
            HospitalSeeder::class,
            PhysicalStrengthSeeder::class,
            ReportRecordSeeder::class,

            MessageSeeder::class,

            FaqSeeder::class,

            TopicSeeder::class,

            CaseTopicSeeder::class,
        ]);
    }
}
