<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\UserRolesEnum;
use App\Http\Resources\MessageResource;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * @param Request $request
     * @param Closure $next
     * @return MessageResource|JsonResponse
     */
    public function handle(Request $request, Closure $next): MessageResource | JsonResponse
    {
        if (Auth::user()->role === UserRolesEnum::ADMIN) {
            return $next($request);
        }

        return new JsonResponse(['error' => 'Permission Denied'], 403);
    }
}
