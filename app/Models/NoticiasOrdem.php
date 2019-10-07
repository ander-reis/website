<?php

namespace Website\Models;
use Website\Models\Noticias;

use Illuminate\Database\Eloquent\Model;

class NoticiasOrdem extends Model
{

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_admin_ordem_noticia';

    /**
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_noticia';

    /**
     * Relacionamento noticias para ordem, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function noticia()
    {
        return $this->belongsTo(Noticias::class, 'id_noticia');
    }
}

