<?php

namespace Website\Http\Controllers;

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
        $noticias = Noticias::where('fl_oculta', 1)->paginate(12);

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
        $noticia = Noticias::where('fl_oculta', 1)->findOrFail($id);
        $ultimasNoticias = Noticias::ultimasNoticias();

        return view('website.noticias.index', compact('noticia', 'ultimasNoticias'));
    }
}
