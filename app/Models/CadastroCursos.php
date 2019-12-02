<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CadastroCursos extends Model
{
    /**
     * conexao database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';
//    protected $connection = 'pgsql-cadastro';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_cur_cadastro_cursos';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'cur_cur_cd_curso';

    /**
     * set created_at
     */
    const CREATED_AT = 'cur_cur_dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = false;

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * consulta ao cadastro do professor
     *
     * @param $id
     * @return Model|\Illuminate\Database\Query\Builder|object|null
     */
    public static function getCadastroDocente($id)
    {
        return CadastroCursos::distinct()
            ->join('tb_cur_pagamento_docente', 'cur_cur_cd_curso', 'cur_pag_cd_curso')
            ->join('tb_cur_cadastro_docente', 'cur_pag_cd_docente', 'cur_doc_cd_docente')
            ->where('cur_cur_cd_curso', $id)
            ->get(['cur_doc_fl_sexo', 'cur_doc_ds_apelido', 'cur_doc_ds_qualificacao']);
    }

    /**
     * consulta a lista de cursos
     *
     * @param $mes
     * @param $ano
     * @return \Illuminate\Support\Collection
     */
    public static function getCadastroCursos($mes, $ano)
    {
        // data de hoje
        $carbon = \Carbon\Carbon::parse(now());
        $data = $carbon->format('Y/m/d');

        return CadastroCursos::selectRaw('tb_cur_cadastro_cursos.cur_cur_cd_curso, tb_cur_cadastro_cursos.cur_cur_ds_tema, tb_cur_cadastro_cursos.cur_cur_hr_inicio, tb_cur_cadastro_cursos.cur_cur_hr_final, DATA.DATA')
            ->join(DB::raw('(SELECT DISTINCT cur_dt_cd_curso, MIN(cur_dt_dt_data) DATA FROM tb_cur_data_cursos GROUP BY cur_dt_cd_curso) DATA'), 'cur_dt_cd_curso', '=', 'tb_cur_cadastro_cursos.cur_cur_cd_curso')
            ->whereRaw('(tb_cur_cadastro_cursos.cur_cur_nr_vaga >= (SELECT COUNT(1) FROM tb_cur_agendamento TB2 WHERE TB2.cur_agt_fl_situacao <> 1 AND TB2.cur_agt_cd_curso = tb_cur_cadastro_cursos.cur_cur_cd_curso))')
            ->where('cur_cur_fl_situacao', 0)
            ->whereRaw(DB::raw("(DATA.DATA >= '{$data}')"))
            ->whereRaw(DB::raw("(MONTH(DATA.DATA) = {$mes})"))
            ->whereRaw(DB::raw("(YEAR(DATA.DATA) = {$ano})"))
            ->groupBy(['tb_cur_cadastro_cursos.cur_cur_cd_curso', 'tb_cur_cadastro_cursos.cur_cur_ds_tema', 'tb_cur_cadastro_cursos.cur_cur_hr_inicio', 'tb_cur_cadastro_cursos.cur_cur_hr_final', 'DATA.DATA'])
            ->orderByRaw('DATA.DATA')
            ->get(['tb_cur_cadastro_cursos.cur_cur_cd_curso', 'tb_cur_cadastro_cursos.cur_cur_ds_tema', 'tb_cur_cadastro_cursos.cur_cur_hr_inicio', 'tb_cur_cadastro_cursos.cur_cur_hr_final', 'DATA.DATA']);
    }
}
