<?php

namespace Website\Http\Controllers\Website;

use Illuminate\Http\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\ProcessosCreateRequest;
use Website\Http\Requests\ProcessosIndexRequest;
use Website\Models\CadastroBanco;
use Website\Models\CadastroProfessores;
use Website\Models\FichaProfessor;
use Website\Models\Processos;
use Website\Models\ProcessosProfessores;

class ProcessosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('website.processos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function list(ProcessosIndexRequest $request)
    {
        $data = $request->all();

        $model = FichaProfessor::fichaProfessor($data['cpf'], $data['nascimento']);

        $opcao = $this->opcaoAcesso($data['opcao']);

        if (count($model) === 0) {
            return $this->errorMessage();
        }

        $pastas = $model->map(function ($item) {
            return $item->jur_fic_nr_pasta;
        });

        $processos = Processos::whereIn('nr_pasta', $pastas)->paginate(10, ['id_processo', 'ds_processo']);

        return view('website.processos.list', compact('processos', 'model', 'opcao'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProcessosCreateRequest $request)
    {
        try {
            $data = $request->all();

            $data['Endereco'] = $data['endereco'];
            $data['Bairro'] = $data['bairro'];
            $data['Cidade'] = $data['cidade'];
            $data['Estado'] = $data['estado'];
            $data['num_ip'] = $request->ip();
            $data['CPF_Beneficiario'] = $data['CPF'];
            $data['Email'] = $this->getEmail($data['Email']);
            $data['Conta'] = $this->getContaAgencia($data['Conta'], $data['contaDV']);
            $data['Agencia'] = $this->getContaAgencia($data['Agencia'], $data['agenciaDV']);

            ProcessosProfessores::create($data);

            toastr()->success('Cadastro criado com sucesso!');

            return redirect()->route('processos.index');
        } catch (\Exception $exception) {
            return toastr()->error('Não foi possível criar o cadastro');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $data = $request->all();

        // opcao 0 => Inventariante;
        // opcao 1 => Beneficiario

        switch ($data['ds_opcao']) {
            case 0:
                // Inventariante
                $model = ProcessosProfessores::where('CPF_beneficiario', $data['ds_cpf'])->first();

                /**
                 * if model empty is insert
                 */
                if (empty($model)) {
                    return view('website.processos.create', compact('data'));
                }

                /**
                 * if model is update
                 */
                return view('website.processos.edit', compact('model'));
                break;
            case 1:
                // Beneficiario
                $model = CadastroProfessores::where('CPF', $data['ds_cpf'])
                    ->where('Situacao', '<>', 3)
                    ->where('Situacao', '<>', 4)
                    ->where('Situacao', '<>', 8)
                    ->first();

                return view('website.processos.edit', compact('model'));
                break;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd($id, $request);
    }

    /**
     * transforma email array em string, e.g: email1; email2; email;
     *
     * @param $email
     * @return string
     */
    private function getEmail($email)
    {
        $array_filter = array_filter($email);
        return implode('; ', $array_filter);
    }

    /**
     * concatena conta de dv
     *
     * @param $conta
     * @param $dv
     * @return string
     */
    private function getContaAgencia($conta, $dv)
    {
        return $dv ? $conta . '-' . $dv : $conta;
    }

    /**
     * error message caso não conste processo
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function errorMessage()
    {
        return back()->withInput()->withErrors('O seu nome não consta em nenhum processo.
            Em caso de dúvida, solicitamos que entre em contato com o nosso departamento juríco de segunda a sexta,
            das 8h30 às 18h, através do telefone: (11)5080-5989.');
    }

    /**
     * configura opcao de acesso
     *
     * @param $opcao
     * @return array
     */
    private function opcaoAcesso($opcao)
    {
        return $opcao ? ['name' => 'Beneficiário', 'option' => 1] : ['name' => 'Inventariante', 'option' => 0];
    }
}
