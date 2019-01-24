<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EscolaCreateRequest extends FormRequest
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
            'escola' => 'required|max:80',
            'endereco' => 'required|max:80',
            'telefone' => 'max:80'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['escola'] = trim(filter_var($input['escola'], FILTER_SANITIZE_STRING));
        $input['endereco'] = trim(filter_var($input['endereco'], FILTER_SANITIZE_STRING));
        $input['telefone'] = trim(filter_var($input['telefone'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
