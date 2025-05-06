<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
// use Auth;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        If(Auth::user()){
            $role = Role::where('id', auth()->user()->role_id)->first();

            if($role && $role->id == '2'){
                return $next($request);
            }
        }
        return redirect(url('/'));
    }
}