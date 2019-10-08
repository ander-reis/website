<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Busca extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_busca_termos';

    /**
     * set chave primaria
     *
     * @var null
     */
    protected $primaryKey = null;

    /**
     * set increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['txt_termo', 'dt_busca'];

    /**
     * set tiomestamps
     *
     * @var bool
     */
    public $timestamps = false;

}
