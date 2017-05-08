<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StatusOfUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        switch ($user->status) {
            case USER_NOT_CONFIRM_EMAIL:
                return redirect(route('user.getConfirmEmail'));
                break;

            default:
                break;
        }

        return $next($request);
    }
}
