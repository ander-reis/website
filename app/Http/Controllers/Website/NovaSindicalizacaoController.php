<?php

namespace Website\Http\Controllers\Website;

use Website\Http\Controllers\Controller;
use Website\Models\NovaSindicalizacao;

use Illuminate\Http\Request;
use Website\Http\Requests\NovaSindicalizacaoRequest;

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
    public function store(NovaSindicalizacaoRequest $request)
    {
        try {
            dd('ok');
        } catch (\Exception $e) {
            //dd($e);
            toastr()->error('Não foi possível cadastrar o e-mail');
            // dd($e->getMessage());
            return redirect()->back();
        }
    }
}