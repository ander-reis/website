<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\PrevidenciaDataCreateRequest;
use Website\Http\Requests\PrevidenciaDataUpdateRequest;
use Website\Http\Requests\PrevidenciaProfessorCreateRequest;
use Website\Models\PrevidenciaData;
use Website\Models\PrevidenciaProfessor;

class PrevidenciaCadastroController extends Controller
{

    public function createPrevidenciaProfessor()
    {
        $title = 'Cadastro';
        $buttonTitle = "Próximo&nbsp;<i class='fas fa-angle-double-right'></i>";
        return view('website.previdencia-cadastro.create-professor', compact('title', 'buttonTitle'));
    }

    public function createPrevidenciaData($id_professor)
    {
        $title = 'Cadastrar';
        $model = PrevidenciaProfessor::findOrFail($id_professor);
        return view('website.previdencia-cadastro.create-data', compact('title', 'model'));
    }

    public function getPrevidenciaProfessor(Request $request)
    {
        $data = PrevidenciaProfessor::where('ds_cpf', $request->input('ds_cpf'))->first();
        return response()->json($data);
    }

    public function getPrevidenciaData(Request $request)
    {
        $collection = PrevidenciaData::where('id_professor', $request->input('id_professor'))->get();
        $collection->map(function ($item, $key) {
            $item->fl_cargo = self::tipoCargo($item->fl_cargo);
            $item->fl_empregador = self::tipoEmpregador($item->fl_empregador);
            $item->dt_admissao = dataFormatted($item->dt_admissao);
            $item->dt_demissao = dataFormatted($item->dt_demissao);
        });
        if ($collection) {
            return response()->json($collection->all());
        }

        return response()->json([]);
    }

    public function storePrevidencia(Request $request)
    {
        try {
            PrevidenciaProfessor::where(['id' => $request->input('id_professor')])->update(['fl_analisado' => 1]);
            toastr()->success('Informações enviadas com sucesso!');
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    public function storePrevidenciaProfessor(PrevidenciaProfessorCreateRequest $request)
    {
        $data = self::normalizeDataModel($request);

        try {

            $model = PrevidenciaProfessor::where('ds_cpf', $request->input('ds_cpf'))->first();

            if (!$model) {
                $model = PrevidenciaProfessor::updateOrCreate($data);
            }

            return redirect()->route('previdencia-cadastro.create.data', ['id_professor' => $model->id]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    public function storePrevidenciaData(PrevidenciaDataCreateRequest $request)
    {
        $data = $request->all();

        try {
            $model = PrevidenciaData::create($data);
            if($model) {
                $model['fl_cargo'] = self::tipoCargo($model['fl_cargo']);
                $model['fl_empregador'] = self::tipoEmpregador($model['fl_empregador']);
                $model['dt_admissao'] = dataFormatted($model['dt_admissao']);
                $model['dt_demissao'] = dataFormatted($model['dt_demissao']);
                return response()->json($model);
            }
            return response()->json([]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    public function editPrevidenciaProfessor($id)
    {
        $model = PrevidenciaProfessor::findOrFail($id);

        $model['endereco'] = $model['ds_endereco'];
        $model['CEP'] = $model['ds_cep'];
        $model['bairro'] = $model['ds_bairro'];
        $model['cidade'] = $model['ds_cidade'];
        $model['estado'] = $model['ds_uf'];

        $title = 'Editar';
        $buttonTitle = "Alterar&nbsp;<i class='fas fa-edit'></i>";
        return view('website.previdencia-cadastro.edit-professor', compact('title', 'buttonTitle', 'model'));
    }

    public function editPrevidenciaData($id_professor, $id)
    {
        $title = 'Editar';
        $model = PrevidenciaData::findOrFail($id);
        return view('website.previdencia-cadastro.edit-data', compact('model', 'id_professor', 'title'));
    }

    public function updatePrevidenciaProfessor(PrevidenciaProfessorCreateRequest $request, $id)
    {
        $data = self::normalizeDataModel($request);
        try {
            PrevidenciaProfessor::where('id', $id)->update($data);
            toastr()->success('Informações atualizadas com sucesso!');
            return redirect()->route('previdencia-cadastro.create.data', ['id_professor' => $id]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    public function updatePrevidenciaData(PrevidenciaDataUpdateRequest $request, $id_professor, $id)
    {
        $data = $request->all();
        unset($data['_token'], $data['_method']);

        try {
            PrevidenciaData::where('id', $id)->update($data);
            toastr()->success('Informações atualizadas com sucesso!');
            return redirect()->route('previdencia-cadastro.create.data', ['id_professor' => $id_professor]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    public function destroyPrevidenciaData($id)
    {
        return PrevidenciaData::destroy($id);
    }

    static function tipoEmpregador($tipo = null)
    {
        $array = [
            0 => "Escolha um Tipo",
            1 => "Escola Privada",
            2 => "Escola Estadual",
            3 => "Escola Municipal",
            4 => "Empresa",
            5 => "Carnê",
        ];

        if ($tipo) {
            foreach ($array as $key => $value) {
                if ($tipo == $key) {
                    return $value;
                }
            }
        }

        return $array;
    }

    static function tipoCargo($tipo = null)
    {
        $array = [
            0 => "Escolha um Cargo",
            1 => "Professor Superior",
            2 => "Professor Básico",
            3 => "Outra Profissão"
        ];

        if ($tipo) {
            foreach ($array as $key => $value) {
                if ($tipo == $key) {
                    return $value;
                }
            }
        }

        return $array;
    }

    private function normalizeDataModel($request)
    {
        $data = $request->all();
        $data['ds_cep'] = $data['CEP'];
        $data['ds_endereco'] = $data['endereco'];
        $data['ds_bairro'] = $data['bairro'];
        $data['ds_cidade'] = $data['cidade'];
        $data['ds_uf'] = $data['estado'];
        unset($data['CEP'], $data['endereco'], $data['bairro'], $data['cidade'], $data['estado'], $data['_token'], $data['_method']);
        return $data;
    }
}
