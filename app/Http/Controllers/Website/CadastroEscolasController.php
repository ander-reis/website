<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\RegiaoRequest;
use Website\Models\CadastroEscolas;

class CadastroEscolasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.cadastro-escolas.index');
    }

    /**
     * recebe nivel
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function nivel(Request $request)
    {
        $id_nivel = $request->id_nivel;

        /**
         * configura nome para o breadcrumb
         */
        $nome_breadcrumb = $this->getName($id_nivel);

        return view('website.cadastro-escolas.nivel', compact('id_nivel', 'nome_breadcrumb'));
    }

    /**
     * recebe nivel e regiao
     *
     * @param $id_nivel
     * @param $id_regiao
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function regiao($id_nivel, $id_regiao)
    {
        $nome_nivel = '';
        $ZIcep = '';
        $ZFcep = '';
        $ZI2cep = '';
        $ZF2cep = '';

        switch ($id_nivel) {
            case 1:
                $nome_nivel = 'Pre';
                break;
            case 2:
                $nome_nivel = '1_4Serie';
                break;
            case 3:
                $nome_nivel = "5_8Serie";
                break;
            case 4:
                $nome_nivel = 'Ens_Medio';
                break;
            case 5:
                $nome_nivel = 'Ens_Superior';
                break;
            case 6:
                $nome_nivel = 'Tecnico';
                break;
            case 7:
                $nome_nivel = 'Supletivo';
                break;
            case 8:
                $nome_nivel = 'Curso_Livre';
                break;
        }

        /**
         * 1 centro
         * 2 norte
         * 3 sul
         * 4 leste
         * 5 oeste
         */
        switch ($id_regiao) {
            case 1:
                $ZIcep = "01000-000";
                $ZFcep = "01999-999";
                break;
            case 2:
                $ZIcep = "02000-000";
                $ZFcep = "02999-999";
                break;
            case 3:
                $ZIcep = "04000-000";
                $ZFcep = "04999-999";
                $ZI2cep = "05600-000";
                $ZF2cep = "05999-999";
                break;
            case 4:
                $ZIcep = "03000-000";
                $ZFcep = "03999-999";
                $ZI2cep = "08000-000";
                $ZF2cep = "08999-999";
                break;
            case 5:
                $ZIcep = "05000-000";
                $ZFcep = "05599-999";
                break;
        }

        /**
         * consulta escolas
         */
        if ($id_regiao == 4 or $id_regiao == 3) {
            $model = CadastroEscolas::where(function ($q) use ($nome_nivel, $ZIcep, $ZFcep, $ZI2cep, $ZF2cep) {
                $q->where($nome_nivel, 1)
                    ->where('CEP', '>', $ZIcep)
                    ->where('CEP', '<', $ZFcep)
                    ->orWhere('CEP', '>', $ZI2cep)
                    ->where('CEP', '<', $ZF2cep);
            })
                ->where('Situacao', '<>', 5)
                ->whereIn('Categoria', [1, 6])
                ->where('CGC_Escola', '<>', '04.224.173/0001-44')
                ->where('CGC_Escola', '<>', '50.270.172/0001-53')
                ->where('CGC_Escola', '<>', '53.497.012/0001-30')
                ->where('CGC_Escola', '<>', '00.000.000/0000-00')
                ->orderBy('Nome_Fantasia', 'asc')
                ->get(['CGC_Escola', 'Nome_Fantasia']);
        } else {
            $model = CadastroEscolas::where(function ($q) use ($nome_nivel, $ZIcep, $ZFcep, $ZI2cep, $ZF2cep) {
                $q->where($nome_nivel, 1)
                    ->where('CEP', '>', $ZIcep)
                    ->where('CEP', '<', $ZFcep);
            })
                ->where('Situacao', '<>', 5)
                ->whereIn('Categoria', [1, 6])
                ->where('CGC_Escola', '<>', '04.224.173/0001-44')
                ->where('CGC_Escola', '<>', '50.270.172/0001-53')
                ->where('CGC_Escola', '<>', '53.497.012/0001-30')
                ->where('CGC_Escola', '<>', '00.000.000/0000-00')
                ->orderBy('Nome_Fantasia', 'asc')
                ->get(['CGC_Escola', 'Nome_Fantasia']);
        }


        $nome_breadcrumb = $this->getName($id_nivel);

        return view('website.cadastro-escolas.relacao', compact('id_nivel', 'id_regiao', 'nome_breadcrumb', 'model'));
    }

    public function escola(Request $request, $id_nivel)
    {
        $model = CadastroEscolas::where('CGC_Escola', $request->cgc)->first([
            'Nome_Fantasia',
            'Razao_Social',
            'Endereco',
            'Numero',
            'Complemento',
            'Bairro',
            'Cidade',
            'Estado',
            'CEP',
            'Telefone1',
            'Telefone1_Ramal',
            'Telefone2',
            'Telefone2_Ramal'
        ]);

        /**
         * configura nome para o breadcrumb
         */
        $nome_breadcrumb = $this->getName($id_nivel);

        return view('website.cadastro-escolas.escola', compact('model', 'id_nivel', 'nome_breadcrumb'));
    }

    /**
     * configura nome do breadcrumb
     *
     * @param $id
     * @return string
     */
    public function getName($id)
    {
        switch ($id) {
            case 1:
                $nome_breadcrumb = 'Educação Infantil';
                break;
            case 2:
                $nome_breadcrumb = 'Ensino Fundamental (1ª à 5ª série)';
                break;
            case 3:
                $nome_breadcrumb = 'Ensino Fundamental (6ª à 9ª série)';
                break;
            case 4:
                $nome_breadcrumb = 'Ensino Médio';
                break;
            case 5:
                $nome_breadcrumb = 'Ensino Superior';
                break;
            case 6:
                $nome_breadcrumb = 'Técnico';
                break;
            case 7:
                $nome_breadcrumb = 'Supletivo';
                break;
            case 8:
                $nome_breadcrumb = 'Curso Livre';
                break;
        }
        return $nome_breadcrumb;
    }
}
