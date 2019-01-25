<?php

namespace Website\Http\Controllers\Admin;

use Illuminate\Http\Request;
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
         * consulta user
         */
        $user = \DB::table('Cadastro_Professores')
            ->select([
                'Codigo_Professor',
                'Nome',
                'CPF',
                'RG',
                'Email',
                'Materia',
                'Pre',
                '1_4Serie as primeira_quarta_serie',
                '5_8Serie as quinta_oitava_serie',
                'Ens_Medio',
                'Ens_Superior',
                '2_3Grau as segundo_terceiro_grau',
                'Tecnico',
                'Supletivo',
                'Curso_Livre',
                'Data_Aniversario',
                'Sexo',
                'CEP',
                'Endereco',
                'Numero',
                'Complemento',
                'Bairro',
                'Cidade',
                'Estado',
                'DDD_Telefone_Residencial',
                'Telefone_Residencial',
                'DDD_Telefone_Comercial',
                'Telefone_Comercial',
                'DDD_Telefone_Celular',
                'Telefone_Celular',
            ])
            ->where('Codigo_Professor', '=', \Auth::user()->Codigo_Professor)
            ->get();

        $user = $user[0];

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
            dd($data);

            $dados_pessoal->update($data);
            return redirect()->route('admin.dados-pessoal.index')->with('message', 'Dados atualizados com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('admin.dados-pessoal.index')->with('error-message', 'Não foi possível atualizar os dados');
        }
    }

    public function buscarCep(CepRequest $request)
    {
        $cep = $request->only(array_keys($request->all()));
        $data = CepSP::where('Cep', '=', $cep['cep'])->get();

        return response()->json($data[0]);
    }
}
