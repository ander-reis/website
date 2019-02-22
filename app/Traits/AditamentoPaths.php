<?php

namespace Website\Traits;


trait AditamentoPaths
{
    /**
     * Trait UploadStorages incluso em ConvencaoPath
     */

    /**
     * Retorna convencao
     *
     * @return mixed
     */
    public function getAditamentoFolderStorageAttribute()
    {
        return "aditamento/{$this->id_convencao}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getAditamentoRelativeAttribute()
    {
        return "{$this->aditamento_folder_storage}/{$this->url_aditamento}";
    }

    /**
     * Retorna o caminho absoluto
     *
     * @return mixed
     */
    public function getAditamentoPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->aditamento_relative);
    }

    /**
     * Download do pdf para disponibilizar no sistema
     *
     * @return string
     */
    public function getAditamentoAssetAttribute()
    {
        return route('admin.aditamento.asset', ['id' => $this->id_convencao]);
    }

    /**
     * Download do pdf para disponibilizar no site
     *
     * @return string
     */
    public function getAditamentoWebAssetAttribute()
    {
        return route('aditamento.asset', ['id' => $this->id_convencao]);
    }
}
