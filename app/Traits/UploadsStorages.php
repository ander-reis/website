<?php

namespace Website\Traits;


use Illuminate\Filesystem\FilesystemAdapter;

trait UploadsStorages
{
    /**
     * Para saber qual é o local de armazenamento
     *
     * @return \Illuminate\Filesystem\FilesystemAdapter
     */
    public function getStorage()
    {
        /**
         * retorna instancia do storage
         */
        return \Storage::disk($this->getDiskDriver());
    }

    /**
     * Para saber o driver de armazenamento
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    protected function getDiskDriver()
    {
        return config('filesystems.default');
    }

    /**
     * Pega o caminho absoluto da imagem
     *
     * @param FilesystemAdapter $storage
     * @param $fileRelativePath
     * @return mixed
     */
    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath)
    {
        return $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath);
    }
}