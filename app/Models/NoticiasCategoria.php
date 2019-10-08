<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class NoticiasCategoria extends Model
{
    /**
     * table
     *
     * @var $table string
     */
    protected $table = 'tb_sinpro_noticias_categorias';

    /**
     * set chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_categoria';
}
