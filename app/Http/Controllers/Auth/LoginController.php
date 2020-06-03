<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function authenticate(Request $request)
    {
        $serial = empty($request->serial) ? null : trim($request->serial);
        $number = empty($request->number) ? null : trim($request->number);

        $user = User::where('serial', $serial)
                    ->where('number', $number)
                    ->where('active', '>=', 1)
                    ->where(function($query) {
                        $query->orWhere('is_patient', '>=', 1)
                            ->orWhere('is_practitioner', '>=', 1)
                            ->orWhere('is_admin', '>=', 1);
                    })
                    ->first();

        if ($user) {
            Auth::login($user);

            if($user->is_patient >= 1) {
                session(['role' => 'patient']);
            }
            else if($user->is_practitioner >= 1) {
                session(['role' => 'practitioner']);
            }
            else if($user->is_admin >= 1) {
                session(['role' => 'admin']);
            }

            return redirect()->intended('dashboard');
        } else {
            return redirect('/login')
                    ->withErrors(['not_found' => 'Пользователь с предоставленными паспортными данными не найден или заблокирован!'])
                    ->withInput($request->input());
        }
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
