<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Website\Traits\AditamentoPaths;
use Website\Traits\ConvencaoPaths;

class Convencoes extends Model
{
    use ConvencaoPaths, AditamentoPaths;

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_convencoes';

    /**
     * Relacionamento convencoes para clausulas, muitos para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clausulas()
    {
        return $this->hasMany(ConvencoesClausulas::class, 'id_convencao');
    }

}
