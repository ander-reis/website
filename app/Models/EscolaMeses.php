<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class EscolaMeses extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_escola_meses';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_mes';

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;
}
