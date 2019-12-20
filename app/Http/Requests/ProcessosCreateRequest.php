<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessosCreateRequest extends FormRequest
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
//            'Nome' => 'required|string|max:100',
//            'Sexo' => 'required',
//            'CPF' => 'required|string|cpf|max:14',
//            'RG' => 'required|string|max:12',
//            'Data_Aniversario' => 'required|date|date_format:Y-m-d|year_invalid',
//            'PIS' => 'required|string|max:15',
//            'Nome_Mae' => 'required|string|max:100',
//            'CEP' => 'required|string|max:9',
//            'endereco' => 'required|string|max:63',
//            'Numero' => 'required|string|max:6',
//            'Complemento' => 'max:50',
//            'bairro' => 'required|string|max:59',
//            'cidade' => 'required|string|max:21',
//            'estado' => 'required|string|max:2',

            'Email.0' => 'required|email:rfc,dns|max:120',
            'Email.1' => 'required|email:rfc,dns|max:120',
            'Email.2' => 'required|email:rfc,dns|max:120',

//            'pro_ema_ds_email1' => 'required|email:rfc,dns|max:120',
//            'pro_ema_ds_email2' => 'email:rfc,dns|max:120|nullable',
//            'pro_ema_ds_email3' => 'email:rfc,dns|max:120|nullable',

//            'DDD_Telefone_Residencial' => 'required|numeric|max:99',
//            'Telefone_Residencial' => 'required|string|max:20',
//            'DDD_Telefone_Celular' => 'required|numeric|max:99',
//            'Telefone_Celular' => 'required|string|max:15',
//            'Banco' => 'required|string|max:3',
//            'Agencia' => 'required|string|max:8',
//            'Conta' => 'required|string|max:18',
//            'Poupanca' => 'required|boolean',
//            'Conjunta' => 'required|boolean'
        ];
    }

    public function sanitize()
    {
        $input = $this->all();

        /**
         * data filter sanitize / trim
         */
//        $input['id_processo'] = trim(filter_var($input['id_processo'], FILTER_SANITIZE_STRING));
//        $input['Nome'] = trim(filter_var($input['Nome'], FILTER_SANITIZE_STRING));
//        $input['CPF'] = trim(filter_var($input['CPF'], FILTER_SANITIZE_STRING));
//        $input['RG'] = trim(filter_var($input['RG'], FILTER_SANITIZE_STRING));
//        $input['PIS'] = trim(filter_var($input['PIS'], FILTER_SANITIZE_STRING));
//        $input['Nome_Mae'] = trim(filter_var($input['Nome_Mae'], FILTER_SANITIZE_STRING));
//        $input['CEP'] = trim(filter_var($input['CEP'], FILTER_SANITIZE_STRING));
//        $input['endereco'] = trim(filter_var($input['endereco'], FILTER_SANITIZE_STRING));
//        $input['Numero'] = trim(filter_var($input['Numero'], FILTER_SANITIZE_STRING));
//        $input['Complemento'] = trim(filter_var($input['Complemento'], FILTER_SANITIZE_STRING));
//        $input['bairro'] = trim(filter_var($input['bairro'], FILTER_SANITIZE_STRING));
//        $input['cidade'] = trim(filter_var($input['cidade'], FILTER_SANITIZE_STRING));
//        $input['estado'] = trim(filter_var($input['estado'], FILTER_SANITIZE_STRING));
        $input['Email.0'] = trim(filter_var($input['Email.0'], FILTER_SANITIZE_STRING));
        $input['Email[1]'] = trim(filter_var($input['Email[1]'], FILTER_SANITIZE_STRING));
        $input['Email[2]'] = trim(filter_var($input['Email[2]'], FILTER_SANITIZE_STRING));
//        $input['DDD_Telefone_Residencial'] = trim(filter_var($input['DDD_Telefone_Residencial'], FILTER_SANITIZE_STRING));
//        $input['Telefone_Residencial'] = trim(filter_var($input['Telefone_Residencial'], FILTER_SANITIZE_STRING));
//        $input['DDD_Telefone_Celular'] = trim(filter_var($input['DDD_Telefone_Celular'], FILTER_SANITIZE_STRING));
//        $input['Telefone_Celular'] = trim(filter_var($input['Telefone_Celular'], FILTER_SANITIZE_STRING));
//        $input['Banco'] = trim(filter_var($input['Banco'], FILTER_SANITIZE_STRING));
//        $input['Agencia'] = trim(filter_var($input['Agencia'], FILTER_SANITIZE_STRING));
//        $input['agenciaDV'] = trim(filter_var($input['agenciaDV'], FILTER_SANITIZE_STRING));
//        $input['Conta'] = trim(filter_var($input['Conta'], FILTER_SANITIZE_STRING));
//        $input['contaDV'] = trim(filter_var($input['contaDV'], FILTER_SANITIZE_STRING));
//        $input['Poupanca'] = trim(filter_var($input['Poupanca'], FILTER_SANITIZE_STRING));
//        $input['Conjunta'] = trim(filter_var($input['Conjunta'], FILTER_SANITIZE_STRING));

        /**
         * data uppercase
         */
        $input['Nome'] = dataUpperCase($input['Nome']);
        $input['Nome_Mae'] = dataUpperCase($input['Nome_Mae']);
        $input['endereco'] = dataUpperCase($input['endereco']);
        $input['Complemento'] = dataUpperCase($input['Complemento']);
        $input['bairro'] = dataUpperCase($input['bairro']);
        $input['cidade'] = dataUpperCase($input['cidade']);
        $input['estado'] = dataUpperCase($input['estado']);

        $this->replace($input);
    }
}
