<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    /**
     * Conexão database SINPRO
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * Conexão database POSTGRE
     */
//    protected $connection = 'pgsql';

    protected $table = 'Materia';
}
