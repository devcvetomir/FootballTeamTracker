<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request): ?string
    {
        if ($request->expectsJson()) {
            // For JSON requests, return a JSON response
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // For non-JSON requests, no redirection
        return null;
    }
}
