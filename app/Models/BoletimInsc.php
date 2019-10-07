<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class BoletimInsc extends Model
{

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_email_boletim';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = 'dt_alteracao';

    /**
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_email';

    /**
     * set fillable
     *
     * @var array
     */
    protected $fillable = [
        'num_matricula',
        'num_cpf',
        'ds_nome',
        'ds_email',
        'opt_perg_a',
        'opt_perg_b',
        'opt_perg_c',
        'dt_cadastro',
        'dt_alteracao',
        'num_ip'
    ];
}
