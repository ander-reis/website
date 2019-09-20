<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoletimStoreRequest extends FormRequest
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

        $input = $this->all();

        return [
            'num_cpf'       => 'cpf',
            'ds_email'      => 'email:rfc,dns'
        ];
    }
}
