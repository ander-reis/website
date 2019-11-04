<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @method static create(array $array)
 */
class CurriculoProfessor extends Authenticatable
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_curriculos_professores';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_curriculo';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_data_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = 'dt_data_ult_atualizacao';

    /**
     * @var array
     */
    protected $fillable = [
        'ds_cpf',
        'ds_matricula',
        'ds_nome',
        'ds_sexo',
        'int_estado_civil',
        'dt_data_nasc',
        'ds_endereco',
        'ds_bairro',
        'ds_cidade',
        'ds_estado',
        'ds_cep',
        'ds_pais',
        'ds_mail',
        'ds_fone',
        'ds_celular',
        'ds_fax',
        'ds_salario',
        'int_empregado',
        'int_disp_horario',
        'int_disp_cidade',
        'int_formacao',
        'ds_outra_formacao',
        'int_disciplina',
        'int_nivel_atuacao',
        'ds_objetivo',
        'ds_qualificacao',
        'ds_experiencia',
        'ds_user',
        'ds_pass',
        'int_ativo',
        'dt_data_cadastro',
        'dt_data_ult_atualizacao',
        'password',
    ];

//    public function getEmailForPasswordReset()
//    {
//        return 'ds_mail';
//    }

}
