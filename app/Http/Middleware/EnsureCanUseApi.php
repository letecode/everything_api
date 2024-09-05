<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCanUseApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header('x-every_apikey')) {
            if ($request->header('x-every_apikey') == config('app.api_key')) {
                return $next($request);
            }
        }
        return response()->json(['succes'=>false,'message' => 'Unauthorized'], 401);
    }
}
