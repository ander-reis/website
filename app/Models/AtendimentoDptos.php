<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoDptos extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_atendimento_departamentos';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_departamento';

    /**
     * set timestamps
     *
     * @var bool
     */
    public $timestamps = false;


    //protected $fillable = ['ds_departamento'];
}
