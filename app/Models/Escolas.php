<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Escolas extends Model
{
    /**
     * Conexão database SINPRO
     */
    //protected $connection = 'sqlsrv-sinpro';

    //protected $table = 'tb_sinpro_escolas';

    protected $fillable = ['user_id', 'escola', 'endereco', 'telefone'];
}
