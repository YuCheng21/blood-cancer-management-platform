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
 *              required={"wbc","hb","plt","got","gpt","cea","ca153","bun"},
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
 *              schema="report",
 *              type="object",
 *              required={"date", "physical_strength", "symptom", "hospital"},
 *              @OA\Property(property="date", type="date", description="回報日期", example="2022-03-10"),
 *              @OA\Property(property="physical_strength", type="string", description="體力狀況", example="很好"),
 *              @OA\Property(property="symptom", type="string", description="症狀", example="皮疹"),
 *              @OA\Property(property="hospital", type="string", description="固定回診醫院", example="高醫"),
 *          ),
 *          @OA\Schema(
 *              schema="effect",
 *              type="object",
 *              required={"date", "symptom", "severity", "has_image"},
 *              @OA\Property(property="date", type="date", example="2022-3-6"),
 *              @OA\Property(property="symptom", type="string", example="噁心"),
 *              @OA\Property(property="severity", type="integer", example="5"),
 *              @OA\Property(property="has_image", type="integer", enum={"0", "1"}, example="0"),
 *              @OA\Property(property="image", type="string", format="binary"),
 *              @OA\Property(property="caption", type="string", example="Cation #1"),
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
 */

class ApiController extends Controller
{
    //
}
