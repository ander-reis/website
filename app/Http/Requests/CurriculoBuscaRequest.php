<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculoBuscaRequest extends FormRequest
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
            'uf' => 'required|string',
            'int_nivel_atuacao' => 'required|string',
            'int_formacao' => 'required|string',
            'int_disciplina' => 'required|string'
        ];
    }
}
