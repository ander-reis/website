<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroProfessores extends Model
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
    protected $table = 'Cadastro_Professores';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'Codigo_Professor';

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
}
