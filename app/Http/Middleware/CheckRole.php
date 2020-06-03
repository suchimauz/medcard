<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
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
        if (Auth::user()->role() != $role) {
            switch($role) {
                case 'patient':
                    return redirect('/patient');
                    break;
                case 'practitioner':
                    return redirect('/user');
                    break;
                case 'admin':
                    return redirect('/');
                    break;
            }
        }

        return $next($request);
    }
}
