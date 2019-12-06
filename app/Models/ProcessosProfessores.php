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
}
