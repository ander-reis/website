<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Convencoes;
use Website\Models\ConvencoesEntidade;
use Illuminate\Support\Facades\Artisan;

class ConvencoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ConvencoesEntidade $convencoes_entidade)
    {
        /**
         * configura nome da entidade para breadcrumbs
         */
        $convencao_entidade = $convencoes_entidade;

        /**
         * lista convencoes através do relacionamento
         */
        $convencoes = $convencoes_entidade->convencoes()
            ->paginate(15);

        return view('website.convencoes.index', compact('convencoes', 'convencao_entidade'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ConvencoesEntidade $convencoes_entidade, Convencoes $convencao)
    {
        /**
         * configura nome da entidade para breadcrumbs
         */
        $convencao_entidade = $convencoes_entidade;

        $clausulas = $convencao->clausulas()->get();

        return view('website.convencoes.show', compact('convencao', 'clausulas', 'convencao_entidade'));
    }

    public function lista()
    {
        $convencao = array();
        $entidades = ConvencoesEntidade::orderBy('fl_ordem')->with('convencoes')->get(['id', 'ds_entidade']);

        return view('website.convencoes.lista', compact('entidades', 'convencao'));
    }


    /**
     * Método responsavel download pdf
     *
     * @param $id
     * @return mixed
     */
    public function convencaoWebAsset(Convencoes $convencao)
    {
        Artisan::call('cache:clear');
        return response()->file($convencao->convencao_path);
    }

    /**
     * Metodo responsavel download pdf
     *
     * @param $id
     * @return mixed
     */
    public function aditamentoWebAsset(Convencoes $convencao)
    {
        Artisan::call('cache:clear');
        return response()->file($convencao->aditamento_path);
    }
}
