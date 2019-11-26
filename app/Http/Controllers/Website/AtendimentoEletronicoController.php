<?php

namespace Website\Http\Controllers\Website;

use Website\Mail\AtendimentoEletronicoEmail;
use Illuminate\Support\Facades\Mail;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\AtendimentoEletronicoRequest;
use Website\Http\Requests\AtendimentoEletronicoRatingRequest;
use Website\Models\AtendimentoEletronico;
use Website\Models\AtendimentoDptos;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtendimentoEletronicoRequest $request)
    {
        try {

            $DptoEmail = AtendimentoDptos::find($request['selDpto']);

            $insert =  AtendimentoEletronico::create([
                'ds_nome'           => strtoupper($request['txtNome']),
                'ds_email'          => strtolower($request['txtEmail']),
                'ds_texto'          => $request['txtMsg'],
                'fl_departamento'   => $request['selDpto'],
                'ds_ip'             => $request->ip()
            ]);

            Mail::to($DptoEmail->ds_email)->send(new AtendimentoEletronicoEmail($insert->id_chamado));

            toastr()->success('Mensagem enviada com sucesso!');
            return redirect()->route('atendimento-eletronico.index');
        } catch (\Exception $e) {
            toastr()->error('Não foi possível enviar a mensagem!');
            return redirect()->back();
        }
    }

     /**
     * Salva avaliação do atendimento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function rating(AtendimentoEletronicoRatingRequest $request)
    {
        try {
            $rating = AtendimentoEletronico::find($request['chamado']);
            $rating->rating_a = $request['rating1'];
            $rating->rating_b = $request['rating2'];
            $rating->rating_c = $request['rating3'];
            $rating->dt_rating = date('Y/m/d H:i:s');
            $rating->ip_rating = $request->ip();
            $rating->save();

            toastr()->success('Avaliação cadastrada com sucesso!');
            return redirect()->route('atendimento-eletronico.index');
        } catch (\Exception $e) {
            toastr()->error('Não foi possível cadastrar a avaliação!');
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
}
