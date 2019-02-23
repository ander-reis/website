<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ConvencoesClausulas extends Model
{
    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_convencoes_clausulas';

    protected $primaryKey = 'id_clausula';

    /**
     * Accessor formata ds_titulo para 6 palavras
     *
     * @return string
     */
    public function getDsTituloClausulaFormattedAttribute()
    {
        return Str::words(strip_tags($this->ds_titulo), 3, '...');
    }
}
