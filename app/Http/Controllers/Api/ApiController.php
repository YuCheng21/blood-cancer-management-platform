<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 *  @OA\OpenApi(
 *      @OA\Info(
 *         title="血癌照護管理平台",
 *         version="1.0",
 *         description="Application Interface Documentation for Blood Cancer Care Management Platform.",
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
 *      name="每週任務",
 *      description="個案每週的任務項目",
 *  )
 *  @OA\Tag (
 *      name="施打藥物紀錄及劑量",
 *      description="個案的施打藥物紀錄及劑量",
 *  )
 *  @OA\Tag (
 *      name="副作用紀錄",
 *      description="個案的副作用紀錄",
 *  )
 *  @OA\Tag (
 *      name="報告個管師紀錄",
 *      description="個案回報個管師的回報紀錄",
 *  )
 */

class ApiController extends Controller
{
    //
}
