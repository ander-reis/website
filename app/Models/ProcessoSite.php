<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessoSite extends Model
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
    protected $table = 'tb_jur_processo_site';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'jur_prs_cd_contador';

    /**
     * set created_at
     */
    const CREATED_AT = 'jur_prs_dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = null;

    /**
     * retorna message
     *
     * @param null $pastas
     * @param null $cpf
     * @return mixed
     */
    public static function getMessage($pastas = null, $cpf = null)
    {
        return ProcessoSite::where('jur_prs_ds_cpf', $cpf)
            ->where('jur_prs_nr_pasta', $pastas)
            ->join('Cadastro_Professores', 'jur_prs_ds_cpf', '=', 'CPF')
            ->join('tb_jur_processo_site_informacao', function ($join) {
                $join->on('jur_prs_nr_pasta', '=', 'jur_psi_nr_pasta');
                $join->on('jur_prs_cd_status', '=', 'jur_psi_cd_status');
            })
            ->select(['jur_prs_nr_pasta', 'jur_prs_ds_cpf', 'jur_psi_ds_status', 'jur_prs_vr_receber', 'jur_prs_vr_parcela1', 'jur_prs_vr_parcela2'])
            ->get();
    }
}
