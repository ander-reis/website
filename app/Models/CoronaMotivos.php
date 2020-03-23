<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CoronaMotivos extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_corona_motivos';

    /**
     * @var array
     */
    protected $fillable = [
        'ds_descricao',
    ];
}
