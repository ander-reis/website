<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class NoticiasCategoria extends Model
{
    /**
     * Table
     *
     * @var $table string
     */
    protected $table = 'tb_sinpro_noticias_categorias';

    protected $primaryKey = 'id_categoria';
}
