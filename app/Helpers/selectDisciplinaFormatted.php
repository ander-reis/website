<?php

use Website\Models\CurriculoDisciplina;

if (!function_exists('selectDisciplinaFormatted')) {
    function selectDisciplinaFormatted($type)
    {
        $collection = CurriculoDisciplina::orderBy('ds_disciplina')->get(['ds_disciplina', 'id_disciplina']);
        $type ? $model = $collection->prepend(['id_disciplina' => 0, 'ds_disciplina' => 'Selecione sua disciplina']) : $model = $collection->prepend(['id_disciplina' => 0, 'ds_disciplina' => 'Todas']);
        return $model;
    }
}
