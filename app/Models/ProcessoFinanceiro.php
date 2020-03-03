<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessoFinanceiro extends Model
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
    protected $table = 'tb_jur_processo_financeiro';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'jur_pcf_nr_pagamento';

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
     * select ano dos pagamentos
     *
     * @param $pastas
     * @param $cpf
     * @return mixed
     */
    public static function getAnoPagamentos($pastas = null, $cpf = null)
    {
        return ProcessoFinanceiro::where('jur_pcf_nr_pasta', $pastas)
            ->where('CPF', $cpf)
            ->join('tb_jur_ficha_professor', 'jur_pcf_cd_fic_pro', '=', 'jur_fip_cd_fic_pro')
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->selectRaw('YEAR(jur_pcf_dt_vencimento) AS ano')
            ->distinct()
            ->orderByRaw('YEAR(jur_pcf_dt_vencimento) DESC')
            ->get('jur_pcf_dt_vencimento');
    }

    /**
     * retorna valores somados
     *
     * @param null $pastas
     * @param null $cpf
     * @param null $ano
     * @return string
     */
    public static function getTotalPagamentos($pastas = null, $cpf = null, $ano = null)
    {
        $collection = ProcessoFinanceiro::where('jur_pcf_nr_pasta', $pastas)
            ->where('CPF', $cpf)
            ->whereYear('jur_pcf_dt_vencimento', '=', $ano)
            ->join('tb_jur_ficha_professor', 'jur_pcf_cd_fic_pro', '=', 'jur_fip_cd_fic_pro')
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->select(['jur_pcf_dt_vencimento', 'jur_pcf_dt_pagamento'])
            ->selectRaw('(jur_pcf_vl_parcela - jur_pcf_vl_taxa - jur_pcf_vl_honorario) AS jur_pcf_vl_total')
            ->get();

        $counted = $collection->map(function($item){
            return ($item->jur_pcf_dt_pagamento === '1900-01-01 00:00:00.000') ? 0 : $item->jur_pcf_vl_total;
        });
        $piped = $counted->pipe(function ($counted) {
            return $counted->sum();
        });
        return "R$ " . number_format($piped, 2, ',', '.');
    }

    /**
     * select pagamentos
     *
     * @param $pastas
     * @param $cpf
     * @param $ano
     * @return mixed
     */
    public static function getPagamentos($pastas = null, $cpf = null, $ano = null)
    {
        $collection = ProcessoFinanceiro::where('jur_pcf_nr_pasta', $pastas)
            ->where('CPF', $cpf)
            ->whereYear('jur_pcf_dt_vencimento', '=', $ano)
            ->join('tb_jur_ficha_professor', 'jur_pcf_cd_fic_pro', '=', 'jur_fip_cd_fic_pro')
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->select([
                'jur_pcf_nr_pagamento',
                'jur_pcf_nr_parcela',
                'jur_pcf_dt_vencimento',
                'jur_pcf_dt_pagamento',
                'jur_pcf_ds_observacao',
            ])
            ->selectRaw('(jur_pcf_vl_parcela - jur_pcf_vl_taxa - jur_pcf_vl_honorario) AS jur_pcf_vl_total')
            ->orderBy('jur_pcf_dt_vencimento')
            ->orderBy('jur_pcf_nr_parcela')
            ->get();

        $model = $collection->map(function($item, $key){
            return [
                'jur_pcf_vl_total' => "R$ " . number_format($item->jur_pcf_vl_total, 2, ',', '.'),
                'jur_pcf_nr_pagamento' => $item->jur_pcf_nr_pagamento,
                'jur_pcf_nr_parcela' => $item->jur_pcf_nr_parcela,
                'jur_pcf_dt_vencimento' => dataFormatted($item->jur_pcf_dt_vencimento),
                'jur_pcf_dt_pagamento' => ($item->jur_pcf_dt_pagamento === '1900-01-01 00:00:00.000') ? '' : dataFormatted($item->jur_pcf_dt_pagamento),
                'jur_pcf_pagamento' => ($item->jur_pcf_dt_pagamento === '1900-01-01 00:00:00.000') ? 'Em Andamento' : 'Pago',
                'jur_pcf_ds_observacao' => $item->jur_pcf_ds_observacao,
            ];
        });
        return $model->all();
    }
}
