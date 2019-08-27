<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Convencoes;
use Website\Models\ConvencoesClausulas;
use Website\Models\ConvencoesEntidade;

class ClausulasController extends Controller
{
    /**
     * Retorna página da clausula
     *
     * @param ConvencoesEntidade $convencoes_entidade
     * @param Convencoes $convencao
     * @param ConvencoesClausulas $convencao_clausula
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(ConvencoesEntidade $convencoes_entidade, Convencoes $convencao, ConvencoesClausulas $convencao_clausula)
    {
        $convencao_clausula->where('fl_status', 1)->orderBy('num_clausula');

        $clausulas = $convencao->clausulas()->where('fl_status', 1)->orderBy('num_clausula')->get();

        /**
         * previos e next pagina clausula
         */
        $previous = $clausulas->where('num_clausula', '<', $convencao_clausula->num_clausula)->last();
        $next = $clausulas->where('num_clausula', '>', $convencao_clausula->num_clausula)->first();

        return view('website.clausulas.show', compact('convencoes_entidade', 'convencao', 'convencao_clausula', 'clausulas', 'previous', 'next'));
    }
}
