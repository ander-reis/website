<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Processos extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_processos';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'id_processo';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = null;
}
