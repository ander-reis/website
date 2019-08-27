<?php

namespace Website\Http\Controllers;

use Website\Models\PaginasPrincipais;

class PaginasPrincipaisController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($url_pagina)
    {
        $pagina = PaginasPrincipais::where('url_pagina', '=', $url_pagina)->first();

        if(!$pagina){
            return view('website.error.index');
        }
        return view('website.paginas-principais.show', compact('pagina'));
    }
}
