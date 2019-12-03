<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\ProcessosIndexRequest;
use Website\Models\FichaProfessor;
use Website\Models\Processos;

class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('website.processos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function list(ProcessosIndexRequest $request)
    {
        $data = $request->all();

        $model = FichaProfessor::fichaProfessor($data['cpf'], $data['nascimento']);

        $opcao = $this->opcaoAcesso($data['opcao']);

        if (count($model) === 0) {
            return $this->errorMessage();
        }

        $pastas = $model->map(function($item){
            return $item->jur_fic_nr_pasta;
        });

        $processos = Processos::whereIn('nr_pasta', $pastas)->paginate(10, ['id_processo', 'ds_processo']);

        return view('website.processos.list', compact('processos', 'model', 'opcao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('website.processos.edit', compact('id'));
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

    private function errorMessage()
    {
        return back()->withInput()->withErrors('O seu nome não consta em nenhum processo.
            Em caso de dúvida, solicitamos que entre em contato com o nosso departamento juríco de segunda a sexta,
            das 8h30 às 18h, através do telefone: (11)5080-5989.');
    }

    private function opcaoAcesso($opcao)
    {
        return $opcao ? 'Beneficiário' : 'Inventariante';
    }
}
