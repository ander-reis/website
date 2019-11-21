<?php

namespace Website\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Website\Http\Controllers\Website\CurriculoController;
use Website\Notifications\ResetPassword;

/**
 * @method static create(array $array)
 */
class CurriculoProfessor extends Authenticatable
{

    use Notifiable;

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
        'email',
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

    /**
     * personalizacao e-mail password reset
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * mutators formata data para o form de edição -> 2000-12-30
     *
     * @return \Carbon\Carbon
     */
    public function getDtCadastroUTCFormattedAttribute()
    {
        return Carbon::parse($this->dt_data_nasc)->format('Y-m-d');
    }

    /**
     * mutators formata ds_sexo
     *
     * @return string
     */
    public function getDsSexoFormattedAttribute()
    {
        return $this->ds_sexo === 'M' ? 'Masculino' : 'Feminino';
    }

    /**
     * mutators estado civil
     *
     * @return mixed
     */
    public function getDsEstadoCivilFormattedAttribute()
    {
        $data = CurriculoController::estadoCivil();

        foreach ($data as $key => $item) {
            if($this->int_estado_civil == $key){
                return $item;
            }
        }
    }

    /**
     * mutators formata int_empregado
     *
     * @return string
     */
    public function getDsEmpregadoFormattedAttribute()
    {
        return $this->int_empregado ? 'Sim' : 'Não';
    }

    /**
     * mutators formata int_disp_cidade
     *
     * @return string
     */
    public function getDsDispCidadeFormattedAttribute()
    {
        return $this->int_disp_cidade ? 'Sim' : 'Não';
    }

    /**
     * mutators formata int_disp_horario
     *
     * @return \Carbon\Carbon
     */
    public function getDsDispHorarioFormattedAttribute()
    {
        $collection = collect([0 => 'Integral', 1 => 'Manhã', 2 => 'Tarde', 3 => 'Noite']);
        $key = $collection->filter(function($value, $key){
            if($this->int_disp_horario == $key){
                return $value;
            }
        });
        return $key->first();
    }

    /**
     * mutators formata int_formacao
     *
     * @return mixed
     */
    public function getDsFormacaoFormattedAttribute()
    {
        $model = CurriculoFormacao::where('id_formacao', $this->int_formacao)->first('ds_formacao');
        return $model->ds_formacao;
    }

    /**
     * mutators formata int_disciplina
     *
     * @return mixed
     */
    public function getDsDisciplinaFormattedAttribute()
    {
        $model = CurriculoDisciplina::where('id_disciplina', $this->int_disciplina)->first('ds_disciplina');
        return $model->ds_disciplina;
    }

    /**
     * mutators formata int_atuacao
     *
     * @return mixed
     */
    public function getDsAtuacaoFormattedAttribute()
    {
        $model = CurriculoAtuacao::where('id_nivel_atuacao', $this->int_nivel_atuacao)->first('ds_nivel_atuacao');
        return $model->ds_nivel_atuacao;
    }
}
