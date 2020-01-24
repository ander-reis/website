<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessoFinanceiroIr extends Model
{
    /**
     * conexao database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_jur_processo_financeiro_ir';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'jur_pfi_nr_pagamento';

    /**
     * set created_at
     */
    const CREATED_AT = null;

    /**
     * set updated_at
     */
    const UPDATED_AT = null;

    /**
     * set timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * select ano imposto
     *
     * @param $pastas
     * @param $cpf
     * @param $ano
     * @return mixed
     */
    public static function getAnoImposto($pastas, $cpf)
    {
        return ProcessoFinanceiroIr::where('jur_pfi_nr_pasta', $pastas)
            ->where('CPF', $cpf)
            ->join('tb_jur_ficha_professor', 'jur_pfi_cd_fic_pro', '=', 'jur_fip_cd_fic_pro')
            ->join('tb_jur_ficha_consulta', 'jur_fip_nr_ficha', '=', 'jur_fic_nr_ficha')
            ->join('Cadastro_Escolas', 'jur_fic_cd_cnpj', '=', 'CGC_Escola')
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->join('tb_jur_processo', 'jur_pfi_nr_pasta', '=', 'jur_prc_nr_pasta')
            ->select('jur_pfi_ds_ano')
            ->orderBy('jur_pfi_ds_ano')
            ->get();
    }

    /**
     * select imposto
     *
     * @param $pastas
     * @param $cpf
     * @param $ano
     * @return mixed
     */
    public static function getImposto($pastas, $cpf, $ano)
    {
        return ProcessoFinanceiroIr::where('jur_pfi_nr_pasta', $pastas)
            ->where('CPF', $cpf)
            ->where('jur_pfi_ds_ano', $ano)
            ->join('tb_jur_ficha_professor', 'jur_pfi_cd_fic_pro', '=', 'jur_fip_cd_fic_pro')
            ->join('tb_jur_ficha_consulta', 'jur_fip_nr_ficha', '=', 'jur_fic_nr_ficha')
            ->join('Cadastro_Escolas', 'jur_fic_cd_cnpj', '=', 'CGC_Escola')
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->join('tb_jur_processo', 'jur_pfi_nr_pasta', '=', 'jur_prc_nr_pasta')
            ->select([
                'Nome',
                'jur_prc_nr_processo',
                'jur_fic_cd_cnpj',
                'Razao_Social',
                'Sexo',
                'jur_pfi_vl_rendimento',
                'jur_pfi_vl_inss',
                'jur_pfi_nr_parcela',
                'jur_pfi_ds_ano'
            ])
            ->first();
    }
}
