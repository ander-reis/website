<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessosProfessores extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_processos_professores';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'id_cadastro';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = 'dt_alteracao';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_processo',
        'Nome',
        'Sexo',
        'CPF',
        'CPF_Beneficiario',
        'RG',
        'Data_Aniversario',
        'Email',
        'PIS',
        'Nome_Mae',
        'CEP',
        'Endereco',
        'Numero',
        'Complemento',
        'Bairro',
        'Cidade',
        'Estado',
        'DDD_Telefone_Residencial',
        'Telefone_Residencial',
        'DDD_Telefone_Celular',
        'Telefone_Celular',
        'Banco',
        'Agencia',
        'Conta',
        'Poupanca',
        'Conjunta',
        'num_ip',
    ];

    /**
     * metodo responsavel por criar e/ou atualizar tb_sinpro_processos_professores em beneficiario
     *
     * @param $request
     * @param $cpf
     */
    public static function createOrUpdateProcessosProfessores($request, $cpf)
    {
        $processo = ProcessosProfessores::where('id_processo', $request->input('id_processo'))->where('CPF_Beneficiario', $cpf)->first(['id_cadastro']);
        if(is_null($processo)){
            ProcessosProfessores::create(['CPF' => $cpf, 'CPF_Beneficiario' => $cpf, 'id_processo' => $request->input('id_processo'), 'num_ip' => $request->ip(), 'fl_sas' => 0, 'fl_juridico' => 0]);
        } else {
            ProcessosProfessores::where('id_processo', $request->input('id_processo'))->where('CPF_Beneficiario', $cpf)->update(['num_ip' => $request->ip(), 'fl_sas' => 0, 'fl_juridico' => 0]);
        }
    }
}
