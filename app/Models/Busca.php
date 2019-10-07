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
     * @var array
     */
    protected $fillable = ['txt_termo', 'dt_busca'];

    public $timestamps = false;

    /**
     * set updtaed_at
     */
//    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
//    const UPDATED_AT = false;
}
