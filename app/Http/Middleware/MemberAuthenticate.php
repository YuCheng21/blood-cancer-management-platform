<?php

namespace App\Http\Middleware;

use App\Models\CaseModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function handle(Request $request, Closure $next)
    {
        $basicAuth = $request->header('Authorization');
        if (is_null($basicAuth)) {
            if (Auth::check()){
                return $next($request);
            }
            return response(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }
        $auth = $this->basic_auth($basicAuth);
        $cases = CaseModel::where([
            'account' => $auth['account'],
            'password' => $auth['password'],
        ])->first();
        if (is_null($cases)){
            return response(['message' => 'Unauthenticated'], Response::HTTP_UNAUTHORIZED);
        }
        $request->attributes->add(['auth_account' => $auth['account']]);
        return $next($request);
    }

    private function basic_auth($base64): array
    {
        $result = explode(' ', $base64);
        $plainTextResult = explode(':', base64_decode($result[1]));
        return [
            'account' => $plainTextResult[0],
            'password' => $plainTextResult[1],
        ];
    }
}
