<?php

namespace App\Http\Middleware;

use Closure;

class CMSOuth
{
    const ROLE_USER_CUSTOMER = 0;
    const ROLE_USER_CMS = 1;
    /**
     * CMSログイン権限チェック
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check() && auth()->user()->is_cms) {
            return $next($request);
        }

        return redirect('/home');
    }
}
