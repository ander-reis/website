<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CepSP extends Model
{
    protected $table = 'CepSP';

    protected $fillable = [
        'Tipo',
        'Logradouro',
        'Complemento',
        'Bairro',
        'Cidade',
        'UF',
        'Cep'
    ];

    public $timestamps = false;
}
