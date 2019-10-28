<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class PagamentoDocente extends Model
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
    protected $table = 'tb_cur_pagamento_docente';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = null;

    /**
     * set autoincrement
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * set dates
     *
     * @var array
     */
    protected $dates = ['cur_pag_dt_vencimento', 'cur_pag_dt_pagamento', 'cur_pag_dt_geracao'];
}
