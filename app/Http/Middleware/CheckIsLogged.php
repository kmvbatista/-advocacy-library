<?php

namespace App\Http\Middleware;

use Closure;

class CheckIsLogged
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
        $loggedUser = $request->session()->get('user');
        if($loggedUser) {
            return $next($request);
        }
        return redirect('/login');
    }
}
