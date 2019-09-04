<?php

namespace Website\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Noticias extends Model
{
    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_noticias';

    protected $primaryKey = 'id_noticia';

    /**
     * Relacionamento noticias para categorias, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(NoticiasCategoria::class, 'id_categoria');
    }

    /**
     * Retorna 2 notícias random
     *
     * @return mixed
     */
    public static function noticiasRand()
    {
        return Noticias::where('fl_oculta', '')->inRandomOrder()->take(2)->get();
    }

    /**
     * Retorna 1 notícia
     *
     * @param $id
     * @return mixed
     */
    public static function noticia($id)
    {
        return Noticias::findOrFail($id)->where('fl_oculta', 'N');
    }

    /**
     * Retorna 2 últimas notícias
     *
     * @return mixed
     */
    public static function ultimasNoticias()
    {
        return Noticias::where('fl_oculta', 'N')->where('fl_exibir_destaque', '0')->orderBy('id_noticia', 'desc')->take(5)->get();
    }

    /**
     * Retorna notícia em destaque
     *
     * @return mixed
     */
    public static function destaque()
    {
        return Noticias::where('fl_oculta', 'N')->where('fl_exibir_destaque', '1')->orderBy('id_noticia', 'desc')->first();
    }

    /**
     * Mutators formata limit ds_texto
     *
     * @return string
     */
    public function getDsTextoFormattedAttribute()
    {
        return Str::words(strip_tags($this->ds_texto), 5, '...');
    }

    /**
     * Mutators formata ds_resumo para 100 palavras na coluna
     *
     * @return string
     */
    public function getDsTextoHomeDestaqueColAttribute()
    {
        return Str::words(strip_tags($this->ds_texto), 100, '...');
    }

    /**
     * Mutators formata limit ds_texto para 10
     *
     * @return string
     */
    public function getDsTextoHomeDestaqueRowAttribute()
    {
        return Str::words(strip_tags($this->ds_texto), 10, '...');
    }


    /**
     * Mutators formata ds_resumo para 6 palavras
     *
     * @return string
     */
    public function getDsResumoNoticiaAttribute()
    {
        return Str::words(strip_tags($this->ds_resumo), 6, '...');
    }

    /**
     * Mutators formata data
     *
     * @return string
     * @throws \Exception
     */
    public function getDtNoticiaFormattedAttribute()
    {
        return (new \DateTime($this->dt_noticia))->format('d/m/Y H:i');

    }

    public function getDtCadastroFormattedAttribute()
    {
        return (new \DateTime($this->dt_cadastro))->format('d/m/Y H:i');

    }
}
