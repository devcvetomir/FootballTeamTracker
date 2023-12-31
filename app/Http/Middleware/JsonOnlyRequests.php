<?php

namespace App\Http\Middleware;

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\JsonResponse;

class JsonOnlyRequests
{

    public function handle($request, Closure $next)
    {

        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
