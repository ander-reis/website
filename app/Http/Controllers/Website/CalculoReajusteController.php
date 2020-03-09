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
            $data = $request->all();
            unset($data['_token']);

            $valorBase = floatval($data['vl_fev']) * 1.039;

            foreach ($data as $key => $value) {
                if(strstr($key, 'vl_')) {
                    $valorMes = floatval($value);
                    if($valorBase < $valorMes) {
                        $data['fl_diferenca'] = 1;
                        break;
                    }
                    $data['fl_diferenca'] = 0;
                }
            }

            foreach ($data as $key => $value) {
                if(strstr($key, 'vl_')) {
                    $valorMes = floatval($value);
                    $data[$key] = $valorMes;
                }
            }

            $data['vl_fev'] = $valorBase;
            $data['ds_ano'] = '2019';

            CalculoReajuste::create($data);

            toastr()->success('Obrigado por suas informações!');

            return redirect()->route('home');
        } catch (\Exception $e) {
            toastr()->error("Não foi possível alterar o cadastro");
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
            'vl_fev' => "Feveiro/{$anoAtual}",
            'vl_mar' => "Março/{$anoAtual}",
            'vl_abr' => "Abril/{$anoAtual}",
            'vl_mai' => "Maio/{$anoAtual}",
            'vl_jun' => "Junho/{$anoAtual}",
            'vl_jul' => "Julho/{$anoAtual}",
            'vl_ago' => "Agosto/{$anoAtual}",
            'vl_set' => "Setembro/{$anoAtual}",
            'vl_out' => "Outubro/{$anoAtual}",
            'vl_nov' => "Novembro/{$anoAtual}",
            'vl_dez' => "Dezembro/{$anoAtual}",
            'vl_jan' => "Janeiro/{$anoPosterior}",
            'vl_fev1' => "Feveiro/{$anoPosterior}",
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
