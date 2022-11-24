<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AllowToRegister
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
        if($request->input('key') !== config('app.register_key')){
            return (redirect('/register'));
        }

        return $next($request);
    }
}
