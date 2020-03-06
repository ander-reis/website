<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculoReajusteCreateRequest extends FormRequest
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
            'ds_cnpj' => 'required|min:18|max:18',
            'ds_fantasia' => 'required|string'
        ];
    }
}
