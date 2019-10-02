<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class AtendimentoDptos extends Model
{
    protected $connection = 'sqlsrv-website';
    protected $table = 'tb_sinpro_atendimento_departamentos';
    protected $primaryKey = 'id_departamento';
    public $timestamps = false;


    //protected $fillable = ['ds_departamento'];
}
