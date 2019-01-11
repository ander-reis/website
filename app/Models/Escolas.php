<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Escolas extends Model
{
    protected $table = 'tb_sinpro_escolas';

    protected $fillable = ['escolas', 'endereco', 'telefone'];
}
