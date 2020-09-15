<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class PrevidenciaProfessor extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_previdencia_professor';

    /**
     * @var array
     */
    protected $fillable = [
        'ds_cpf',
        'ds_nome',
        'dt_nascimento',
        'fl_sexo',
        'ds_celular',
        'ds_email',
        'ds_cep',
        'ds_endereco',
        'ds_numero',
        'ds_complemento',
        'ds_bairro',
        'ds_cidade',
        'ds_uf',
        'fl_analisado',
    ];

    /**
     * relacionamento hasMany
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function previdenciaData()
    {
        return $this->hasMany(PrevidenciaData::class, 'id_professor');
    }
}
