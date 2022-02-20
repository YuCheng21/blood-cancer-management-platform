<?php

namespace App\Http\Middleware;

use App\Models\CaseModel;
use Closure;
use Illuminate\Http\Request;

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
        if (empty($basicAuth)) {
            $result = [
                'msg' => 'Authenticate error',
            ];
            return response(json_encode($result, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 400)
                ->header('Content-Type', 'application/json');
        }

        $result = explode(' ', $basicAuth);
        $plainTextResult = explode(':', base64_decode($result[1]));
        $account = $plainTextResult[0];
        $password = $plainTextResult[1];

        $cases = CaseModel::where('account', $account)->first();
        if (is_null($cases)) {
            $result = [
                'msg' => 'Account error',
            ];
            return response(json_encode($result, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 400)
                ->header('Content-Type', 'application/json');
        }

        if ($password !== $cases->password) {
            $result = [
                'msg' => 'Password error',
            ];
            return response(json_encode($result, JSON_FORCE_OBJECT | JSON_UNESCAPED_UNICODE), 400)
                ->header('Content-Type', 'application/json');
        }

        $request->attributes->add(['account' => $account]);
        return $next($request);
    }
}
