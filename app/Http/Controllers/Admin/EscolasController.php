<?php

namespace Website\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\EscolaDeleteRequest;
use Website\Models\Escolas;

class EscolasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = \Auth::user()->id;
        $escolas = Escolas::where('user_id', $userId)->get();

        return view('admin.escolas.index', compact('escolas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.escolas.create');
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
    public function show(Escolas $escola)
    {
        //return view('admin.escolas.show', compact('escola'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Escolas $escola)
    {
        return view('admin.escolas.edit', compact('escola'));
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
    public function destroy(EscolaDeleteRequest $request, $id)
    {
        try {
            $id_escola = $request->only(array_keys($request->all()))['id_escola'];
            Escolas::destroy($id_escola);
            return redirect()->route('admin.escolas.index')->with('message', 'Escola excluído com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('admin.escolas.index')->with('error-message', 'Não foi possível excluir os dados');
        }

    }
}
