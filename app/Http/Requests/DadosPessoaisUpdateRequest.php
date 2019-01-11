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
        return [
            'name' => 'required|max:80',
            'email' => 'required|email',
            'ds_data_nascimento' => 'date_format:Y-m-d',
        ];
    }
}
