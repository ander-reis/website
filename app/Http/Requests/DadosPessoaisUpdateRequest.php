<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Website\Models\User;

class DadosPessoaisUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $userId = $this->route('dados_pessoal')->Codigo_Professor;
        $result = User::where('Cadastro_Professores', \Auth::user()->Codigo_Professor)
            ->where('Codigo_Professor', '=', $userId);

        return $result != null;
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
            'Nome' => 'required|max:100',
            'CPF' => 'max:14',
            'Email' => 'required|max:120',
            'Materia' => 'required',
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
        $input['Nome'] = trim(filter_var($input['Nome'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
