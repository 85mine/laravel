<?php

namespace App\Http\Middleware;

use App\Models\ConfirmEmail;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Auth;

class StatusOfUser
{
    /**
     * @param $request
     * @param Closure $next
     * @param $role
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */


    public function handle($request, Closure $next, $role)
    {

        $user = Auth::user();

        // case status user
        if ($role == ROUTER_USER) {
            switch ($user->status) {
                case USER_NOT_CONFIRM_EMAIL:
                    return redirect(route('user.getConfirmEmail'));
                    break;

                default:
                    break;
            }
        }

        // case active email
        if ($role == ROUTER_ACTIVE_EMAIL) {

            if(!$request->has('token'))
                abort('503');

            $confirmEmail = ConfirmEmail::with('user')->where(['token' => $request->get('token')])->first();

            if(!$confirmEmail || ($confirmEmail && $confirmEmail->created_at < datetime_now()))
                abort('503');

            if(!$confirmEmail->user || ($confirmEmail->user && $confirmEmail->user->status != USER_NOT_CONFIRM_EMAIL))
                abort('503');
        }

        // case confirm email
        if ($role == ROUTER_CONFIRM_EMAIL) {
            if($user->status != USER_NOT_CONFIRM_EMAIL)
                return redirect(route('admin.dashboard'));
        }

        return $next($request);
    }
}
