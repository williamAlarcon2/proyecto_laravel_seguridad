<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
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
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'corUsuario';
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $messages  = [
            'valid_captcha' => 'Código Incorrecto. Intente de nuevo.',
            'CaptchaCode.required' => 'Código Incorrecto. Intente de nuevo.'
        ];

        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'CaptchaCode' => 'required|valid_captcha'
        ],  $messages);
    }

    protected function sendLoginResponse(Request $request){
        $request->session()->regenerate();
        $previous_session =  $this->guard()->User()->session_id;
        if ($previous_session) {
            \Session::getHandler()->destroy($previous_session);
        }

        $this->guard()->user()->session_id = \Session::getId();
        $this->guard()->user()->save();
        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }  

    
}
