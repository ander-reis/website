<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Website\Rules\AdmissaoRule;

class PrevidenciaProfessorCreateRequest extends FormRequest
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
            'ds_cpf' => 'required|string|max:14|cpf',
            'ds_nome' => 'required|string|max:100',
            'fl_sexo' => 'required|boolean',
            'dt_nascimento' => 'required|date_format:d/m/Y|eighteen_year_valid',
            'ds_celular' => 'required|string|max:20',
            'ds_email' => 'required|email:rfc,dns|max:120',
            'CEP' => 'required|string|max:9',
            'endereco' => 'required|string|max:80',
            'ds_numero' => 'required|string|max:10',
            'ds_complemento' => 'max:50',
            'bairro' => 'required|string|max:59',
            'cidade' => 'required|string|max:32',
            'estado' => 'required|string|max:2',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        /**
         * data filter sanitize / trim
         */
        $input['ds_cpf'] = trim(filter_var($input['ds_cpf'], FILTER_SANITIZE_STRING));
        $input['ds_nome'] = trim(filter_var($input['ds_nome'], FILTER_SANITIZE_STRING));
        $input['fl_sexo'] = trim(filter_var($input['fl_sexo'], FILTER_SANITIZE_STRING));
        $input['dt_nascimento'] = trim(filter_var($input['dt_nascimento'], FILTER_SANITIZE_STRING));
        $input['ds_celular'] = trim(filter_var($input['ds_celular'], FILTER_SANITIZE_STRING));
        $input['ds_email'] = trim(filter_var($input['ds_email'], FILTER_SANITIZE_STRING));
        $input['CEP'] = trim(filter_var($input['CEP'], FILTER_SANITIZE_STRING));
        $input['endereco'] = trim(filter_var($input['endereco'], FILTER_SANITIZE_STRING));
        $input['ds_numero'] = trim(filter_var($input['ds_numero'], FILTER_SANITIZE_STRING));
        $input['ds_complemento'] = trim(filter_var($input['ds_complemento'], FILTER_SANITIZE_STRING));
        $input['bairro'] = trim(filter_var($input['bairro'], FILTER_SANITIZE_STRING));
        $input['cidade'] = trim(filter_var($input['cidade'], FILTER_SANITIZE_STRING));
        $input['estado'] = trim(filter_var($input['estado'], FILTER_SANITIZE_STRING));

        /**
         * data uppercase
         */
        $input['ds_nome'] = dataUpperCase($input['ds_nome']);
        $input['endereco'] = dataUpperCase($input['endereco']);
        $input['ds_complemento'] = dataUpperCase($input['ds_complemento']);
        $input['bairro'] = dataUpperCase($input['bairro']);
        $input['cidade'] = dataUpperCase($input['cidade']);
        $input['estado'] = dataUpperCase($input['estado']);

        /**
         * data lowercase
         */
        $input['ds_email'] = dataLowercase($input['ds_email']);

        $this->replace($input);
    }
}
