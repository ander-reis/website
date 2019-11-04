<?php

namespace Website\Http\Controllers\Auth;

use Website\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Website\Models\CurriculoProfessor;
use Website\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/curriculo/edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ds_nome' => ['required', 'string', 'max:255'],
            'ds_mail' => ['required', 'string', 'email', 'max:255', 'unique:tb_sinpro_curriculos_professores'],
            'ds_cpf' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return CurriculoProfessor::create([
            'ds_nome' => $data['ds_nome'],
            'ds_mail' => $data['ds_mail'],
            'ds_cpf' => $data['ds_cpf'],
            'ds_matricula' => '1100',
            'ds_sexo' => 0,
            'int_estado_civil' => 0,
            'dt_data_nasc' => '1997-01-20 00:00:00',
            'ds_endereco' => 'endereco',
            'ds_bairro' => 'bairro',
            'ds_cidade' => 'cidade',
            'ds_estado' => 'sp',
            'ds_cep' => 'cep',
            'ds_pais' => 'pais',
            'ds_fone' => 'fone',
            'ds_celular' => 'celular',
            'ds_fax' => 'fax',
            'ds_salario' => 'salario',
            'int_empregado' => 1,
            'int_disp_horario' => 1,
            'int_disp_cidade' => 1,
            'int_formacao' => 1,
            'ds_outra_formacao' => 'outra',
            'int_disciplina' => 1,
            'int_nivel_atuacao' => 1,
            'ds_objetivo' => 'objetivo',
            'ds_qualificacao' => 'qualificacao',
            'ds_experiencia' => 'experiencia',
            'ds_user' => 'user',
            'ds_pass' => 'pass',
            'int_ativo' => 1,
            'password' => Hash::make($data['password']),
        ]);

//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
    }
}
