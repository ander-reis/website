<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\PrevidenciaDataCreateRequest;
use Website\Http\Requests\PrevidenciaDataUpdateRequest;
use Website\Http\Requests\PrevidenciaProfessorCreateRequest;
use Website\Models\PrevidenciaData;
use Website\Models\PrevidenciaProfessor;

class PrevidenciaController extends Controller
{
    /**
     * form professor
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPrevidenciaProfessor()
    {
        $title = 'Cadastro';
        $buttonTitle = "Próximo&nbsp;<i class='fas fa-angle-double-right'></i>";
        return view('website.previdencia.create-professor', compact('title', 'buttonTitle'));
    }

    /**
     * form dados profissionais
     *
     * @param $id_professor
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createPrevidenciaData($id_professor)
    {
        $title = 'Cadastrar';
        $model = PrevidenciaProfessor::findOrFail($id_professor);
        return view('website.previdencia.create-data', compact('title', 'model'));
    }

    /**
     * returna previdencia professor
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPrevidenciaProfessor(Request $request)
    {
        $data = PrevidenciaProfessor::where('ds_cpf', $request->input('ds_cpf'))->first();
        if(!is_null($data)) {
            $data->dt_nascimento = dataFormatted($data->dt_nascimento);
        }
        return response()->json($data);
    }

    /**
     * retorna previdencia data
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPrevidenciaData(Request $request)
    {
        $collection = PrevidenciaData::where('id_professor', $request->input('id_professor'))->orderBy('dt_admissao', 'ASC')->get();
        $collection->map(function ($item, $key) {
            $item->fl_cargo = self::tipoCargo($item->fl_cargo);
            $item->fl_empregador = self::tipoEmpregador($item->fl_empregador);
            $item->dt_admissao = dataFormatted($item->dt_admissao);
            $item->dt_demissao = self::formatDtDemissao($item->dt_demissao);
        });
        if ($collection) {
            return response()->json($collection->all());
        }

        return response()->json([]);
    }

    /**
     * cadastro previdencia data
     *
     * @param PrevidenciaProfessorCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Yoeunes\Toastr\Toastr
     */
    public function storePrevidenciaProfessor(PrevidenciaProfessorCreateRequest $request)
    {
        $data = self::normalizeDataModel($request);

        try {
            $model = PrevidenciaProfessor::where('ds_cpf', $request->input('ds_cpf'))->first();
            if (!$model) {
                $model = PrevidenciaProfessor::updateOrCreate($data);
            }
            return redirect()->route('previdencia.create.data', ['id_professor' => $model->id]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    /**
     * cadastra previdencia data
     *
     * @param PrevidenciaDataCreateRequest $request
     * @return \Illuminate\Http\JsonResponse|\Yoeunes\Toastr\Toastr
     */
    public function storePrevidenciaData(PrevidenciaDataCreateRequest $request)
    {
        $data = $request->all();
        $data['dt_admissao'] = self::normalizeDateInput($data['dt_admissao']);
        $data['dt_demissao'] = self::normalizeDateInput($data['dt_demissao']);
        try {
            $model = PrevidenciaData::create($data);

            if($model) {
                $model->fl_cargo = self::tipoCargo($model->fl_cargo);
                $model->fl_empregador = self::tipoEmpregador($model->fl_empregador);
                $model->dt_admissao = dataFormatted($model->dt_admissao);
                $model->dt_demissao = self::formatDtDemissao($model->dt_demissao);
                return response()->json($model);
            }
            return response()->json([]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    /**
     * form previdencia professor
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPrevidenciaProfessor($id)
    {
        $model = PrevidenciaProfessor::findOrFail($id);

        $model->endereco = $model->ds_endereco;
        $model->CEP = $model->ds_cep;
        $model->bairro = $model->ds_bairro;
        $model->cidade = $model->ds_cidade;
        $model->estado = $model->ds_uf;
        $model->dt_nascimento = dataFormatted($model->dt_nascimento);

        $title = 'Editar';
        $buttonTitle = "Alterar&nbsp;<i class='fas fa-edit'></i>";
        return view('website.previdencia.edit-professor', compact('title', 'buttonTitle', 'model'));
    }

    /**
     * form previdencia data
     *
     * @param $id_professor
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editPrevidenciaData($id_professor, $id)
    {
        $title = 'Editar';
        $model = PrevidenciaData::findOrFail($id);
        $model->dt_admissao = dataFormatted($model->dt_admissao);
        $model->dt_demissao = self::formatDtDemissao($model->dt_demissao);

        return view('website.previdencia.edit-data', compact('model', 'id_professor', 'title'));
    }

    /**
     * altera fl_analisado para 1
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Yoeunes\Toastr\Toastr
     */
    public function updatePrevidencia(Request $request)
    {
        try {
            PrevidenciaProfessor::where(['id' => $request->input('id_professor')])->update(['fl_analisado' => 1]);
            toastr()->success('Informações enviadas com sucesso!');
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    /**
     * update previdencia professor
     *
     * @param PrevidenciaProfessorCreateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Yoeunes\Toastr\Toastr
     */
    public function updatePrevidenciaProfessor(PrevidenciaProfessorCreateRequest $request, $id)
    {
        $data = self::normalizeDataModel($request);
        try {
            PrevidenciaProfessor::where('id', $id)->update($data);
            toastr()->success('Informações atualizadas com sucesso!');
            return redirect()->route('previdencia.create.data', ['id_professor' => $id]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    /**
     * update previdencia data
     *
     * @param PrevidenciaDataUpdateRequest $request
     * @param $id_professor
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Yoeunes\Toastr\Toastr
     */
    public function updatePrevidenciaData(PrevidenciaDataUpdateRequest $request, $id_professor, $id)
    {
        $data = $request->all();
        unset($data['_token'], $data['_method']);
        $data['dt_admissao'] = dateFormattedDatabase($data['dt_admissao']);
        $data['dt_demissao'] = dateFormattedDatabase($data['dt_demissao']);
        try {
            PrevidenciaData::where('id', $id)->update($data);
            toastr()->success('Informações atualizadas com sucesso!');
            return redirect()->route('previdencia.create.data', ['id_professor' => $id_professor]);
        } catch (\Exception $exception) {
            return toastr()->error('Erro: Informações não foram enviadas!');
        }
    }

    /**
     * delete previdencia data
     *
     * @param $id
     * @return int
     */
    public function destroyPrevidenciaData($id)
    {
        return PrevidenciaData::destroy($id);
    }

    /**
     * format select fl_empregador
     *
     * @param null $tipo
     * @return array|mixed
     */
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

    /**
     * format select fl_cargo
     *
     * @param null $tipo
     * @return array|mixed
     */
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

    /**
     * format data store
     *
     * @param $request
     * @return mixed
     */
    private function normalizeDataModel($request)
    {
        $data = $request->all();
        $data['ds_cep'] = $data['CEP'];
        $data['ds_endereco'] = $data['endereco'];
        $data['ds_bairro'] = $data['bairro'];
        $data['ds_cidade'] = $data['cidade'];
        $data['ds_uf'] = $data['estado'];
        $data['dt_nascimento'] = self::normalizeDateInput($data['dt_nascimento']);
        unset($data['CEP'], $data['endereco'], $data['bairro'], $data['cidade'], $data['estado'], $data['_token'], $data['_method']);
        return $data;
    }

    /**
     * format date input from database
     *
     * @param $date
     * @return string
     */
    private function normalizeDateInput($date)
    {
        return dateFormattedDatabase($date);
    }

    /**
     * format dt_demissao
     *
     * @param $date
     * @return string
     */
    private function formatDtDemissao($date)
    {
        if($date == '1900-01-01') {
            return '';
        }
        return dataFormatted($date);
    }
}
