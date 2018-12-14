<?php

namespace Website\Http\Controllers;

use Website\Models\Convencoes;
use Website\Models\ConvencoesEntidade;

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
            ->where('fl_ativo', 1)
            ->orderBy('dt_validade', 'desc')
            ->paginate();

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

        $clausulas = $convencao->clausulas()->where('fl_ativo', 1)->orderBy('num_clausula')->get();

        return view('website.convencoes.show', compact('convencao', 'clausulas', 'convencao_entidade'));
    }

    /**
     * Método responsavel download pdf
     *
     * @param $id
     * @return mixed
     */
    public function convencaoWebAsset(Convencoes $convencao)
    {
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
        return response()->file($convencao->aditamento_path);
    }
}
