<?php

namespace Website\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
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

    /**
     * @param Request $request
     * @return mixed
     */
//    protected function credentials(Request $request)
//    {
//        $data = $request->only($this->username(), 'password');
//
//        $usernameKey = $this->usernameKey();
//        if($usernameKey != $this->username()) {
//            $data[$this->usernameKey()] = $data[$this->username()];
//            unset($data[$this->username()]);
//        }
//        return $data;
//    }

    /**
     * @return string
     */
//    protected function usernameKey()
//    {
//        $email = \Request::get('email'); //email,phone,cpf
//        $validator = \Validator::make([
//            'email' => $email
//        ], ['email' => 'cpf']);
//        if (!$validator->fails()) {
//            return 'cpf';
//        }
//        if (count($email) == 6) {
//            return 'matricula';
//        }
//        if(count($email) == 14){
//            return 'cpf';
//        }
//        return 'cpf';
//    }
}
