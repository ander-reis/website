<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Models\NovaSindicalizacao;

class NovaSindicalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.nova-sindicalizacao.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Website\NovaSindicalizacao  $novaSindicalizacao
     * @return \Illuminate\Http\Response
     */
    public function show(NovaSindicalizacao $novaSindicalizacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Website\NovaSindicalizacao  $novaSindicalizacao
     * @return \Illuminate\Http\Response
     */
    public function edit(NovaSindicalizacao $novaSindicalizacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Website\NovaSindicalizacao  $novaSindicalizacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NovaSindicalizacao $novaSindicalizacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Website\NovaSindicalizacao  $novaSindicalizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(NovaSindicalizacao $novaSindicalizacao)
    {
        //
    }
}
