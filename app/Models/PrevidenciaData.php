<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class PrevidenciaData extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_previdencia_data';

    /**
     * @var array
     */
    protected $fillable = [
        'id_professor',
        'fl_empregador',
        'ds_cnpj',
        'ds_empregador',
        'fl_cargo',
        'dt_admissao',
        'dt_demissao',
    ];

    public function professor()
    {
        return $this->hasOne(PrevidenciaProfessor::class, 'id', 'id_professor');
    }
}
