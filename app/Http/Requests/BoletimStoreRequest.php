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
        //$this->sanitize();
        return [
            'ds_email'  => 'email',
            'ds_nome'   =>  'required'
        ];
    }

    /**
     *  sanitize html
     */
    public function sanitize()
    {
        $input = $this->all();
        $input['ds_titulo'] = trim(filter_var($input['ds_titulo'], FILTER_SANITIZE_STRING));
        $this->replace($input);
    }
}
