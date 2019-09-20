<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Boletim extends Model
{
    protected $connection = 'sqlsrv-website';

    protected $table = 'tb_boletim_cadastro';

    /**
     * configura CREATED_AT
     */
    const CREATED_AT = 'dt_cadastro';

    const UPDATED_AT = 'dt_alteracao';

    protected $fillable = [
        'num_matricula',
        'num_cpf',
        'ds_nome',
        'ds_email',
        'opt_perg_a',
        'opt_perg_b',
        'opt_perg_c',
        'dt_cadastro',
        'dt_alteracao'
    ];

    /**
     * Mutators formata data
     *
     * @return string
     * @throws \Exception
     */
    public function getDtBoletimFormattedAttribute()
    {
        return (new \DateTime($this->dt_boletim))->format('d/m/Y');
    }
}
