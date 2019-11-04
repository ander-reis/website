<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class DataCursos extends Model
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
    protected $table = 'tb_cur_data_cursos';

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
     * set created_at
     */
    const CREATED_AT = 'cur_dt_dt_data';

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
}
