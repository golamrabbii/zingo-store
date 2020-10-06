<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Notifications\VerifyRegistration;
use Illuminate\Http\Request;

use App\User;
use Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // find user by this email
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->status == 1) {
                // login this user
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                    
                    return redirect()->intended(url('/'));
                } else {
                    session()->flash('error', 'Ivalid login');
                    return redirect('/login');
                }
            }
            else {
                //send user a token again
                if (!is_null($user)) {

                    $user->notify(new VerifyRegistration($user));
                    session()->flash('success', 'A new confirmation email has sent to you.. Please first confirm your email');
                    return redirect('/login');
                }
                else {
                    session()->flash('error', 'Please register first');
                    return redirect('/register');
                }
            }
        }
        else {
            session()->flash('error', 'Ivalid user');
                    return redirect('/login');
        }
        
    }
}
