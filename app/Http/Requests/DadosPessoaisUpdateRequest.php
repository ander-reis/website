<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DadosPessoaisUpdateRequest extends FormRequest
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
            'Nome' => 'required|max:80',
            'Email' => 'required|email',
            'ds_data_nascimento' => 'date_format:Y-m-d',

            'Nome',
            'CPF',
            'Email',
            'Materia',
            'Pre',
            '1_4Serie',
            '5_8Serie',
            'Ens_Medio',
            'Ens_Superior',
            '2_3Grau',
            'Tecnico',
            'Supletivo',
            'Curso_Livre',
            'CEP',
            'Endereco',
            'Numero',
            'Complemento',
            'Bairro',
            'Cidade',
            'Estado',
            'DDD_Telefone_Residencial',
            'Telefone_Residencial',
            'DDD_Telefone_Comercial',
            'Telefone_Comercial',
            'DDD_Telefone_Celular',
            'Telefone_Celular',
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['name'] = trim(filter_var($input['name'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
