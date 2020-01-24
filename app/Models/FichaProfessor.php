<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class FichaProfessor extends Model
{
    /**
     * conexao database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_jur_ficha_professor';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'jur_fip_cd_fic_pro';

    /**
     * set created_at
     */
    const CREATED_AT = null;

    /**
     * set updated_at
     */
    const UPDATED_AT = null;

    /**
     * set timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * select ficha professor
     *
     * @param $cpf
     * @param $dataAniversario
     * @return mixed
     */
    public static function fichaProfessor($cpf, $dataAniversario)
    {
        return FichaProfessor::where('CPF', $cpf)
            ->where(function ($q) use ($dataAniversario) {
                $q->where('Data_Aniversario', $dataAniversario)
                    ->orWhere('Data_Aniversario', '1900-01-01');
            })
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->join('tb_jur_ficha_consulta', 'jur_fic_nr_ficha', '=', 'jur_fip_nr_ficha')
            ->select(['jur_fic_nr_pasta', 'CPF', 'Data_Aniversario', 'jur_fip_cd_professor', 'Nome'])
            ->get();
    }

    /**
     * relacao Cadastro_Professores
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function professor()
    {
        return $this->hasOne(CadastroProfessores::class, 'Codigo_Professor', 'jur_fip_cd_professor')->select([
            'Codigo_Professor',
            'Nome',
            'Sexo',
            'CPF',
            'RG',
            'Data_Aniversario',
            'PIS',
            'Nome_Mae',
            'CEP',
            'Endereco',
            'Numero',
            'Complemento',
            'Bairro',
            'Cidade',
            'Estado',
            'Email',
            'DDD_Telefone_Residencial',
            'Telefone_Residencial',
            'DDD_Telefone_Comercial',
            'Telefone_Comercial',
            'DDD_Telefone_Celular',
            'Telefone_Celular',
            'Banco',
            'Agencia',
            'Conta',
            'Poupanca',
            'Conjunta',

        ]);
    }
}
