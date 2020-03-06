<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\CalculoReajusteCreateRequest;
use Website\Models\CadastroEscolas;

class CalculoReajusteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesesCalculo = $this->mesesCalculo();
        return view('website.calculo-reajuste.create', compact('mesesCalculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalculoReajusteCreateRequest $request)
    {
        dd($request->all());

        try {
            toastr()->success('Cadastrado com sucesso!');
        } catch (\Exception $e) {
            toastr()->error("Não foi possível alterar o cadastro");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    /**
     * array meses
     *
     * @return array
     */
    public function mesesCalculo()
    {
        return [
          'vl_fev' => 'Feveiro/2019',
          'vl_mar' => 'Março/2019',
          'vl_abr' => 'Abril/2019',
          'vl_mai' => 'Maio/2019',
          'vl_jun' => 'Junho/2019',
          'vl_jul' => 'Julho/2019',
          'vl_ago' => 'Agosto/2019',
          'vl_set' => 'Setembro/2019',
          'vl_out' => 'Outubro/2019',
          'vl_nov' => 'Novembro/2019',
          'vl_dez' => 'Dezembro/2019',
          'vl_jan' => 'Janeiro/2020',
          'vl_fev1' => 'Feveiro/2020',
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
        if($cnpj != null) {
            $data = CadastroEscolas::where('CGC_Escola', $cnpj)->first(['Razao_Social']);
            if($data) {
                return ['nome' => $data->Razao_Social];
            }
        }
        return ['nome' => ''];
    }
}
