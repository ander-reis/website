<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessorObservacoes extends Model
{
    /**
     * conexao database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'Professor_Observacoes';

    /**
     * set created_at
     */
    const CREATED_AT = null;

    /**
     * set updated_at
     */
    const UPDATED_AT = null;

    /**
     * set timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'Codigo_Professor',
        'Observacao',
        'Login',
        'Data',
        'Hora'
    ];
}
