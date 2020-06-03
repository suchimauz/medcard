<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckValidUser
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

        if (Auth::user()) {
            $user = Auth::user();

            if ($user->role() == 'patient' && ($user->is_patient < 1 || !isset($user->patient->id))) {
                session(['role' => 'practitioner']);
            }
            elseif ($user->role() == 'practitioner' && $user->is_practitioner < 1) {
                session(['role' => 'admin']);
            }
            elseif ($user->role() == 'admin' && $user->is_admin < 1) {
                session(['role' => 'patient']);
            }

            if (!($user->active >= 1 && (($user->is_patient >= 1 && isset($user->patient->id)) || $user->is_practitioner >= 1 || $user->is_admin >= 1))) {
                Auth::logout();
                return redirect('/');
            }
        }
        
        return $next($request);
    }
}
