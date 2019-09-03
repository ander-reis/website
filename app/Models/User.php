<?php

namespace Website\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Yadahan\AuthenticationLog\AuthenticationLogable;

class User extends Authenticatable
{
    use Notifiable, LogsActivity, AuthenticationLogable;

    /**
     * Conexão database SINPRO
     */
    protected $connection = 'sqlsrv-sinpro';

    /**
     * Conexão database POSTGRE
     */
//    protected $connection = 'pgsql';

    protected $table = 'Cadastro_Professores';
    protected $primaryKey = 'Codigo_Professor';
    protected $rememberTokenName = null;
    protected $casts = ['Codigo_Professor' => 'string'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codigo_Professor',
        'Nome',
        'CPF',
        'Email',
        'Data_Aniversario',
        'Materia',
        'Pre',
        '1_4Serie',
        '5_8Serie',
        'Ens_Medio',
        'Ens_Superior',
        '2_3Grau',
        'Tecnico',
        'Supletivo',
        'Curso_Livre',
        'CEP',
        'Sexo',
        'Endereco',
        'Numero',
        'Complemento',
        'Bairro',
        'Cidade',
        'Estado',
        'DDD_Telefone_Residencial',
        'Telefone_Residencial',
        'DDD_Telefone_Comercial',
        'Telefone_Comercial',
        'DDD_Telefone_Celular',
        'Telefone_Celular',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * reconfigura timestamp
     */
    const CREATED_AT = 'Data_Inicio';
    const UPDATED_AT = 'Data_Modificacao';

    /**
     * Retorna senha
     *
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * configura logging
     */
    protected static $logAttributes = [
        'Codigo_Professor',
        'Nome',
        'CPF',
        'Email',
        'Data_Aniversario',
        'Materia',
        'Pre',
        '1_4Serie',
        '5_8Serie',
        'Ens_Medio',
        'Ens_Superior',
        '2_3Grau',
        'Tecnico',
        'Supletivo',
        'Curso_Livre',
        'CEP',
        'Sexo',
        'Endereco',
        'Numero',
        'Complemento',
        'Bairro',
        'Cidade',
        'Estado',
        'DDD_Telefone_Residencial',
        'Telefone_Residencial',
        'DDD_Telefone_Comercial',
        'Telefone_Comercial',
        'DDD_Telefone_Celular',
        'Telefone_Celular',
    ];

    protected static $logFillable = true;

    protected static $logName = 'user_website';

}
