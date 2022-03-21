<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Task::factory()
//            ->count(40)
//            ->create();

        // 第一版

////        Task::create([
////            'category_1' => 1,
////            'category_2' => '0',
////            'name' => '造血幹細胞移植的認識',
////        ]);
//        Task::create([
//            'category_1' => 1,
//            'category_2' => '1',
//            'name' => '造血幹細胞移植介紹',
//        ]);
//        Task::create([
//            'category_1' => 1,
//            'category_2' => '2-1',
//            'name' => '造血幹細胞移植分類-自體造血幹細胞移植',
//        ]);
//        Task::create([
//            'category_1' => 1,
//            'category_2' => '2-2',
//            'name' => '造血幹細胞移植分類-異體造血幹細胞移植',
//        ]);
////        Task::create([
////            'category_1' => 2,
////            'category_2' => '0',
////            'name' => '造血幹細胞移植前評估',
////        ]);
//        Task::create([
//            'category_1' => 2,
//            'category_2' => '1',
//            'name' => '治療說明會',
//        ]);
//        Task::create([
//            'category_1' => 2,
//            'category_2' => '2',
//            'name' => '費用準備',
//        ]);
//        Task::create([
//            'category_1' => 2,
//            'category_2' => '3',
//            'name' => '各項醫療照會',
//        ]);
//        Task::create([
//            'category_1' => 2,
//            'category_2' => '4',
//            'name' => '各項檢查項目',
//        ]);
//        Task::create([
//            'category_1' => 2,
//            'category_2' => '5',
//            'name' => '各項血液檢驗',
//        ]);
////        Task::create([
////            'category_1' => 3,
////            'category_2' => '0',
////            'name' => '移植室的環境介紹',
////        ]);
////        Task::create([
////            'category_1' => 4,
////            'category_2' => '0',
////            'name' => '移植前的自我準備',
////        ]);
//        Task::create([
//            'category_1' => 4,
//            'category_2' => '1',
//            'name' => '身體清潔',
//        ]);
//        Task::create([
//            'category_1' => 4,
//            'category_2' => '2',
//            'name' => '用物準備',
//        ]);
////        Task::create([
////            'category_1' => 5,
////            'category_2' => '0',
////            'name' => '造血幹細胞移植前的調理治療',
////        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '1',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '2',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '3',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '4',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '5',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '6',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '7',
//            'name' => '化學藥物種類-福樂達(Fludarabine)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '8',
//            'name' => '化學藥物種類-補束剋(Busulfan)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '9',
//            'name' => '化學藥物種類-補束剋(Busulfan)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '10',
//            'name' => '化學藥物種類-補束剋(Busulfan)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '11',
//            'name' => '化學藥物種類-補束剋(Busulfan)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '12',
//            'name' => '化學藥物種類-補束剋(Busulfan)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '13',
//            'name' => '化學藥物種類-補束剋(Busulfan)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '14',
//            'name' => '化學藥物種類-補束剋(Busulfan)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '15',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '16',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '17',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '18',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '19',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '20',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '21',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-出血性膀胱炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '22',
//            'name' => '化學藥物種類-癌達星(Cyclophosphamide)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '23',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '24',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '25',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '26',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '27',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '28',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '29',
//            'name' => '化學藥物種類-威克瘤(Melphalan)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '30',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '31',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '32',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '33',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '34',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '35',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '36',
//            'name' => '化學藥物種類-癌妥滅(Etopositde)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '37',
//            'name' => '化學藥物種類-格立德(BiCNU)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '38',
//            'name' => '化學藥物種類-格立德(BiCNU)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '39',
//            'name' => '化學藥物種類-格立德(BiCNU)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '40',
//            'name' => '化學藥物種類-格立德(BiCNU)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '41',
//            'name' => '化學藥物種類-格立德(BiCNU)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '42',
//            'name' => '化學藥物種類-格立德(BiCNU)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '43',
//            'name' => '化學藥物種類-格立德(BiCNU)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '44',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '45',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '46',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '47',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '48',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '49',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '50',
//            'name' => '化學藥物種類-賽德薩 Cytarabine(Ara-C)-掉髮',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '51',
//            'name' => '化學藥物種類-高劑量全身性放射線治療-副作用-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '52',
//            'name' => '化學藥物種類-高劑量全身性放射線治療-副作用-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '53',
//            'name' => '化學藥物種類-高劑量全身性放射線治療-副作用-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '54',
//            'name' => '化學藥物種類-高劑量全身性放射線治療-副作用-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '55',
//            'name' => '化學藥物種類-高劑量全身性放射線治療-副作用-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 5,
//            'category_2' => '56',
//            'name' => '化學藥物種類-高劑量全身性放射線治療-副作用-皮膚反應',
//        ]);
////        Task::create([
////            'category_1' => 6,
////            'category_2' => '0',
////            'name' => '輸造血幹細胞日',
////        ]);
//        Task::create([
//            'category_1' => 6,
//            'category_2' => '1',
//            'name' => '輸注前藥物',
//        ]);
//        Task::create([
//            'category_1' => 6,
//            'category_2' => '2',
//            'name' => '輸注方式',
//        ]);
//        Task::create([
//            'category_1' => 6,
//            'category_2' => '3',
//            'name' => '輸注反應',
//        ]);
////        Task::create([
////            'category_1' => 7,
////            'category_2' => '0',
////            'name' => '造血幹細胞移植併發症及治療',
////        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '1',
//            'name' => '併發症種類',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '2',
//            'name' => '肺部併發症',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '3',
//            'name' => '肝臟靜脈阻塞性疾病',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '4',
//            'name' => '移植體抗宿主疾病-皮膚',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '5',
//            'name' => '移植體抗宿主疾病-腸胃道',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '6',
//            'name' => '移植體抗宿主疾病-肝臟',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '7',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-免疫球蛋白(Thymoglobulin)',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '8',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-環孢靈(cyclosporin)',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '9',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-白血球低下',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '10',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-血小板低下',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '11',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-血紅素低下',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '12',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-口腔黏膜炎',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '13',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-噁心嘔吐',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '14',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-腹瀉',
//        ]);
//        Task::create([
//            'category_1' => 7,
//            'category_2' => '15',
//            'name' => '移植體抗宿主疾病-對抗『移植體抗宿主疾病』藥物治療-滅殺除癌-(Methotrexate)-掉髮',
//        ]);
////        Task::create([
////            'category_1' => 8,
////            'category_2' => '0',
////            'name' => '自我照護',
////        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '1-1',
//            'name' => '移植期間自我照護-活絡筋骨-肢體運動',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '1-2',
//            'name' => '移植期間自我照護-活絡筋骨-彈力帶運動',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '2-1',
//            'name' => '移植期間自我照護-放鬆心情-1',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '2-2',
//            'name' => '移植期間自我照護-放鬆心情-2',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '3',
//            'name' => '移植後居家照護-常規服用藥物',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '4',
//            'name' => '移植後居家照護-個人衛生',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '5',
//            'name' => '移植後居家照護-飲食重點',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '6',
//            'name' => '移植後居家照護-衣著/被單',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '7',
//            'name' => '移植後居家照護-住家環境',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '8',
//            'name' => '移植後居家照護-外出行走',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '9',
//            'name' => '移植後居家照護-育樂/運動',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '10',
//            'name' => '移植後居家照護-社交活動',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '11',
//            'name' => '移植後居家照護-寵物與我',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '12',
//            'name' => '移植後居家照護-兩性生活',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '13',
//            'name' => '移植後居家照護-疫苗接種',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '14',
//            'name' => '移植後居家照護-自我感染觀察',
//        ]);
//        Task::create([
//            'category_1' => 8,
//            'category_2' => '15',
//            'name' => '移植後居家照護-立即返院/急診',
//        ]);

        // 第二版

        Task::create([
            'category_1' => 1,
            'category_2' => '0',
            'name' => '造血幹細胞移植的認識',
            'short' => '造血幹細胞移植的認識',
        ]);
        Task::create([
            'category_1' => 1,
            'category_2' => '1-1',
            'name' => '造血幹細胞移植的認識-造血幹細胞移植介紹-自體移植介紹',
            'short' => '自體移植介紹',
        ]);
        Task::create([
            'category_1' => 1,
            'category_2' => '1-2',
            'name' => '造血幹細胞移植的認識-造血幹細胞移植介紹-異體移植介紹',
            'short' => '異體移植介紹',
        ]);
        Task::create([
            'category_1' => 1,
            'category_2' => '2-1',
            'name' => '造血幹細胞移植的認識-造血幹細胞移植種類-自體造血幹細胞移植',
            'short' => '自體移植',
        ]);
        Task::create([
            'category_1' => 1,
            'category_2' => '2-2',
            'name' => '造血幹細胞移植的認識-造血幹細胞移植種類-異體造血幹細胞移植',
            'short' => '異體造血幹細胞移植',
        ]);
        Task::create([
            'category_1' => 2,
            'category_2' => '0',
            'name' => '移植前評估',
            'short' => '移植前評估',
        ]);
        Task::create([
            'category_1' => 2,
            'category_2' => '1',
            'name' => '移植前評估-治療說明會',
            'short' => '治療說明會',
        ]);
        Task::create([
            'category_1' => 2,
            'category_2' => '2',
            'name' => '移植前評估-費用',
            'short' => '費用',
        ]);
        Task::create([
            'category_1' => 3,
            'category_2' => '0',
            'name' => '移植室的環境介紹',
            'short' => '移植室的環境介紹',
        ]);
        Task::create([
            'category_1' => 4,
            'category_2' => '0',
            'name' => '移植前的自我準備',
            'short' => '移植前的自我準備',
        ]);
        Task::create([
            'category_1' => 4,
            'category_2' => '1',
            'name' => '移植前的自我準備-用物準備',
            'short' => '用物準備',
        ]);
        Task::create([
            'category_1' => 4,
            'category_2' => '2',
            'name' => '移植前的自我準備-身體清潔',
            'short' => '身體清潔',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '0',
            'name' => '移植前調適治療',
            'short' => '移植前調適治療-化學藥物-常見副作用',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '1',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-白血球低下',
            'short' => '白血球低下',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '2',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-血小板低下',
            'short' => '血小板低下',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '3',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-血紅素低下',
            'short' => '血紅素低下',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '4',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-口腔黏膜炎',
            'short' => '口腔黏膜炎',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '5',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-噁心嘔吐',
            'short' => '噁心嘔吐',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '6',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-腹瀉',
            'short' => '腹瀉',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '7',
            'name' => '移植前調適治療-化學藥物種類&常見副作用-常見副作用-掉髮',
            'short' => '掉髮',
        ]);
        Task::create([
            'category_1' => 5,
            'category_2' => '8',
            'name' => '移植前調適治療-高劑量全身性放射線治療-常見副作用-皮膚反應',
            'short' => '放射線治療-副作用-皮膚',
        ]);
        Task::create([
            'category_1' => 6,
            'category_2' => '0',
            'name' => '造血幹細胞輸注-重生日',
            'short' => '造血幹細胞輸注-重生日',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '0',
            'name' => '移植後併發症及治療',
            'short' => '移植後併發症及治療',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '1',
            'name' => '急性『移植體抗宿主疾病』反應',
            'short' => '急性『移植體抗宿主疾病』反應',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '1-1',
            'name' => '移植後併發症及治療-併發症種類-急性『移植體抗宿主疾病』反應-皮膚',
            'short' => '皮膚',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '1-2',
            'name' => '移植後併發症及治療-併發症種類-急性『移植體抗宿主疾病』反應-腸胃道',
            'short' => '腸胃道',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '1-3',
            'name' => '移植後併發症及治療-併發症種類-急性『移植體抗宿主疾病』反應-肝臟',
            'short' => '肝臟',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '2',
            'name' => '預防『移植體抗宿主疾病』-藥物治療',
            'short' => '預防『移植體抗宿主疾病』-藥物治療',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '2-1',
            'name' => '移植後併發症及治療-治療-預防『移植體抗宿主疾病』藥物治療-免疫球蛋白(Thymoglobulin)',
            'short' => '免疫球蛋白(Thymoglobulin)',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '2-2',
            'name' => '移植後併發症及治療-治療-預防『移植體抗宿主疾病』藥物治療-環孢靈(cyclosporin)',
            'short' => '環孢靈(cyclosporin)',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '3',
            'name' => '移植後併發症及治療-併發症種類-感染',
            'short' => '感染',
        ]);
        Task::create([
            'category_1' => 7,
            'category_2' => '4',
            'name' => '移植後併發症及治療-併發症種類-各器官毒性',
            'short' => '各器官毒性',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '0',
            'name' => '自我照護',
            'short' => '自我照護',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '1-1',
            'name' => '自我照護-移植期間自我照護-活絡筋骨-肢體運動',
            'short' => '活絡筋骨-肢體運動',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '1-2',
            'name' => '自我照護-移植期間自我照護-活絡筋骨-彈力帶運動',
            'short' => '活絡筋骨-彈力帶運動',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '2-1',
            'name' => '自我照護-移植期間自我照護-放鬆心情-影片1',
            'short' => '放鬆心情-影片1',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '2-2',
            'name' => '自我照護-移植期間自我照護-放鬆心情-影片2',
            'short' => '放鬆心情-影片2',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '3',
            'name' => '自我照護-移植後居家照護-常規服用藥物',
            'short' => '常規服用藥物',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '4',
            'name' => '自我照護-移植後居家照護-個人環境衛生清潔',
            'short' => '個人環境衛生清潔',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '5',
            'name' => '自我照護-移植後居家照護-飲食重點',
            'short' => '飲食重點',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '6',
            'name' => '自我照護-移植後居家照護-外出活動與社交',
            'short' => '外出活動與社交',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '7',
            'name' => '自我照護-移植後居家照護-兩性生活',
            'short' => '兩性生活',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '8',
            'name' => '自我照護-移植後居家照護-疫苗接種',
            'short' => '疫苗接種',
        ]);
        Task::create([
            'category_1' => 8,
            'category_2' => '9',
            'name' => '自我照護-移植後居家照護-自我觀察/立即就醫',
            'short' => '自我觀察/立即就醫',
        ]);

    }
}
