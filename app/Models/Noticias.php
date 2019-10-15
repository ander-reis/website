<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_noticias';

    /**
     * Relacionamento noticias para categorias, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(NoticiasCategoria::class, 'id_categoria');
    }
}
