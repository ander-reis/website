<?php

namespace Website\Traits;


trait SliderPaths
{

    /**
     * Retorna slider
     *
     * @return mixed
     */
    public function getSliderFolderStorageAttribute()
    {
        return "slider/{$this->id}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getSliderRelativeAttribute()
    {
        return "{$this->slider_folder_storage}/{$this->ds_imagem}";
    }
}