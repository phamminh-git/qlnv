<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class RoleUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $nhanvien=User::with('phongban')->find(auth()->user()->id);
        if(auth()->user()->phongban->ten==$role){
            return $next($request);
        }
        return abort(503);
    }
}
