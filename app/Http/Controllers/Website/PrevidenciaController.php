<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\PrevidenciaCreateRequest;
use Website\Http\Requests\PrevidenciaDataCreateRequest;
use Website\Http\Requests\PrevidenciaProfessorCreateRequest;
use Website\Models\PrevidenciaData;
use Website\Models\PrevidenciaProfessor;

class PrevidenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.previdencia.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = PrevidenciaProfessor::where(['id' => $request->input('id_professor')])->update(['fl_analisado' => 1]);
        if($result) {
            toastr()->success('Informações enviadas com sucesso!');
            return redirect()->route('home');
        } else {
            toastr()->error('Erro: Informações não foram enviadas!');
            return view('website.previdencia.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return PrevidenciaData::destroy($id);
    }

    public function getCpf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ds_cpf' => 'required|string|max:14',
        ]);

        if ($validator->validate()) {
            $model = PrevidenciaProfessor::where('ds_cpf', $request->input('ds_cpf'))->first();
            if (!$model) {
                return response()->json(null, 200);
            }
            return $model;
        }
    }

    public function getPrevidenciaData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_professor' => 'required',
        ]);

        if ($validator->validate()) {
            $collection = PrevidenciaData::where('id_professor', $request->input('id_professor'))->get();
            $collection->map(function ($item, $key) {
                $item->fl_cargo = self::tipoCargo($item->fl_cargo);
                $item->fl_empregador = self::tipoEmpregador($item->fl_empregador);
                $item->dt_admissao = dataFormatted($item->dt_admissao);
                $item->dt_demissao = dataFormatted($item->dt_demissao);
            });
            return $collection->all();
        }
        return response()->json([]);
    }

    public function insertProfessorTable(PrevidenciaProfessorCreateRequest $request)
    {
        $data = self::normalizeDataModel($request);
        $cpf = PrevidenciaProfessor::where('ds_cpf', $data['ds_cpf'])->first();
        if(!$cpf) {
            return PrevidenciaProfessor::updateOrCreate($data);
        } else {
            return PrevidenciaProfessor::where(['ds_cpf' => $request->input('ds_cpf')])->update($data);
        }
    }

    public function insertDataTable(PrevidenciaDataCreateRequest $request)
    {
        $model = PrevidenciaData::create($request->all());

        $model['fl_cargo'] = self::tipoCargo($model['fl_cargo']);
        $model['fl_empregador'] = self::tipoEmpregador($model['fl_empregador']);
        $model['dt_admissao'] = dataFormatted($model['dt_admissao']);
        $model['dt_demissao'] = dataFormatted($model['dt_demissao']);

        return $model;
    }

    public function updateProfessorData(Request $request)
    {
        $id = $request->input('id');
        $index = $request->input('index');
        unset($request['id'], $request['index']);
        $result = PrevidenciaData::where(['id' => $id])->update($request->all());

        if($result) {
            $request['fl_cargo'] = self::tipoCargo($request['fl_cargo']);
            $request['fl_empregador'] = self::tipoEmpregador($request['fl_empregador']);
            $request['dt_admissao'] = dataFormatted($request['dt_admissao']);
            $request['dt_demissao'] = dataFormatted($request['dt_demissao']);
            $request['index'] = $index;
            return $request->all();
        }
        return response()->json([]);
    }

    static function tipoEmpregador($tipo = null)
    {
        $array =  [
            0 => "Escolha um Tipo",
            1 => "Escola Privada",
            2 => "Escola Estadual",
            3 => "Escola Municipal",
            4 => "Empresa",
            5 => "Carnê",
        ];

        if($tipo) {
            foreach ($array as $key => $value) {
                if($tipo == $key){
                    return $value;
                }
            }
        }

        return $array;
    }

    static function tipoCargo($tipo = null)
    {
        $array =  [
            0 => "Escolha um Cargo",
            1 => "Professor Superior",
            2 => "Professor Básico",
            3 => "Outra Profissão"
        ];

        if($tipo) {
            foreach ($array as $key => $value) {
                if($tipo == $key){
                    return $value;
                }
            }
        }

        return $array;
    }

    private function normalizeDataModel(PrevidenciaProfessorCreateRequest $request)
    {
        $data = $request->all();
        $data['ds_cep'] = $data['CEP'];
        $data['ds_endereco'] = $data['endereco'];
        $data['ds_bairro'] = $data['bairro'];
        $data['ds_cidade'] = $data['cidade'];
        $data['ds_uf'] = $data['estado'];
        unset($data['CEP'], $data['endereco'], $data['bairro'], $data['cidade'], $data['estado'], $data['_token']);
        return $data;
    }
}
