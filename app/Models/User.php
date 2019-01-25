<?php

namespace Website\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Conexão database SINPRO
     */
//    protected $connection = 'sqlsrv-sinpro';
//    protected $table = 'Cadastro_Professores';
//    protected $primaryKey = 'Codigo_Professor';
//    protected $rememberTokenName = null;

    /**
     * Conexão database website
     */
//    protected $table = 'tb_sinpro_noticias';
//    protected $connection = 'sqlsrv-website';

    /**
     * Conexão teste
     */
//    protected $table = 'tb_sinpro_users_website';
    protected $table = 'Cadastro_Professores';
    protected $primaryKey = 'Codigo_Professor';
    protected $rememberTokenName = null;

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
     * Retorna senha
     *
     * @return mixed|string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }



}
