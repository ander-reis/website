<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CepSP extends Model
{
    /**
     * Conexão database SINPRO
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * Conexão database POSTGRE
     */
//    protected $connection = 'pgsql';

    protected $table = 'CepSP';

    protected $fillable = [
        'Tipo',
        'Logradouro',
        'Complemento',
        'Bairro',
        'Cidade',
        'UF',
        'Cep'
    ];

    public $timestamps = false;
}
