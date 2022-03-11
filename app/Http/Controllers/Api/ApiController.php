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
 *              schema="blood",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="抽血數據編號", example=1),
 *              @OA\Property(property="case_id", type="integer", description="個案編號", example=1),
 *              @OA\Property(property="wbc", type="integer", description="白血球(WBC)", example="555"),
 *              @OA\Property(property="hb", type="integer", description="血紅素(HB)", example="555"),
 *              @OA\Property(property="plt", type="integer", description="血小板(PLT)", example="555"),
 *              @OA\Property(property="got", type="integer", description="肝指數(GOT)", example="555"),
 *              @OA\Property(property="gpt", type="integer", description="肝指數(GPT)", example="555"),
 *              @OA\Property(property="cea", type="integer", description="癌指數(CEA)", example="555"),
 *              @OA\Property(property="ca153", type="integer", description="癌指數(CA153)", example="555"),
 *              @OA\Property(property="bun", type="integer", description="尿素氮(BUN)", example="555"),
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
 *              schema="task",
 *              type="object",
 *              @OA\Property(property="id", type="integer", description="任務編號", example=1),
 *              @OA\Property(property="category_1", type="integer", description="類別1", example=1),
 *              @OA\Property(property="category_2", type="string", description="類別2", example="2-2"),
 *              @OA\Property(property="name", type="string", description="任務名稱", example="造血幹細胞移植分類-異體造血幹細胞移植"),
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
 *      name="每週任務",
 *      description="個案每週的任務項目",
 *  )
 *  @OA\Tag (
 *      name="任務題目",
 *      description="任務項目的題目",
 *  )
 *
 *  @OA\Tag (
 *      name="問與答 (Q&A)",
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
