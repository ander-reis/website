<?php

namespace Website\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Website\Http\Requests\LoginRequest;
use Website\Models\User;

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
    protected $redirectTo = '/admin/dados-pessoal';

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
     * @return array|\Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');

        if($this->getUser($data['username'])){
            $usernameKey = $this->usernameKey();

            $data[$usernameKey] = $data[$this->username()];
            unset($data[$this->username()]);

            return $data;
        }
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Verifica se usuário tem Situação válida
     *
     * @param $user
     * @return bool
     */
    private function getUser($user){
        if (strlen($user) === 5) {
            $codigo = User::where('Codigo_Professor', $user)
                ->where('Situacao', '!=', 3)
                ->where('Situacao', '!=', 4)
                ->where('Situacao', '!=', 7)
                ->where('Situacao', '!=', 8)
                ->first();
            return $codigo;
        } else if (strlen($user) === 14) {
            $cpf = User::where('CPF', $user)
                ->where('Situacao', '!=', 3)
                ->where('Situacao', '!=', 4)
                ->where('Situacao', '!=', 7)
                ->where('Situacao', '!=', 8)
                ->first();
            return $cpf;
        }
        return false;
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

        return $validator->fails() ? 'Codigo_Professor' : 'CPF';
    }

    /**
     * Valida request user
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
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
}
