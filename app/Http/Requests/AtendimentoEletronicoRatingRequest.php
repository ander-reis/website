<?php

namespace Website\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Website\Models\AtendimentoEletronico;

class AtendimentoEletronicoRatingRequest extends FormRequest
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
        $confere = AtendimentoEletronico::where('ds_email',$this->txtEmail)->where('id_chamado',$this->chamado)->pluck('ds_email')->first();

        return [
            "txtEmail" => "email|max:80|in:$confere",
            "rating1" => "in:1,2,3,4,5",
            "rating2" => "in:1,2,3,4,5",
            "rating3" => "in:1,2,3,4,5",
        ];
    }
    public function messages()
    {
        return [
            'txtEmail.in' => 'O e-mail informado não corresponde ao cadastrado!',
        ];
    }
}
