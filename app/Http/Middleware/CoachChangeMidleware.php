<?php

namespace App\Http\Middleware;

use Closure;

class CoachChangeMidleware extends Middleware
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
        config(['jwt.user' => '\App\Models\Coach']);    //用于指定特定model
        config(['auth.providers.users.model' => \App\model\Coach::class]);//就是他们了
        return $next($request);
    }
}
