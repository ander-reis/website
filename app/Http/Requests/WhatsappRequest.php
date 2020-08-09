<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhatsappRequest extends FormRequest
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
            'ds_celular' => 'required|string|max:20',
            'ds_nome' => 'max:100',
            'dt_pergunta' => 'required|date_format:d/m/Y|year_invalid',
            'ds_pergunta' => 'required',
            'dt_resposta' => 'required|date_format:d/m/Y|year_invalid',
            'ds_resposta' => 'required',
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        $input['ds_celular'] = trim(filter_var($input['ds_celular'], FILTER_SANITIZE_STRING));
        $input['ds_nome'] = trim(filter_var($input['ds_nome'], FILTER_SANITIZE_STRING));
        $input['dt_pergunta'] = trim(filter_var($input['dt_pergunta'], FILTER_SANITIZE_STRING));
        $input['ds_pergunta'] = trim(filter_var($input['ds_pergunta'], FILTER_SANITIZE_STRING));
        $input['dt_resposta'] = trim(filter_var($input['dt_resposta'], FILTER_SANITIZE_STRING));
        $input['ds_resposta'] = trim(filter_var($input['ds_resposta'], FILTER_SANITIZE_STRING));

        /**
         * data format
         */
        $input['dt_pergunta'] = dateFormattedDatabase($input['dt_pergunta']);
        $input['dt_resposta'] = dateFormattedDatabase($input['dt_resposta']);

        /**
         * data uppercase
         */
        $input['ds_nome'] = dataUpperCase($input['ds_nome']);

        $this->replace($input);
    }
}
