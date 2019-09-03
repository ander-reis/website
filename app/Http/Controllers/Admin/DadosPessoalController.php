<?php

namespace Website\Http\Controllers\Admin;

use Website\Http\Controllers\Controller;
use Website\Http\Requests\CepRequest;
use Website\Http\Requests\DadosPessoaisUpdateRequest;
use Website\Models\CepSP;
use Website\Models\Materia;
use Website\Models\User;

class DadosPessoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * consultar por, e qual usuário
         */
        $user = User::where('CPF', \Auth::user()->CPF)->first();

        /**
         * consulta materia
         */
        $materias = Materia::all();

        $materia = $materias->mapWithKeys(function ($item) {
                return [$item->Codigo_Materia => $item->Materia];
            });
        return view('admin.dados-pessoal.index', compact('user', 'materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(DadosPessoaisUpdateRequest $request, User $dados_pessoal)
    {
        try {
            $data = $request->only(array_keys($request->all()));

            (!isset($data['Pre'])) ? $data['Pre'] = '0' : null;
            (!isset($data['primeira_quarta_serie'])) ? $data['1_4Serie'] = '0' : $data['1_4Serie'] = '1';
            (!isset($data['quinta_oitava_serie'])) ? $data['5_8Serie'] = '0' : $data['5_8Serie'] = '1';
            (!isset($data['Ens_Medio'])) ? $data['Ens_Medio'] = '0' : null;
            (!isset($data['Ens_Superior'])) ? $data['Ens_Superior'] = '0' : null;
            (!isset($data['Tecnico'])) ? $data['Tecnico'] = '0' : null;
            (!isset($data['Curso_Livre'])) ? $data['Curso_Livre'] = '0' : null;
            (!isset($data['Supletivo'])) ? $data['Supletivo'] = '0' : null;
            unset($data['primeira_quarta_serie']);
            unset($data['quinta_oitava_serie']);

            $dados_pessoal->update($data);

            return redirect()->route('admin.dados-pessoal.index')->with('message', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('admin.dados-pessoal.index')->with('error-message', 'Não foi possível atualizar os dados' . $e->getMessage());
        }
    }

    /**
     * Busca endereço pelo CEP
     *
     * @param CepRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscarCep(CepRequest $request)
    {
        $cep = $request->only(array_keys($request->all()));
        $data = CepSP::where('Cep', '=', $cep['cep'])->get();

        return response()->json($data[0]);
    }
}
