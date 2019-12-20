<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroProfessores extends Model
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
    protected $table = 'Cadastro_Professores';

    /**
     * chave primaria
     *
     * @var null
     */
    protected $primaryKey = 'Codigo_Professor';

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
     * cast Codigo_Professor, por padrão id e int
     *
     * @var array
     */
    protected $casts = [
        'Codigo_Professor' => 'string'
    ];

    /**
     * @var array
     */
    protected $fillable = [
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
        'DDD_Telefone_Celular',
        'Telefone_Celular',
        'Banco',
        'Agencia',
        'Conta',
        'Poupanca',
        'Conjunta',
    ];

    public static function getCadastroProfessores($cpf)
    {
        return CadastroProfessores::where('CPF', $cpf)
            ->where('Situacao', '<>', 3)
            ->where('Situacao', '<>', 4)
            ->where('Situacao', '<>', 8)
            ->first([
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
                'DDD_Telefone_Celular',
                'Telefone_Celular',
                'Banco',
                'Agencia',
                'Conta',
                'Poupanca',
                'Conjunta',
            ]);
    }

    /**
     * relacionamento Cadastro_Professores / tb_sinpro_email
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function email()
    {
        return $this->hasOne(ProfessorEmail::class, 'pro_ema_cd_professor');
    }
}
