<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessosIndexRequest extends FormRequest
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
            'cpf' => 'required|cpf',
            'nascimento' => 'required|date|date_format:Y-m-d|year_invalid',
            'opcao' => 'required'
        ];
    }

    public function sanitize()
    {
        $input = $this->all();
        $input['cpf'] = trim(filter_var($input['cpf'], FILTER_SANITIZE_STRING));
        $input['nascimento'] = trim(filter_var($input['nascimento'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
