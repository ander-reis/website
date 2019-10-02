<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoEletronico extends Model
{
    protected $connection = 'sqlsrv-website';
    protected $table = 'tb_sinpro_atendimento_chamado';

    public $timestamps = false;

    protected $primaryKey = 'id_chamado';

    protected $fillable = [
        'ds_nome',
        'ds_email',
        'ds_texto',
        'fl_departamento',
        'ds_ip'
    ];
}
