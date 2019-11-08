<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\CurriculoUpdateRequest;
use Website\Models\CurriculoProfessor;

class CurriculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // /curriculo => listar curriculo / buscar curriculos => CurriculoController
        // /curriculo/{id} => mostrar curriculo => CurriculoController
        // /curriculo/create => cadastrar curriculo => RegisterController
        // /curriculo/login => acessar area do cliente => LoginController {ds_cpf, ds_pass}
        // /curriculo/edit => form para atualizar curriculo => LoginController
        // /curriculo/update => action para update curriculo => LoginController
        // /curriculo/logout => sair area cliente => LoginController

        return view('website.curriculo.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('website.curriculo.show', compact('id'));
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

    public function editar()
    {
        $id = \Auth::user()->id_curriculo;

        $model = CurriculoProfessor::where('id_curriculo', $id)->first();

        return view('website.curriculo.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurriculoUpdateRequest $request
     * @param CurriculoProfessor $curriculo
     * @return \Illuminate\Http\Response
     */
    public function update(CurriculoUpdateRequest $request, CurriculoProfessor $curriculo)
    {
        /**
         *  se o campo senha não estiver preechido não fazer atualização
         *
         *
         *
         */


        try {
            $data = $request->only(array_keys($request->all()));

            $data['password'] = Hash::make($data['password']);

            $curriculo->update($data);

            toastr()->success('Cadastro alterado com sucesso!');

            return redirect()->route('curriculo.index');
        } catch (\Exception $e) {

            toastr()->error("Não foi possível alterar o cadastro" . $e->getMessage());

            return redirect()->route('curriculo.edit');
        }
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
