<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NovaSindicalizacaoRequest extends FormRequest
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
        return [
            'nome'                  => 'required|max:50',
            'cpf'                   => 'required|max:14',
            'nascimento'            => 'date',
            'sexo'                  => 'required',
            'rg'                    => 'required|max:12',
            'estadocivil'           => 'required',
            'nacionalidade'         => 'required|max:20',
            'email'                 => 'email:rfc,dns|max:120',
            'celular'               => 'required|max:15',
            'telefoneresidencial'   => 'max:14',
            'cep'                   => 'required|max:9',
            'endereco'              => 'max:63',
            'numero'                => 'max:6',
            'complemento'           => 'max:50',
            'bairro'                => 'max:59',
            'cidade'                => 'max:21',
            'estado'                => 'max:2',
            'disciplina'            => 'required|max:150',
            'situacao'              => 'required',
            'NomeInstI'             => 'required|max:50',
            'EndInstI'              => 'required|max:63',
            'TelInstI'              => 'required|max:9',
            'NomeInstII'            => 'max:50',
            'EndInstII'             => 'max:63',
            'TelInstII'             => 'max:9',
            'NomeInstIII'           => 'max:50',
            'EndInstIII'            => 'max:63',
            'TelInstIII'            => 'max:9',
            'optAutorizacao'        => 'accepted',
        ];
    }
}
