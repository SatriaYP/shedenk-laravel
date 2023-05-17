<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handles($request, Closure $next)
    {
        if(auth()->user()->id_role == 1){
            return $next($request);
        }
        // $roles = array_slice(func_get_args(), 2);
        // foreach($roles as $role){
        //     $user = auth()->akun()->id_role;
        //     if($user == $role){
        //         return $next($request);
        //     }
        // }
        // return redirect('/dashboard');
    }
    // public function handle($request, Closure $next, $role)
    // {
    //     if (! $request->user()->hasRole($role)) {
            
    //     }
 
    //     return $next($request);
    // }
}