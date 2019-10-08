<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoEletronico extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_atendimento_chamado';

    /**
     * set timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_chamado';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'ds_nome',
        'ds_email',
        'ds_texto',
        'fl_departamento',
        'ds_ip'
    ];
}
