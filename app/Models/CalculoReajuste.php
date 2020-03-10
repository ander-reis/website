<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;

class CalculoReajuste extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_calculo_reajuste';

    /**
     * @var array
     */
    protected $fillable = [
        'ds_cnpj',
        'ds_fantasia',
        'ds_ano',
        'vl_fev',
        'vl_mar',
        'vl_abr',
        'vl_mai',
        'vl_jun',
        'vl_jul',
        'vl_ago',
        'vl_set',
        'vl_out',
        'vl_nov',
        'vl_dez',
        'vl_jan',
        'vl_fev1',
        'fl_diferenca',
        'fl_nivel',
    ];
}
