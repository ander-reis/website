<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_whatsapp';

    /**
     * @var array
     */
    protected $fillable = [
        'ds_celular',
        'ds_nome',
        'dt_pergunta',
        'ds_pergunta',
        'dt_resposta',
        'ds_resposta',
    ];
}
