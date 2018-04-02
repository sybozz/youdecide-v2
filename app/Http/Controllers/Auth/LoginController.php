<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
   protected $redirectTo = 'proposals/recent';
    // protected function authenticated(Request $request, $user)
    // {
    //     switch ($user->role) {
    //       case 1:
    //           return redirect('/activity/published');
    //           break;
    //       case 2:
    //           return redirect('/manager');
    //           break;
    //       case 3:
    //           return redirect('/admin');
    //           break;
    //       default:
    //           return redirect('/login');
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
