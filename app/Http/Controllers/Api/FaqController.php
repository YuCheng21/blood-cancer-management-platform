<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FaqController extends Controller
{
    /**
     * @OA\Get (path="/api/faqs", tags={"問與答"}, summary="取得所有類別問與答",
     *     description="取得所有類別問與答",
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/faq")}))))))
     */

    public function index(){
        $faqs = Faq::all();
        return response(['data' => $faqs], Response::HTTP_OK);
    }

    /**
     * @OA\Get (path="/api/faqs/category_1/{category_1}", tags={"問與答"}, summary="取得單一類別問與答",
     *     description="取得單一類別問與答",
     *     @OA\Parameter (name="category_1", description="類別編號", required=true, in="path", example="1",
     *          @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="success",
     *          @OA\MediaType(mediaType="application/json",
     *              @OA\Schema (
     *                  @OA\Property(property="data", type="array",
     *                      @OA\Items(type="object", allOf={
     *                          @OA\Schema (ref="#/components/schemas/faq")}))))))
     */

    public function show(Request $request, $category_1)
    {
        $faqs = Faq::where('category_1', $category_1)->get();
        foreach($faqs as $faq){
            $_ = $faq->category_information;
        }
        return response(['data' => $faqs], Response::HTTP_OK);
    }
}
