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
        $this->sanitize();

        return [
            'nome'                  => 'required|max:50',
            'cpf'                   => 'required|max:14',
            'nascimento'            => 'required|date_format:Y-m-d',
            'sexo'                  => 'required',
            'rg'                    => 'required|max:12',
            'estadocivil'           => 'required',
            'nacionalidade'         => 'required|max:20',
            'email'                 => 'email:rfc,dns|max:120',
            'celular'               => 'required|max:15',
            'telefoneresidencial'   => 'max:14',
            'cep'                   => 'required|max:9',
            'endereco'              => 'required|max:63',
            'numero'                => 'required|max:6',
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

    public function sanitize()
    {
        $input = $this->all();
        $input['nome'] = mb_strtoupper(trim(filter_var($input['nome'], FILTER_SANITIZE_STRING)));
        $input['nacionalidade'] = mb_strtoupper(trim(filter_var($input['nacionalidade'], FILTER_SANITIZE_STRING)));
        $input['endereco'] = mb_strtoupper($input['endereco']);
        $input['numero'] = mb_strtoupper(trim(filter_var($input['numero'], FILTER_SANITIZE_STRING)));
        $input['complemento'] = mb_strtoupper(trim(filter_var($input['complemento'], FILTER_SANITIZE_STRING)));
        $input['bairro'] = mb_strtoupper($input['bairro']);
        $input['cidade'] = mb_strtoupper($input['cidade']);
        $input['estado'] = mb_strtoupper($input['estado']);        
        $input['email'] = mb_strtolower($input['email']);
        $input['disciplina'] = mb_strtoupper(trim(filter_var($input['disciplina'], FILTER_SANITIZE_STRING)));
        $input['NomeInstI'] = mb_strtoupper(trim(filter_var($input['NomeInstI'], FILTER_SANITIZE_STRING)));
        $input['EndInstI'] = mb_strtoupper(trim(filter_var($input['EndInstI'], FILTER_SANITIZE_STRING)));
        $input['TelInstI'] = mb_strtoupper(trim(filter_var($input['TelInstI'], FILTER_SANITIZE_STRING)));
        $input['NomeInstII'] = mb_strtoupper(trim(filter_var($input['NomeInstII'], FILTER_SANITIZE_STRING)));
        $input['EndInstII'] = mb_strtoupper(trim(filter_var($input['EndInstII'], FILTER_SANITIZE_STRING)));
        $input['TelInstII'] = mb_strtoupper(trim(filter_var($input['TelInstII'], FILTER_SANITIZE_STRING)));
        $input['NomeInstIII'] = mb_strtoupper(trim(filter_var($input['NomeInstIII'], FILTER_SANITIZE_STRING)));
        $input['EndInstIII'] = mb_strtoupper(trim(filter_var($input['EndInstIII'], FILTER_SANITIZE_STRING)));
        $input['TelInstIII'] = mb_strtoupper(trim(filter_var($input['TelInstIII'], FILTER_SANITIZE_STRING)));

        $this->replace($input);
    }

}
