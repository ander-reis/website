<?php

namespace Website\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\DadosPessoaisUpdateRequest;
use Website\Models\User;

class DadosPessoaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(\Auth::user()->id);

        return view('admin.dados-pessoais.index', compact('user'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DadosPessoaisUpdateRequest $request, User $dados_pessoai)
    {
        try {
            $data = $request->only(array_keys($request->all()));
            $dados_pessoai->update($data);
            return redirect()->route('admin.dados-pessoais.index')->with('message', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('admin.dados-pessoais.index')->with('error-message', 'Não foi possível atualizar os dados');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
