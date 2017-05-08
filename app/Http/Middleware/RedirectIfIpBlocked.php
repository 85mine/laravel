<?php

namespace App\Http\Middleware;

use App\Models\Ip;
use Closure;

class RedirectIfIpBlocked
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $ips = Ip::lists('ip_address')->toArray();

        if(in_array($request->ip(), $ips))
            return response(view('errors.503'));

        return $next($request);
    }
}
