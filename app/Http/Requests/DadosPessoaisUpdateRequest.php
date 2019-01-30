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
        $userId = $this->route('dados_pessoal')->Codigo_Professor;
        $id = \Auth()->user()->Codigo_Professor;

        return ($userId === $id) ? true : false;
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
            'Email' => 'required|max:120',
            'Data_Aniversario' => 'required|date_format:Y-m-d',
            'Materia' => 'required',
            'Pre',
            'primeira_quarta_serie',
            'quinta_oitava_serie',
            'Ens_Medio',
            'Ens_Superior',
            '2_3Grau',
            'Tecnico',
            'Supletivo',
            'Curso_Livre',
            'CEP' => 'required|max:9',
            'Endereco' => 'required|max:63',
            'Numero' => 'required|max:6',
            'Complemento' => 'max:50',
            'Bairro' => 'required|max:50',
            'Cidade' => 'required|max:32',
            'Estado' => 'required|max:2',
            'DDD_Telefone_Residencial' => 'max:2',
            'Telefone_Residencial' => 'max:20',
            'DDD_Telefone_Comercial' => 'max:2',
            'Telefone_Comercial' => 'max:9',
            'DDD_Telefone_Celular' => 'required|max:2',
            'Telefone_Celular' => 'required|max:15',
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
