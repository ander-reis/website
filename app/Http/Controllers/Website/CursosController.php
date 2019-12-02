<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Models\CadastroCursos;
use Website\Models\DataCursos;
use Website\Models\EscolaMeses;
use Carbon\Carbon;
use Website\Models\PaginasPrincipais;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $model_cursos = PaginasPrincipais::where(['id_pagina' => 14, 'fl_status' => 1])->first(['ds_texto', 'txt_titulo']);
        $model_congresso = PaginasPrincipais::where(['id_pagina' => 15, 'fl_status' => 1])->first(['ds_texto', 'txt_titulo']);
        return view('website.curso.index', compact('model_cursos', 'model_congresso'));
    }

    public function cursos()
    {
        return view('website.curso.cursos-programacao');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function show($id)
    {
        // cadastro docente
        $model_docente = CadastroCursos::getCadastroDocente($id);
        $model_curso = CadastroCursos::where('cur_cur_cd_curso', $id)->first(['cur_cur_ds_tema', 'cur_cur_ds_publico',
            'cur_cur_ds_objetivo', 'cur_cur_ds_conteudo', 'cur_cur_hr_inicio', 'cur_cur_hr_final',
            'cur_cur_dt_vencimento', 'cur_cur_vl_sind', 'cur_cur_vl_nsind', 'cur_cur_nr_vaga', 'cur_cur_ds_ch']);

        $model_curso->cur_cur_hr_inicio = (new \DateTime($model_curso->cur_cur_hr_inicio))->format('H');
        $model_curso->cur_cur_hr_final = (new \DateTime($model_curso->cur_cur_hr_final))->format('H');
        $model_curso->cur_cur_dt_vencimento = $this->getMonthsCourse($id);
        $model_curso->cur_cur_vl_sind = number_format($model_curso->cur_cur_vl_sind, 2, ",", ".");
        $model_curso->cur_cur_vl_nsind = number_format($model_curso->cur_cur_vl_nsind, 2, ",", ".");

        return view('website.curso.show', compact('model_docente', 'model_curso'));
    }

    /**
     * select inicia pagina cursos
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function initSelect()
    {
        // meses
        $meses = $this->getMonthsSelect();

        $dataAtual = explode('/', $meses[0]['value']);

        $mes = $dataAtual[0];
        $ano = $dataAtual[1];

        // lista cursos do mes corrente
        $collection = CadastroCursos::getCadastroCursos($mes, $ano);

        $model_cursos = $collection->map(function ($item, $key) use ($mes) {
            $item->cur_cur_hr_inicio = (new \DateTime($item->cur_cur_hr_inicio))->format('H');
            $item->cur_cur_hr_final = (new \DateTime($item->cur_cur_hr_final))->format('H');
            $item->cur_dt_dt_data = $this->getMonthsCourse($item->cur_cur_cd_curso);
            $item->cur_docente = $this->getDocente($item->cur_cur_cd_curso);

            return $item;
        });

        return response()->json(['meses' => $meses, 'model' => $model_cursos]);
    }

    /**
     * select mudanca select option
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeSelect(Request $request)
    {
        // mes selecionado
        $mesSelected = $request->only(array_keys($request->all()))['id'];
        $dataSeleced = explode('/', $mesSelected);
        $mes = $dataSeleced[0];
        $ano = $dataSeleced[1];

        // lista cursos do mes corrente
        $collection = CadastroCursos::getCadastroCursos($mes, $ano);

        $model_cursos = $collection->map(function ($item) use ($mes) {
            $item->cur_cur_hr_inicio = (new \DateTime($item->cur_cur_hr_inicio))->format('H');
            $item->cur_cur_hr_final = (new \DateTime($item->cur_cur_hr_final))->format('H');
            $item->cur_dt_dt_data = $this->getMonthsCourse($item->cur_cur_cd_curso);
            $item->cur_docente = $this->getDocente($item->cur_cur_cd_curso);
            return $item;
        });

        return response()->json(['model' => $model_cursos]);
    }

    /**
     * select meses
     *
     * @return array
     */
    private function getMonthsSelect()
    {
        $array = [];
        $date = Carbon::now('UTC');
        $mes = $date->isoFormat('M');
        $ano = $date->isoFormat('G');

        $meses = EscolaMeses::where('num_mes', '>=', $mes)
            ->where('num_ano', $ano)
            ->where('fl_status', 1)
            ->orderBy('num_ano', 'asc')
            ->orderBy('num_mes', 'asc')
            ->get();

        if(!$meses->isNotEmpty()) {
            $meses[0] = (object) ['num_mes' => $mes, 'num_ano' => $ano];
        }

        foreach ($meses as $key => $item) {
            $meses = $this->configMonth($item->num_mes);
            $array[$key]['option'] = $meses['option'] . ' ' . $item->num_ano;
            $array[$key]['value'] = $meses['value'] . '/' . $item->num_ano;
        }

        return $array;
    }

    /**
     * return months course
     *
     * @param $id
     * @return string
     */
    private function getMonthsCourse($id)
    {
        $collection = DataCursos::where('cur_dt_cd_curso', $id)->orderBy('cur_dt_dt_data')->get(['cur_dt_dt_data']);

        $mes = '';
        $array = [];

        foreach ($collection as $key => $item) {
            $mes_sql = substr($item->cur_dt_dt_data, 5, 2);
            $mes_data = substr($item->cur_dt_dt_data, 5, 2);
            if ($mes_data == $mes_sql) {
                $array[$mes_data][] = substr($item->cur_dt_dt_data, 8, 2);
            } else {
                $array[$mes_data][] = substr($item->cur_dt_dt_data, 8, 2);
            }
        }

        foreach ($array as $k => $item) {
            $valor = count($array[$k]) - 1;
            $index = 0;
            foreach ($item as $j => $value) {
                if ($index != $valor) {
                    $mes .= $value . ', ';
                } else {
                    $mes .= "{$value} de {$this->configMonth($k)['option']}, ";
                }
                $index++;
            }
        }
        return $mes;
    }

    /**
     * retona nome do docente em listar cursos
     *
     * @param $id
     * @return string
     */
    private function getDocente($id)
    {
        $data = CadastroCursos::getCadastroDocente($id);
        $docente = '';
        foreach ($data as $key => $value){
            if($key >= 1){
                $docente .= ', ' . $value->cur_doc_ds_apelido;
            } else {
                $docente = $value->cur_doc_ds_apelido;
            }
        }
        return $docente;
    }

    /**
     * set config months
     *
     * @param $num_mes
     * @return array
     */
    private function configMonth($num_mes)
    {
        $array[] = '';
        $meses = [
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        ];

        foreach ($meses as $key => $value) {
            if ($num_mes == $key) {
                $array['option'] = $value;
                $array['value'] = $key;
            }
        }
        return $array;
    }
}
