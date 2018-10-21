<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    protected function authenticated($request , $user)
    {
        //dd($user->getRole());
        switch ($user->role->name) {
            case 'admin':
                $this->redirectTo = '/admin';
                break;
            case 'vendor':
                $this->redirectTo = '/vendor';
                break;
            case 'client':
                $this->redirectTo = '/client';
                break;
            default:
                break;
        }
    }
}
