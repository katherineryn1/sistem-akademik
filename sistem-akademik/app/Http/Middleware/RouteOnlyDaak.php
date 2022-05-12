<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RouteOnlyDaak
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currUser = $request->session()->get('currentuser', null);
        if($currUser['jabatan']->getString() != "Daak"){
            return redirect("/login");
        }
        return $next($request);
    }
}
