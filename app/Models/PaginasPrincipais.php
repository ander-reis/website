<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class PaginasPrincipais extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table =  'tb_sinpro_conteudo_paginas_principais';

    /**
     * Mutators formata status da página
     *
     * @return string
     */
    public function getFlStatusFormattedAttribute()
    {
        return $this->fl_status ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }
}
