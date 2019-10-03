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

    protected $connection = 'sqlsrv-website';

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

    /**
     * Relacionamento convencao para clausula, um para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function convencao()
    {
        return $this->belongsTo(Convencoes::class, 'id_convencao');
    }
}
