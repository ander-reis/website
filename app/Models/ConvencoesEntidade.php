<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class ConvencoesEntidade extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_convencoes_entidades';

    /**
     * Relacionamento entidade para convencoes, um para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function convencoes()
    {
        return $this->hasMany(Convencoes::class, 'fl_entidade')->where('fl_status', 1)->orderBy('dt_validade', 'desc');
    }
}
