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
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_noticia';

    /**
     * Relacionamento noticias para categorias, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(NoticiasCategoria::class, 'id_categoria');
    }

    /**
     * Mutators formata data
     *
     * @return string
     * @throws \Exception
     */
    public function getDtNoticiaFormattedAttribute()
    {
        return (new \DateTime($this->dt_noticia))->format('d/m/Y H:i');
    }

    public function getDtCadastroFormattedAttribute()
    {
        return (new \DateTime($this->dt_cadastro))->format('d/m/Y H:i');
    }
}
