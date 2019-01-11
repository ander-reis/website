<?php

namespace Website\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Website\Http\Requests\LoginRequest;

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
    protected $redirectTo = '/admin/dados-pessoais';

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
     * sobreescrevendo credentials
     *
     * @param Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $usernameKey = $this->usernameKey();

        $data[$usernameKey] = $data[$this->username()];
        unset($data[$this->username()]);

        return $data;
    }

    /**
     * Método responsável por realizar login com multiplos campos
     *
     * @return string
     */
    protected function usernameKey()
    {
        $username = \Request::get($this->username());

        $validator = \Validator::make([
            'cpf' => $username
        ], ['cpf' => 'cpf']);

        return $validator->fails() ? 'matricula' : 'cpf';
    }

    /**
     * Método responsável por retornar o tipo de usuário
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
//    public function redirectPath()
//    {
//        if (method_exists($this, 'redirectTo')) {
//            return $this->redirectTo();
//        }
//
//        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/home';
//    }
}
