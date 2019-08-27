<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\Noticias;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::where('fl_oculta', 'N')->orderBy('id_noticia', 'desc')->paginate(12);

        return view('website.noticias.index', compact('noticias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticias::where('fl_oculta', 'N')->findOrFail($id);
        $ultimasNoticias = Noticias::ultimasNoticias();

        return view('website.noticias._noticia-page', compact('noticia', 'ultimasNoticias'));
    }
}
