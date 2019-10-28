<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroEscolas extends Model
{
    /**
     * conexao database
     *
     * @var string
     */
//    protected $connection = 'pgsql';
    protected $connection = 'sqlsrv-sinpro';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'Cadastro_Escolas';

    /**
     * chave primaria
     *
     * @var null
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
    const CREATED_AT = 'dt_inicio';

    /**
     * set updated_at
     */
    const UPDATED_AT = 'Data_Alteracao';
}
