<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrevidenciaDataUpdateRequest extends FormRequest
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
            'fl_empregador' => 'required|string|max:2',
            'ds_cnpj' => 'required|string|max:18',
            'ds_empregador' => 'required|string|max:150',
            'fl_cargo' => 'required|string|max:2',
            'dt_nascimento' => 'required|date_format:d/m/Y|eighteen_year_valid',
            'dt_admissao' => 'required|date_format:d/m/Y|before:dt_demissao|after:dt_nascimento',
            'dt_demissao' => 'date_format:d/m/Y|after_or_equal:dt_admissao|nullable'
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        /**
         * data filter sanitize / trim
         */
        $input['fl_empregador'] = trim(filter_var($input['fl_empregador'], FILTER_SANITIZE_STRING));
        $input['ds_cnpj'] = trim(filter_var($input['ds_cnpj'], FILTER_SANITIZE_STRING));
        $input['fl_cargo'] = trim(filter_var($input['fl_cargo'], FILTER_SANITIZE_STRING));
        $input['dt_admissao'] = trim(filter_var($input['dt_admissao'], FILTER_SANITIZE_STRING));
        $input['dt_demissao'] = trim(filter_var($input['dt_demissao'], FILTER_SANITIZE_STRING));
        $input['dt_nascimento'] = trim(filter_var($input['dt_nascimento'], FILTER_SANITIZE_STRING));

        if($input['dt_demissao'] == null) {
            $input['dt_demissao'] = '01/01/1900';
        }

        /**
         * data uppercase
         */
        $input['ds_empregador'] = dataUpperCase($input['ds_empregador']);

        $this->replace($input);
    }
}
