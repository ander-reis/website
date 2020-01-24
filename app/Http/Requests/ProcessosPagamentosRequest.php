<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessosPagamentosRequest extends FormRequest
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
            'pasta' => 'required',
            'ano' => 'required|date_format:Y'
        ];
    }
}
