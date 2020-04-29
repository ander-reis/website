<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CoronaDenuncia extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_corona_denuncia';

    /**
     * @var array
     */
    protected $fillable = [
        'id_motivo',
        'ds_escola',
        'ds_descricao',
        'ds_funcionario',
        'ds_meio',
    ];

    public function motivo()
    {
        return $this->belongsTo(CoronaMotivos::class, 'id_motivo');
    }
}
