<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Website\Traits\AditamentoPaths;
use Website\Traits\ConvencaoPaths;

class Convencoes extends Model
{
    use ConvencaoPaths;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_convencoes';

    /**
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_convencao';

    /**
     * Relacionamento convencoes para clausulas, muitos para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clausulas()
    {
        return $this->hasMany(ConvencoesClausulas::class, 'id_convencao')->where('fl_status', 1)->orderBy('num_clausula');
    }
}
