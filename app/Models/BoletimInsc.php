<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class BoletimInsc extends Model
{
    protected $connection = 'sqlsrv-website';

    protected $table = 'tb_sinpro_email_boletim';

    /**
     * configura CREATED_AT
     */
    const CREATED_AT = 'dt_cadastro';

    const UPDATED_AT = 'dt_alteracao';

    protected $primaryKey = 'id_email';

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
