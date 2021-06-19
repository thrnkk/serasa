<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Client;

class EnsureTokenIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header("API-Token");

        if(!$token)
            return response()->json(['message' => 'Token inválido', 'date' => now()], 401);

        $client = Client::where("api_token", $token)->first();

        if(!$client)
            return response()->json(['message' => 'Token inválido', 'date' => now()], 401);

        return $next($request);
    }
}
