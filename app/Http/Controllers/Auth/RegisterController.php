<?php

namespace Website\Http\Controllers\Auth;

use Illuminate\Support\Arr;
use Website\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Website\Http\Controllers\Website\CurriculoController;
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
    protected $redirectTo = '/curriculo';

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'ds_nome' => ['required', 'string', 'max:50'],
            'ds_cpf' => ['required', 'cpf', 'string', 'max:14'],
            'dt_data_nasc' => ['required', 'date_format:Y-m-d'],
            'int_estado_civil' => ['required'],
            'ds_cep' => ['required', 'string', 'max:9'],
            'ds_endereco' => ['required', 'string', 'max:100'],
            'ds_bairro' => ['required', 'string', 'max:50'],
            'ds_cidade' => ['required', 'string', 'max:30'],
            'ds_estado' => ['required', 'string', 'max:2'],
            'ds_pais' => ['required', 'string', 'max:30'],
            'ds_fone' => ['required', 'string', 'max:20'],
            'ds_celular' => ['required', 'string', 'max:20'],
            'ds_salario' => ['required', 'string', 'max:13'],
            'int_empregado' => ['required', 'numeric'],
            'int_disp_horario' => ['required', 'numeric'],
            'int_disp_cidade' => ['required', 'numeric'],
            'int_formacao' => ['required', 'numeric'],
            'int_disciplina' => ['required', 'numeric'],
            'int_nivel_atuacao' => ['required', 'numeric'],
            'ds_objetivo' => ['required', 'string'],
            'ds_qualificacao' => ['required', 'string'],
            'ds_experiencia' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'confirmed', 'unique:tb_sinpro_curriculos_professores'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \Website\Models\CurriculoProfessor
     */
    protected function create(array $data)
    {
        $estados = CurriculoController::estados();
        $ds_estado = $data['ds_estado'];

        $created = CurriculoProfessor::create([
            'ds_nome' => $data['ds_nome'],
            'ds_cpf' => $data['ds_cpf'],
            'ds_sexo' => $data['ds_sexo'],
            'dt_data_nasc' => $data['dt_data_nasc'],
            'int_estado_civil' => $data['int_estado_civil'],
            'ds_cep' => $data['ds_cep'],
            'ds_endereco' => $data['ds_endereco'],
            'ds_bairro' => $data['ds_bairro'],
            'ds_cidade' => $data['ds_cidade'],
            'ds_estado' => Arr::get($estados, $ds_estado),
            'ds_pais' => $data['ds_pais'],
            'ds_fone' => $data['ds_fone'],
            'ds_celular' => $data['ds_celular'],
            'ds_salario' => $data['ds_salario'],
            'int_empregado' => $data['int_empregado'],
            'int_disp_horario' => $data['int_disp_horario'],
            'int_disp_cidade' => $data['int_disp_cidade'],
            'int_formacao' => $data['int_formacao'],
            'int_disciplina' => $data['int_disciplina'],
            'int_nivel_atuacao' => $data['int_nivel_atuacao'],
            'ds_objetivo' => $data['ds_objetivo'],
            'ds_qualificacao' => $data['ds_qualificacao'],
            'ds_experiencia' => $data['ds_experiencia'],
            'int_ativo' => 1,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'ds_pass' => '',
        ]);

        toastr()->success('Cadastro criado com sucesso!');

        return $created;
    }
}
