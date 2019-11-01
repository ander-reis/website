<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class NovaSindicalizacao extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_sindicalizacao';

    /**
     * set timestamps
     * @var bool
     */
    public $timestamps = false;

    /**
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'snd_id_matricula';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'snd_id_matricula',
        'snd_nm_professor',
        'snd_fl_sexo',
        'snd_ds_nacionalidade',
        'snd_dt_nascimento',
        'snd_ds_cpf',
        'snd_ds_rg',
        'snd_fl_estado_civil',
        'snd_cd_cep',
        'snd_ds_endereco',
        'snd_ds_numero',
        'snd_ds_complemento',
        'snd_ds_bairro',
        'snd_ds_cidade',
        'snd_ds_uf',
        'snd_ds_ddd_residencial',
        'snd_ds_fone_residencial',
        'snd_ds_ddd_celular',
        'snd_ds_celular',
        'snd_ds_email',
        'snd_fl_pre',
        'snd_fl_1_4serie',
        'snd_fl_5_8serie',
        'snd_fl_ens_medio',
        'snd_fl_ens_superior',
        'snd_fl_supletivo',
        'snd_fl_curso_livre',
        'snd_fl_tecnico',
        'snd_fl_situacao',
        'snd_ds_materia',
        'snd_ds_escola1',
        'snd_ds_endereco1',
        'snd_ds_fone1',
        'snd_ds_escola2',
        'snd_ds_endereco2',
        'snd_ds_fone2',
        'snd_ds_escola3',
        'snd_ds_endereco3',
        'snd_ds_fone3',
        'snd_fl_tipo',
        'snd_nm_ip'
    ];
}
