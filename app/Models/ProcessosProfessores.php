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
        'PIS',
        'Nome_Mae',
        'CEP',
        'Endereco',
        'Numero',
        'Complemento',
        'Bairro',
        'Cidade',
        'Estado',
        'Email',
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
}
