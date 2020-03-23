<?php

namespace Website\Http\Controllers\Website;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\CalculoReajusteCreateRequest;
use Website\Models\CadastroEscolas;
use Website\Models\CalculoReajuste;

class CalculoReajusteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meses = $this->meses();
        return view('website.calculo-reajuste.create', compact('meses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalculoReajusteCreateRequest $request)
    {
        try {
            $gravar = 0;

            $data = $request->all();

            unset($data['_token']);
            unset($data['vl_reajustado']);

            if (is_null($data['ds_cnpj'])) {
                $data['ds_cnpj'] = '';
            }

            $valorBase = round(floatval(str_replace(',','.',str_replace('.','',$data['vl_fev'])) * 1.039),2);

            foreach ($data as $key => $value) {
                if(strstr($key, 'vl_') && $key != 'vl_fev') {

                    $valorMes = floatval(str_replace(',','.',str_replace('.','',$value)));

                    if( ($valorBase > $valorMes) && ($valorMes != 0) ) {
                        $data['fl_diferenca'] = 1;
                        break;
                    }
                    $data['fl_diferenca'] = 0;
                }
            }

            foreach ($data as $key => $value) {
                if(strstr($key, 'vl_')) {
                    $valorMes = floatval(str_replace(',','.',str_replace('.','',$value)));
                    $data[$key] = $valorMes;

                    if (($key != 'vl_fev') && ($valorMes > 0)) { $gravar = 1;}
                }
            }

            $data['ds_ano'] = '2019';
            $data['ds_fantasia'] = mb_strtoupper($data['ds_fantasia']);
            $data['ds_ip'] =  $request->ip();

            if ($gravar == 1 ) {
                CalculoReajuste::create($data);
                return response()->json(['code' => 1, 'message' => 'Obrigado por suas informações']);
            }
            else {
                return response()->json(['code' => 2, 'message' => 'Valores não informados nos meses após fevereiro/2019']);
            }
        } catch (\Exception $e) {
            return response()->json(['code' => 0, 'message' => 'Não foi possível enviar os dados para o SinproSP. Tente novamente mais tarde']);
        }
    }

    /**
     * array meses
     *
     * @return array
     */
    public function meses()
    {
        $dt = Carbon::now();
        $anoAtual = $dt->year - 1;
        $anoPosterior = $dt->year;

        return [
            'vl_mar' => "Mar/{$anoAtual}",
            'vl_abr' => "Abr/{$anoAtual}",
            'vl_mai' => "Mai/{$anoAtual}",
            'vl_jun' => "Jun/{$anoAtual}",
            'vl_jul' => "Jul/{$anoAtual}",
            'vl_ago' => "Ago/{$anoAtual}",
            'vl_set' => "Set/{$anoAtual}",
            'vl_out' => "Out/{$anoAtual}",
            'vl_nov' => "Nov/{$anoAtual}",
            'vl_dez' => "Dez/{$anoAtual}",
            'vl_jan' => "Jan/{$anoPosterior}",
            'vl_fev1' => "Fev/{$anoPosterior}",
        ];
    }

    /**
     * busca cnpj no database Cadastro_Escolas
     *
     * @param Request $request
     * @return array
     */
    public function buscarCnpj(Request $request)
    {
        $cnpj = $request->input('cnpj');
        if ($cnpj != null) {
            $data = CadastroEscolas::where('CGC_Escola', $cnpj)->first(['Razao_Social']);
            if ($data) {
                return ['nome' => $data->Razao_Social];
            }
        }
        return ['nome' => ''];
    }
}
