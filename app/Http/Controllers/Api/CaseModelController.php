<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CaseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * @OA\Info(title="My First API", version="0.1")
 */
class CaseModelController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/resource.json",
     *     @OA\Response(response="200", description="An example resource")
     * )
     */
    public function show(Request $request, $account)
    {
        $case = CaseModel::where('account', $account)->get();
        if (!Auth::check()) {
            $case = $case->where('account', $request->get('$auth_account'));
        }
        return response(['data' => $case], Response::HTTP_OK);
    }
}
