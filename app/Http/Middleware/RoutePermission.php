<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RoutePermission
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
        $routePermissions = config('route-permission');

        $routeName = Route::currentRouteName();
        $permissionName = $routePermissions[$routeName] ?? null;
        if ($permissionName) {
            /**
             * @var Authorizable $user
             */
            $user = auth()->user();
            if (!$user || !$user->can($permissionName)) {
                return response(status: 403);
            }
        }

        return $next($request);
    }
}
