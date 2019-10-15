<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Noticias;
use Website\Models\NoticiasOrdem;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notdestaque = NoticiasOrdem::orderBy('ordem_noticia')->select('id_noticia')->get();

        $noticias = Noticias::where('fl_status', 1)
                                ->whereNotIN('id', $notdestaque)
                                ->orderBy('id','desc')
                                ->paginate(12);

        return view('website.noticias.index', compact('notdestaque', 'noticias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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

        return view('website.noticias._noticia-page', compact('noticia'));
    }
}
