<?php

namespace Website\Http\Controllers\website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\AtendimentoEletronicoRequest;

use Website\Models\AtendimentoEletronico;


class AtendimentoEletronicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.atendimento-eletronico.index');
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
    public function store(AtendimentoEletronicoRequest $request)
    {
        try {
            $insert =  AtendimentoEletronico::create([
                'ds_nome'           => strtoupper($request['txtNome']),
                'ds_email'          => strtolower($request['txtEmail']),
                'ds_texto'          => $request['txtMsg'],
                'fl_departamento'   => $request['selDpto'],
                'ds_ip'             => $request->ip()
            ]);

            toastr()->success('Mensagem enviada com sucesso!');
            return redirect()->route('atendimento-eletronico.index');
        } catch (\Exception $e) {
            toastr()->error('Não foi possível enviar a mensagem!');
            return redirect()->back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chamado = AtendimentoEletronico::where('fl_status', '1')->findOrFail($id);
        return view('website.atendimento-eletronico.show', compact('chamado'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
