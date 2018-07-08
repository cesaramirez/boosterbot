<?php

namespace App\Http\Middleware;

use Closure;

class AccessActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        if ($user) {
            if (auth()->user()->isNotActive()) {
                auth()->logout();

                return back()->withErrors(['email' => [trans('auth.notactivated')]]);
            }
        }

        return $next($request);
    }
}
