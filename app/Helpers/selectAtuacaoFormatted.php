<?php

use Website\Models\CurriculoAtuacao;

if (!function_exists('selectAtuacaoFormatted')) {
    function selectAtuacaoFormatted($type)
    {
        $collection = CurriculoAtuacao::orderBy('ds_nivel_atuacao')->get(['ds_nivel_atuacao', 'id_nivel_atuacao']);
        $type ? $model = $collection->prepend(['id_nivel_atuacao' => 0, 'ds_nivel_atuacao' => 'Selecione sua atuação']) : $model = $collection->prepend(['id_nivel_atuacao' => 0, 'ds_nivel_atuacao' => 'Todos']);
        return $model;
    }
}
