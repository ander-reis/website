<?php

use Website\Models\CurriculoFormacao;

if (!function_exists('selectFormacaoFormatted')) {
    function selectFormacaoFormatted($type)
    {
        $collection = CurriculoFormacao::orderBy('ds_formacao')->get(['ds_formacao', 'id_formacao']);
        $type ? $model = $collection->prepend(['id_formacao' => 0, 'ds_formacao' => 'Selecione sua formação']) : $model = $collection->prepend(['id_formacao' => 0, 'ds_formacao' => 'Todos']);
        return $model;
    }
}
