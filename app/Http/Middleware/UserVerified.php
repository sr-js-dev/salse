<?php

namespace App\Http\Middleware;

use Closure;

class UserVerified
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
        if(auth()->user()->is_verify == 1){
            return $next($request);
        }
        return redirect('/')->with('message', "Your email is not verified yet!");
        
    }
}