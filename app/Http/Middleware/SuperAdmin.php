<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        // dd(Auth::user());
        // dd();
        if(session()->get('id_role')==3){
            return $next($request);
        }else{
            return redirect('/dashboard')->with('error','Anda tidak memiliki akses');
        }
        
    }
}
