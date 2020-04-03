<?php

namespace Website\Http\Controllers\Website;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\ProcessosBeneficiarioUpdateRequest;
use Website\Http\Requests\ProcessosCreateRequest;
use Website\Http\Requests\ProcessosIndexRequest;
use Website\Http\Requests\ProcessosInventarianteUpdateRequest;
use Website\Http\Requests\ProcessosPagamentosRequest;
use Website\Models\CadastroProfessores;
use Website\Models\FichaProfessor;
use Website\Models\ProcessoFinanceiro;
use Website\Models\ProcessoFinanceiroIr;
use Website\Models\Processos;
use Website\Models\ProcessoSite;
use Website\Models\ProcessosProfessores;
use Website\Models\ProfessorEmail;
use Website\Models\ProfessorObservacoes;

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

        /**
         * cria session
         */
        session(['cpf' => $data['cpf']]);
        session(['opcao' => $data['opcao']]);
        session(['nascimento' => $data['nascimento']]);
        session(['professor' => $model[0]->jur_fip_cd_professor ?? null]);

        $opcao = $this->opcaoAcesso($data['opcao']);

        if (count($model) === 0) {
            $request->session()->invalidate();
            return $this->errorMessage();
        }

        $pastas = $model->map(function ($item) {
            return $item->jur_fic_nr_pasta;
        });

        $processos = Processos::whereIn('nr_pasta', $pastas)->paginate(10, ['id_processo', 'ds_processo']);

        return view('website.processos.list', compact('processos', 'model', 'opcao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function select($id_processo)
    {
        $cpf = session('cpf');
        $opcao = session('opcao');

        $processo = Processos::where('id_processo', $id_processo)->first(['ds_processo', 'nr_pasta']);

        $cadastroProfessores = CadastroProfessores::getCadastroProfessores($cpf);

        // opcao 0 => Inventariante;
        // opcao 1 => Beneficiario
        switch ($opcao) {
            case 0:
                // Inventariante
                $model = ProcessosProfessores::where('CPF_beneficiario', $cpf)->first();

                /**
                 * if model empty is insert
                 */
                if (is_null($model)) {
                    $cadastroProfessores = $this->setFormatDataInventariante($cadastroProfessores);
                    return view('website.processos.create', compact('cpf', 'id_processo', 'cadastroProfessores'));
                }

                $model = $this->setFormatDataInventariante($model);

                $message = ProcessoSite::getMessage($processo->nr_pasta, $cpf);

                $anoPagamento = ProcessoFinanceiro::getAnoPagamentos($processo->nr_pasta, $cpf);
                $pagamentos = ProcessoFinanceiro::getPagamentos($processo->nr_pasta, $cpf, $anoPagamento->first()->ano ?? null);
                $total = ProcessoFinanceiro::getTotalPagamentos($processo->nr_pasta, $cpf, $anoPagamento->first()->ano ?? null);
                $anoImposto = ProcessoFinanceiroIr::getAnoImposto($processo->nr_pasta, $cpf);

                /**
                 * if model is update
                 */
                return view('website.processos.edit-inventariante', compact('model', 'cpf', 'opcao', 'processo', 'cadastroProfessores', 'anoPagamento', 'pagamentos', 'total', 'anoImposto', 'message'));
                break;
            case 1:
                // Beneficiario
                $model = $this->setFormatDataBeneficiario($cadastroProfessores);

                $message = ProcessoSite::getMessage($processo->nr_pasta, $cpf);

                $anoPagamento = ProcessoFinanceiro::getAnoPagamentos($processo->nr_pasta, $cpf);
                $pagamentos = ProcessoFinanceiro::getPagamentos($processo->nr_pasta, $cpf, $anoPagamento->first()->ano ?? null);
                $total = ProcessoFinanceiro::getTotalPagamentos($processo->nr_pasta, $cpf, $anoPagamento->first()->ano ?? null);
                $anoImposto = ProcessoFinanceiroIr::getAnoImposto($processo->nr_pasta, $cpf);

                return view('website.processos.edit-beneficiario', compact('model', 'id_processo', 'cpf', 'opcao', 'processo', 'anoPagamento', 'pagamentos', 'total', 'anoImposto', 'message'));
                break;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.processos.create');
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
            $data = $this->getFormatDataInventariante($request);

            /**
             * create tb_sinpro_processos_professores
             */
            ProcessosProfessores::create($data);

            /**
             * update Cadastro_Professores
             */
            CadastroProfessores::updateCadastroProfessores($request->input('professor'), ['PIS' => $request->input('PIS'), 'Nome_Mae' => $request->input('Nome_Mae')]);

            /**
             * deleta session
             */
            $request->session()->invalidate();

            toastr()->success('Cadastro criado com sucesso!');

            return redirect()->route('processos.index');
        } catch (\Exception $exception) {
            toastr()->error('Não foi possível criar o cadastro');
        }
    }

    /**
     * update benefeciario
     *
     * @param ProcessosBeneficiarioUpdateRequest $request
     * @param $codigo_professor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBeneficiario(ProcessosBeneficiarioUpdateRequest $request, $codigo_professor)
    {
        $model = $this->getFormatDataBeneficiario($request);
        $cpf = session('cpf');

        /**
         * Professor_Observacoes
         */
        $this->createProfessorObservacao($codigo_professor, $request);

        /**
         * tb_professor_email.
         */
        $this->createProfessorEmail($codigo_professor, $request);

        /**
         * cadastrar CPF e CPF_Beneficiario em tb_sinpro_processos_professores
         */
        ProcessosProfessores::createOrUpdateProcessosProfessores($request, $cpf);

        /**
         * Cadastro_Professores
         */
        CadastroProfessores::where('Codigo_Professor', $codigo_professor)->update($model);

        /**
         * deleta session
         */
        $request->session()->invalidate();

        toastr()->success('Cadastro alterado com sucesso!');

        return redirect()->route('processos.index');
    }

    /**
     * update inventariante
     *
     * @param ProcessosInventarianteUpdateRequest $request
     * @param $codigo_professor
     * @param $id_cadastro
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateInventariante(ProcessosInventarianteUpdateRequest $request, $codigo_professor, $id_cadastro)
    {
        $model = $this->getFormatDataInventariante($request);

        /**
         * update tb_sinpro_processos_professores
         */
        ProcessosProfessores::where('id_cadastro', $id_cadastro)->update($model);

        /**
         * update Cadastro_Professores
         */
        CadastroProfessores::updateCadastroProfessores($request->input('professor'), ['PIS' => $request->input('PIS'), 'Nome_Mae' => $request->input('Nome_Mae')]);

        /**
         * deleta session
         */
        $request->session()->invalidate();

        toastr()->success('Cadastro alterado com sucesso!');

        return redirect()->route('processos.index');
    }

    /**
     * retorna pagamentos
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPagamento(ProcessosPagamentosRequest $request)
    {
        $cpf = session('cpf');
        $ano = $request->input('ano');
        $pasta = $request->input('pasta');
        $data = ProcessoFinanceiro::getPagamentos($pasta, $cpf, $ano);
        $total = ProcessoFinanceiro::getTotalPagamentos($pasta, $cpf, $ano);
        return response()->json(['data' => $data, 'total' => $total]);
    }

    public function getImposto($ano, $pasta, $ano_pasta)
    {
        $cpf = session('cpf');
        $pasta = "{$pasta}/{$ano_pasta}";

        $model = ProcessoFinanceiroIr::getImposto($pasta, $cpf, $ano);

        return view('website.processos.imposto-show', compact('model'));
    }

    /**
     * deleta session e redireciona para index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sair()
    {
        request()->session()->invalidate();
        return redirect('/processos');
    }

    /**
     * deleta se houver emails cadastrados, e insere novos emails
     *
     * @param $id
     * @param $request
     */
    private function createProfessorEmail($id, $request)
    {
        /**
         * deletar todos os email cadastrado sob o Codigo_Professor
         */
        ProfessorEmail::where('pro_ema_cd_professor', $id)->delete();
        /**
         * insert data email
         */
        $professorEmail = new ProfessorEmail();
        $professorEmail->pro_ema_cd_professor = $id;
        $professorEmail->pro_ema_ds_email1 = $request->input('pro_ema_ds_email1');
        $professorEmail->pro_ema_ds_email2 = $request->input('pro_ema_ds_email2');
        $professorEmail->pro_ema_ds_email3 = $request->input('pro_ema_ds_email3');
        $professorEmail->save();
    }

    /**
     * insert Professor_Observacoes
     *
     * @param $codigoProfessor
     * @param null $request
     */
    private function createProfessorObservacao($codigoProfessor, $request = null)
    {
        // beneficiario
        $collection = CadastroProfessores::getCadastroProfessor($codigoProfessor);
        $modelDatabase = $this->getFormatModel($collection);
        $data = $this->getFormatDataBeneficiario($request);
        $diffModel = array_diff_assoc($modelDatabase, $data);
        $arrayKeysModel = array_keys($diffModel);
        $implodeModel = implode(';', $arrayKeysModel);
        $observacao = strtoupper($implodeModel);

        // email
        $email1 = $request->input('pro_ema_ds_email1');
        $email2 = $request->input('pro_ema_ds_email2');
        $email3 = $request->input('pro_ema_ds_email3');

        if (!is_null(ProfessorEmail::where('pro_ema_cd_professor', $codigoProfessor)->first(['pro_ema_ds_email1', 'pro_ema_ds_email2', 'pro_ema_ds_email3']))) {
            $modelEmail = ProfessorEmail::where('pro_ema_cd_professor', $codigoProfessor)->first(['pro_ema_ds_email1', 'pro_ema_ds_email2', 'pro_ema_ds_email3'])->toArray();
            $arrayEmails = ['pro_ema_ds_email1' => $email1, 'pro_ema_ds_email2' => $email2, 'pro_ema_ds_email3' => $email3];
            $diffEmail = array_diff_assoc($modelEmail, $arrayEmails);
            $arrayKeysEmail = array_keys($diffEmail);
            $implodeEmail = implode(';', $arrayKeysEmail);
            $email = strtoupper($implodeEmail);
        }
        else {
            $email = "E-MAIL";
        }

        $values = '';
        if (!empty($observacao) && !empty($email)) {
            $values = $observacao . ';' . $email;
        } elseif (!empty($observacao) && empty($email)) {
            $values = $observacao;
        } elseif (empty($observacao) && !empty($email)) {
            $values = $email;
        }

        $day = Carbon::now()->format('Y-m-d');
        $hour = Carbon::now()->format('H:i:s');
        if(!empty($values)){
            $values = str_replace(';', '; ', $values);
            $values = str_replace('; ', ' ;', $values);

            $values = ';' . $values;
            // insert observacao
            ProfessorObservacoes::create(['Codigo_Professor' => $codigoProfessor, 'Data' => "{$day} 00:00:00.000", 'Observacao' => $values, 'Login' => 'SITE/PROCESSOS', 'Hora' => "1900-01-01 {$hour}"]);
        }
    }

    /**
     * get data para cadastro inventariante
     *
     * @param $request
     * @return mixed
     */
    private function getFormatDataInventariante($request)
    {
        $data = $request->all();
        $cpf = session('cpf');

        $data['Endereco'] = $data['endereco'];
        $data['Bairro'] = $data['bairro'];
        $data['Cidade'] = $data['cidade'];
        $data['Estado'] = $data['estado'];
        $data['num_ip'] = $request->ip();
        $data['CPF_Beneficiario'] = $cpf;
        $data['Conta'] = $this->getContaAgencia($data['Conta'], $data['contaDV']);
        $data['Agencia'] = $this->getContaAgencia($data['Agencia'], $data['agenciaDV']);

        unset($data['_method'],
            $data['_token'],
            $data['endereco'],
            $data['bairro'],
            $data['cidade'],
            $data['estado'],
            $data['agenciaDV'],
            $data['contaDV'],
            $data['Nome_Mae'],
            $data['PIS'],
            $data['professor']);

        return $data;
    }

    /**
     * get data para cadastro beneficiario
     *
     * @param $request
     * @return mixed
     */
    private function getFormatDataBeneficiario($request)
    {
        $data = $request->all();

        $data['Endereco'] = $data['endereco'];
        $data['Bairro'] = $data['bairro'];
        $data['Cidade'] = $data['cidade'];
        $data['Estado'] = $data['estado'];
        $data['Conta'] = $this->getContaAgencia($data['Conta'], $data['contaDV']);
        $data['Agencia'] = $this->getContaAgencia($data['Agencia'], $data['agenciaDV']);

        unset($data['_method'],
            $data['_token'],
            $data['endereco'],
            $data['bairro'],
            $data['cidade'],
            $data['estado'],
            $data['agenciaDV'],
            $data['contaDV'],
            $data['id_processo'],
            $data['pro_ema_ds_email1'],
            $data['pro_ema_ds_email2'],
            $data['pro_ema_ds_email3']);

        return $data;
    }

    /**
     * normatiza data model para comparação com request form data
     *
     * @param $model
     * @return mixed
     */
    private function getFormatModel($model)
    {
        $data['Nome'] = $model['Nome'];
        $data['Sexo'] = $model['Sexo'];
        $data['RG'] = $model['RG'];
        $data['Data_Aniversario'] = substr($model['Data_Aniversario'], 0, -9);
        $data['PIS'] = $model['PIS'];
        $data['Nome_Mae'] = $model['Nome_Mae'];
        $data['CEP'] = $model['CEP'];
        $data['Numero'] = $model['Numero'];
        $data['Complemento'] = $model['Complemento'];
        $data['DDD_Telefone_Residencial'] = $model['DDD_Telefone_Residencial'];
        $data['Telefone_Residencial'] = $model['Telefone_Residencial'];
        $data['DDD_Telefone_Celular'] = $model['DDD_Telefone_Celular'];
        $data['Telefone_Celular'] = $model['Telefone_Celular'];
        $data['Banco'] = $model['Banco'];
        $data['Agencia'] = $model['Agencia'];
        $data['Conta'] = $model['Conta'];
        $data['Poupanca'] = $model['Poupanca'];
        $data['Conjunta'] = $model['Conjunta'];
        $data['Endereco'] = $model['Endereco'];
        $data['Bairro'] = $model['Bairro'];
        $data['Cidade'] = $model['Cidade'];
        $data['Estado'] = $model['Estado'];
        return $data;
    }

    /**
     * set data para formulario inventariante
     *
     * @param $model
     * @return mixed
     */
    private function setFormatDataInventariante($model)
    {
        $model['endereco'] = $model->Endereco;
        $model['bairro'] = $model->Bairro;
        $model['cidade'] = $model->Cidade;
        $model['estado'] = $model->Estado;
        $agencia = explode('-', $model['Agencia']);
        $model['Agencia'] = $agencia[0] ?? null;
        $model['agenciaDV'] = $agencia[1] ?? null;
        $conta = explode('-', $model['Conta']);
        $model['Conta'] = $conta[0] ?? null;
        $model['contaDV'] = $conta[1] ?? null;

        if ($model['Nome_Mae'] === 'FAVOR INFORMAR') {
            $model['Nome_Mae'] = '';
        }

        if (($model['endereco'] === 'R BORGES LAGOA' || $model['endereco'] === 'RUA BORGES LAGOA') && $model->Numero === '208') {
            $model['endereco'] = '';
            $model['Numero'] = '';
            $model['bairro'] = '';
            $model['cidade'] = '';
            $model['estado'] = '';
        }

        unset($model->Endereco, $model->Bairro, $model->Cidade, $model->Estado);

        return $model;
    }

    /**
     * set data para formulario beneficiario
     *
     * @param $model
     * @return mixed
     */
    private function setFormatDataBeneficiario($model)
    {
        $model['endereco'] = $model->Endereco;
        $model['bairro'] = $model->Bairro;
        $model['cidade'] = $model->Cidade;
        $model['estado'] = $model->Estado;
        $model['pro_ema_ds_email1'] = $model->email->pro_ema_ds_email1 ?? null;
        $model['pro_ema_ds_email2'] = $model->email->pro_ema_ds_email2 ?? null;
        $model['pro_ema_ds_email3'] = $model->email->pro_ema_ds_email3 ?? null;
        $agencia = explode('-', $model['Agencia']);
        $model['Agencia'] = $agencia[0] ?? null;
        $model['agenciaDV'] = $agencia[1] ?? null;
        $conta = explode('-', $model['Conta']);
        $model['Conta'] = $conta[0] ?? null;
        $model['contaDV'] = $conta[1] ?? null;

        if ($model['Nome_Mae'] === 'FAVOR INFORMAR') {
            $model['Nome_Mae'] = '';
        }

        if (($model['endereco'] === 'R BORGES LAGOA' || $model['endereco'] === 'RUA BORGES LAGOA') && $model->Numero === '208') {
            $model['endereco'] = '';
            $model['Numero'] = '';
            $model['bairro'] = '';
            $model['cidade'] = '';
            $model['estado'] = '';
        }

        unset($model->Endereco, $model->Bairro, $model->Cidade, $model->Estado, $model->Email);

        return $model;
    }

    /**
     * concatena conta de dv
     * e.g: 11111-11
     *
     * @param $conta
     * @param $dv
     * @return string
     */
    private function getContaAgencia($conta, $dv)
    {
        return !is_null($dv) ? $conta . '-' . $dv : $conta;
    }

    /**
     * error message caso não conste processo
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function errorMessage()
    {
        return back()->withInput()->withErrors(
            'O seu nome não consta em nenhum processo.
            Em caso de dúvida, solicitamos que entre em contato com o nosso departamento jurídico de segunda a sexta,
            das 8h30 às 18h, através do telefone: (11) 5080-5989.'
        );
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
