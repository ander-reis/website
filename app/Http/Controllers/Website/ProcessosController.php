<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\ProcessosIndexRequest;
use Website\Models\FichaProfessor;
use Website\Models\Processos;

class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.processos.index');
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(ProcessosIndexRequest $request)
    {
        $data = $request->all();

        $model = FichaProfessor::where('CPF', $data['cpf'])
            ->where(function ($q) use ($data) {
                $q->where('Data_Aniversario', $data['nascimento'])
                    ->orWhere('Data_Aniversario', '1900-01-01');
            })
            ->join('Cadastro_Professores', 'jur_fip_cd_professor', '=', 'Codigo_Professor')
            ->join('tb_jur_ficha_consulta', 'jur_fic_nr_ficha', '=', 'jur_fip_nr_ficha')
            ->select(['jur_fic_nr_pasta', 'CPF', 'Data_Aniversario'])
            ->get();

        if (count($model) === 0) {
            return back()->withInput()->withErrors("O seu nome não consta em nenhum processo.
            Em caso de dúvida, solicitamos que entre em contato com o nosso departamento juríco de segunda a sexta,
            das 8h30 às 18h, através do telefone: (11)5080-5989.");
        }

//        SELECT id_processo, ds_processo FROM tb_sinpro_processos
//        WHERE nr_pasta IN ('020/2013', '226/2017')

        $pastas = $model->map(function($item, $value){
            return $item->jur_fic_nr_pasta;
        });

        $processos = Processos::whereIn('nr_pasta', $pastas)->get(['id_processo', 'ds_processo']);

        return view('website.processos.show', compact('processos', 'model'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
