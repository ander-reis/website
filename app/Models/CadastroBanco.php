<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroBanco extends Model
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
    protected $table = 'Cadastro_Banco';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = null;

    /**
     * set autoincrement
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * set created_at
     */
    const CREATED_AT = false;

    /**
     * set updated_at
     */
    const UPDATED_AT = false;

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * select banco, exceto CodBanco = ['000', '999']
     *
     * @return mixed
     */
    public static function getBanco()
    {
        return CadastroBanco::whereNotIn('CodBanco', ['000', '999'])->orderBy('Banco')->get(['CodBanco', 'Banco']);
    }
}
