<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CurriculoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->sanitize();

        return [
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
            'email' => ['required', 'string', 'email', 'max:255', 'confirmed', Rule::unique('tb_sinpro_curriculos_professores')->ignore($this->user('web')->id_curriculo, 'id_curriculo')],
            'password' => ['string', 'min:6', 'confirmed']
        ];
    }

    public function sanitize()
    {
        $input = $this->all();
        $input['ds_nome'] = trim(filter_var($input['ds_nome'], FILTER_SANITIZE_STRING));
        $input['ds_endereco'] = trim(filter_var($input['ds_endereco'], FILTER_SANITIZE_STRING));
        $input['ds_bairro'] = trim(filter_var($input['ds_bairro'], FILTER_SANITIZE_STRING));
        $input['ds_cidade'] = trim(filter_var($input['ds_cidade'], FILTER_SANITIZE_STRING));
        $input['ds_pais'] = trim(filter_var($input['ds_pais'], FILTER_SANITIZE_STRING));
        $input['ds_fone'] = trim(filter_var($input['ds_fone'], FILTER_SANITIZE_STRING));
        $input['ds_celular'] = trim(filter_var($input['ds_celular'], FILTER_SANITIZE_STRING));
        $input['ds_salario'] = trim(filter_var($input['ds_salario'], FILTER_SANITIZE_STRING));
        $input['ds_objetivo'] = trim(filter_var($input['ds_objetivo'], FILTER_SANITIZE_STRING));
        $input['ds_qualificacao'] = trim(filter_var($input['ds_qualificacao'], FILTER_SANITIZE_STRING));
        $input['ds_experiencia'] = trim(filter_var($input['ds_experiencia'], FILTER_SANITIZE_STRING));
        $input['email'] = trim(filter_var($input['email'], FILTER_SANITIZE_STRING));
        $input['password'] = trim(filter_var($input['password'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
