<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Models\CadastroCursos;
use Website\Models\EscolaMeses;
use Carbon\Carbon;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.curso.index');
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


        $carbon = Carbon::parse($model_curso->cur_cur_dt_vencimento);
        $model_curso->cur_cur_hr_inicio = (new \DateTime($model_curso->cur_cur_hr_inicio))->format('H');
        $model_curso->cur_cur_hr_final = (new \DateTime($model_curso->cur_cur_hr_final))->format('H');
        $model_curso->cur_cur_dt_vencimento = $carbon->translatedFormat('d \de F Y');
        $model_curso->cur_cur_vl_sind = number_format($model_curso->cur_cur_vl_sind,2,",",".");
        $model_curso->cur_cur_vl_nsind = number_format($model_curso->cur_cur_vl_nsind,2,",",".");

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
        $dataAutal = explode('/', $meses[0]['value']);

        // lista cursos do mes corrente
        $collection =  CadastroCursos::getCursos($dataAutal[0], $dataAutal[1]);

        $model_cursos = $collection->map(function($item) {
            $carbon = Carbon::parse($item->DATA);
            $item->cur_cur_hr_inicio =  (new \DateTime($item->cur_cur_hr_inicio))->format('H');
            $item->cur_cur_hr_final = (new \DateTime($item->cur_cur_hr_final))->format('H');
            $item->DATA = $carbon->translatedFormat('d \de F Y');
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

        // lista cursos do mes corrente
        $collection = CadastroCursos::getCursos($dataSeleced[0], $dataSeleced[1]);

        $model_cursos = $collection->map(function($item, $key){
            $carbon = Carbon::parse($item->DATA);
            $item->cur_cur_hr_inicio =  (new \DateTime($item->cur_cur_hr_inicio))->format('H');
            $item->cur_cur_hr_final = (new \DateTime($item->cur_cur_hr_final))->format('H');
            $item->DATA = $carbon->translatedFormat('d \de F Y');
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
            ->where('num_ano', '>=', $ano)
            ->where('fl_status', 1)
            ->orderBy('num_ano', 'asc')
            ->orderBy('num_mes', 'asc')
            ->get();

        foreach ($meses as $key => $item) {
            $carbon = Carbon::createFromDate(null, $item->num_mes, null);
            $array[$key]['option'] = ucfirst($carbon->isoFormat('MMMM')) . ' ' . $item->num_ano;
            $array[$key]['value'] = $carbon->isoFormat('M') . '/' . $item->num_ano;
        }
        return $array;
    }
}
