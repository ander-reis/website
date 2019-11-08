<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculoUpdateRequest extends FormRequest
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
            'ds_nome' => ['required', 'string', 'max:50'],
            'ds_cpf' => ['required', 'string', 'max:14'],
//            'dt_data_nasc' => ['required', 'date_format:Y-m-d'],
            'int_estado_civil' => ['required'],

            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
        ];
    }
}
