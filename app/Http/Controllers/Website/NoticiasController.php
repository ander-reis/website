<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use Website\Http\Controllers\Controller;
use Website\Models\Noticias;
use Website\Models\NoticiasOrdem;

use Barryvdh\Debugbar\Facade as Debugbar;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ano = intval(Input::get('ano'));

        if ($ano === 0 ) {
            $ano = date_format(now(), 'Y');
        }

        $notdestaque = NoticiasOrdem::orderBy('ordem_noticia')->select('id_noticia')->get();

        $anos = Noticias::select(DB::raw('YEAR(dt_noticia) AS ano'))
                ->distinct()
                ->orderBy('ano', 'DESC')
                ->get();

        $noticias = Noticias::where('fl_status', 1)
            ->whereYear('dt_noticia', '=', $ano)
            ->whereNotIN('id', $notdestaque)
            ->orderBy('id', 'desc')
            ->get(['id', 'dt_noticia', 'ds_resumo']);
            //->paginate(12);

        return view('website.noticias.index', compact('notdestaque', 'noticias', 'anos'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticias::where('fl_status', 1)->findOrFail($id);

        return view('website.noticias._noticia-page', compact('noticia'));
    }

    public function oculta($id)
    {
        $noticia = Noticias::where('fl_status', 0)->findOrFail($id);

        return view('website.noticias._noticia-oculta-page', compact('noticia'));
    }
}
