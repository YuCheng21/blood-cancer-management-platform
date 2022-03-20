<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 *  @OA\OpenApi(
 *      @OA\Info(
 *         title="血癌照護管理平台",
 *         version="1.0",
 *         description="
<h3>Application Interface Documentation for Blood Cancer Care Management Platform.</h3>
<h4><a href='/'>Home Page</a></h4>
                        ",
 *         contact={
 *              "name": "High Performance Distributed Systems Lab",
 *              "email": "nkust.ee.hpds@gmail.com",
 *          }
 *      ),
 *      @OA\Components(
 *          @OA\SecurityScheme(
 *              securityScheme="basicAuth",
 *              type="http",
 *              scheme="basic",
 *          ),
 *          @OA\Schema (
 *              schema="case",
 *              type="object",
 *              @OA\Property(property="id",type="integer",description="個案編號"),
 *              @OA\Property(property="account",type="string",description="個案帳號"),
 *              @OA\Property(property="transplant_num",type="string",description="個案移植編號"),
 *              @OA\Property(property="name",type="string",description="個案姓名"),
 *              @OA\Property(property="gender_id",type="integer",description="個案性別"),
 *              @OA\Property(property="birthday",type="string",description="個案生日"),
 *              @OA\Property(property="date",type="string",description="個案移植日期"),
 *              @OA\Property(property="transplant_type_id",type="integer",description="個案移植種類"),
 *              @OA\Property(property="disease_type_id",type="integer",description="個案疾病種類"),
 *              @OA\Property(property="disease_state_id",type="integer",description="個案疾病期數"),
 *              @OA\Property(property="disease_class_id",type="integer",description="個案疾病類別"),
 *          ),
 *          @OA\Schema (
 *              schema="blood",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="抽血項目類型編號", example=1),
 *              @OA\Property(property="name", type="string", description="抽血項目類型名稱", example="wbc"),
 *          ),
 *          @OA\Schema (
 *              schema="case-blood",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="個案抽血項目", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example="1"),
 *              @OA\Property(property="blood_id", type="integer", description="抽血項目類型編號", example="1"),
 *              @OA\Property(property="value", type="integer", description="抽血項目類型數值", example="999"),
 *          ),
 *          @OA\Schema(
 *              schema="effect",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="副作用紀錄編號", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
 *              @OA\Property(property="date", type="date", example="2022-3-6"),
 *              @OA\Property(property="symptom", type="string", example="噁心"),
 *              @OA\Property(property="severity", type="integer", example="5"),
 *              @OA\Property(property="has_image", type="integer", enum={"0", "1"}, example="0"),
 *              @OA\Property(property="image", type="string", format="binary"),
 *              @OA\Property(property="caption", type="string", example="Cation #1"),
 *          ),
 *          @OA\Schema(
 *              schema="medicine",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="施打藥物紀錄編號", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
 *              @OA\Property(property="date", type="string", description="日期", example="1993-12-11"),
 *              @OA\Property(property="course", type="string", description="療程", example="Cycle4"),
 *              @OA\Property(property="type", type="string", description="施打藥物種類", example="藥物-N"),
 *              @OA\Property(property="dose", type="string", description="藥物劑量", example="622 mg"),
 *          ),
 *          @OA\Schema(
 *              schema="report",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="報告各管師編號", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
 *              @OA\Property(property="date", type="date", description="回報日期", example="2022-03-10"),
 *              @OA\Property(property="physical_strength", type="string", description="體力狀況", example="很好"),
 *              @OA\Property(property="symptom", type="string", description="症狀", example="皮疹"),
 *              @OA\Property(property="hospital", type="string", description="固定回診醫院", example="高醫"),
 *          ),
 *          @OA\Schema(
 *              schema="category_1",
 *              type="object",
 *              @OA\Property(property="category_1", type="integer", description="類別編號", example=1),
 *              @OA\Property(property="name", type="string", description="類別名稱", example="移植室的環境介紹"),
 *              @OA\Property(property="short", type="string", description="類別縮寫", example="環境介紹"),
 *          ),
 *          @OA\Schema(
 *              schema="task",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="任務編號", example=1),
 *              @OA\Property(property="category_1", type="integer", description="類別1", example=1),
 *              @OA\Property(property="category_2", type="string", description="類別2", example="2-2"),
 *              @OA\Property(property="name", type="string", description="任務名稱", example="造血幹細胞移植分類-異體造血幹細胞移植"),
 *          ),
 *          @OA\Schema(
 *              schema="case-task",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="個案任務編號", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
 *              @OA\Property(property="task_id", type="integer", description="任務編號", example=1),
 *              @OA\Property(property="week", type="integer", description="週數", example=1),
 *              @OA\Property(property="start_at", type="date", description="開始日期", example="2022-03-11"),
 *              @OA\Property(property="state", type="string", enum={"completed","uncompleted"}, description="完成狀態", example="completed"),
 *          ),
 *          @OA\Schema(
 *              schema="topic",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="題目編號", example=1),
 *              @OA\Property(property="task_id", type="integer", description="任務編號", example=1),
 *              @OA\Property(property="question", type="string", description="題目內容", example="Aut provident qui eos modi eveniet nostrum animi."),
 *              @OA\Property(property="question_type", type="string", enum={"true-false","multiple-choice"}, description="答案類型", example="multiple-choice"),
 *              @OA\Property(property="answer", type="integer", description="題目答案", example="3"),
 *              @OA\Property(property="option_a", type="string", description="多選題答案A", example="Et non."),
 *              @OA\Property(property="option_b", type="string", description="多選題答案B", example="Quos."),
 *              @OA\Property(property="option_c", type="string", description="多選題答案C", example="Et."),
 *              @OA\Property(property="option_d", type="string", description="多選題答案D", example="Molestiae."),
 *          ),
 *          @OA\Schema(
 *              schema="case-topic",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="個案題目答題結果編號", example=1),
 *              @OA\Property(property="case_task_id", type="integer", description="個案任務編號", example=1),
 *              @OA\Property(property="topic_id", type="integer", description="題目編號", example=1),
 *              @OA\Property(property="state", type="string", enum={"correct", "wrong"},description="答題結果", example="correct"),
 *          ),
 *          @OA\Schema(
 *              schema="faq",
 *              type="object",
 *              @OA\Property(property="category_1", type="integer", description="類型", example=1),
 *              @OA\Property(property="title", type="string", description="問題", example="Debitis ut."),
 *              @OA\Property(property="content", type="string", description="解答", example="Ad magnam voluptatem ratione."),
 *          ),
 *          @OA\Schema(
 *              schema="message",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="消息編號", example=1),
 *              @OA\Property(property="title", type="string", description="標題", example="Debitis ut."),
 *              @OA\Property(property="content", type="string", description="內容", example="Ad magnam voluptatem ratione."),
 *              @OA\Property(property="user_id", type="string", description="發布者", example="1"),
 *              @OA\Property(property="date", type="string", description="建立日期", example="1984-10-05"),
 *          ),
 *          @OA\Schema(
 *              schema="case-message",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="個案消息編號", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example="1"),
 *              @OA\Property(property="message_id", type="integer", description="消息編號", example="1"),
 *              @OA\Property(property="state", type="string", description="消息狀態", example="1"),
 *          ),
 *      ),
 *     security={{"basicAuth": {}}},
 *  )
 *  @OA\Tag (
 *      name="個案資料",
 *      description="與個案帳號相關的基本資料",
 *  )
 *  @OA\Tag (
 *      name="抽血數據",
 *      description="個案定期的抽血數據",
 *  )
 *  @OA\Tag (
 *      name="施打藥物及劑量紀錄",
 *      description="個案的施打藥物及劑量紀錄",
 *  )
 *  @OA\Tag (
 *      name="副作用紀錄",
 *      description="個案的副作用紀錄",
 *  )
 *  @OA\Tag (
 *      name="報告個管師紀錄",
 *      description="個案回報個管師的回報紀錄",
 *  )
 *
 *  @OA\Tag (
 *      name="任務",
 *      description="任務項目",
 *  )
 *  @OA\Tag (
 *      name="每週任務",
 *      description="個案每週的任務項目",
 *  )
 *  @OA\Tag (
 *      name="任務題目",
 *      description="任務項目的題目",
 *  )
 *
 *  @OA\Tag (
 *      name="問與答",
 *      description="任務單元的問與答",
 *  )
 *
 * @OA\Tag (
 *      name="個案消息",
 *      description="個案的消息推送",
 *  )
 */

class ApiController extends Controller
{
    //
}
