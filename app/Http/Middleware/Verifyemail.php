<?php

namespace App\Http\Middleware;

use Closure;

class Verifyemail
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
        $verify = auth()->user()->verifyemail;
        if($verify==1){
            return $next($request);
        }else{
            return redirect()->route('verifyemailpage');
        }
    }
}
