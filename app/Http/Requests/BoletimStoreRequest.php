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

        if (!isset($input['boletimsind'])) {
            return [
                'boletimsind' => 'required'
            ];
        }

        if ($input['boletimsind'] == 1) {  //sindicalizado
            return [
                'num_matricula' => 'required',
                'ds_email'      => 'email:rfc,dns',
                'ds_nome'       => 'required'
            ];
        } else {
            if (!isset($input['opt_perg_a']) && !isset($input['opt_perg_b']) && !isset($input['opt_perg_c'])) {
                return [
                    'ds_email'      => 'email:rfc,dns',
                    'ds_nome'       => 'required',

                ];
            } else {
                return [
                    'ds_email'      => 'email:rfc,dns',
                    'ds_nome'       => 'required',
                    'lecionar'      => 'required',
                ];
            }
        }
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
