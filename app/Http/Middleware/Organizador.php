<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth as Auth;
use Closure;
class Organizador
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
        $roles = Auth::User()->rol->toArray();
        foreach ($roles as $key => $value) {
            if($value['pivot']['roles_id'] == 2){
                return $next($request);
            }
        }
        return redirect('/home');
    }
}
