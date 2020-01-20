<?php

namespace Website\Http\Controllers\Website;

use http\Env\Request;
use Website\Http\Controllers\Controller;
use Website\Http\Requests\ProcessosBeneficiarioUpdateRequest;
use Website\Http\Requests\ProcessosCreateRequest;
use Website\Http\Requests\ProcessosIndexRequest;
use Website\Http\Requests\ProcessosInventarianteUpdateRequest;
use Website\Http\Requests\ProcessosUpdateRequest;
use Website\Models\CadastroProfessores;
use Website\Models\FichaProfessor;
use Website\Models\Processos;
use Website\Models\ProcessosProfessores;
use Website\Models\ProfessorEmail;

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

        $processo = Processos::where('id_processo', $id_processo)->first(['ds_processo']);

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

                /**
                 * if model is update
                 */
                return view('website.processos.edit-inventariante', compact('model', 'cpf', 'opcao', 'processo', 'cadastroProfessores'));
                break;
            case 1:
                // Beneficiario
                $model = $this->setFormatDataBeneficiario($cadastroProfessores);
                return view('website.processos.edit-beneficiario', compact('model', 'cpf', 'opcao', 'processo'));
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
            $this->updateCadastroProfessor($request->input('professor'), ['PIS' => $request->input('PIS'), 'Nome_Mae' => $request->input('Nome_Mae')]);

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

        /**
         * tb_professor_email.
         */
        $this->createProfessorEmail($codigo_professor, $request);

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

//        dd($model);

        /**
         * update tb_sinpro_processos_professores
         */
        ProcessosProfessores::where('id_cadastro', $id_cadastro)->update($model);

        /**
         * update Cadastro_Professores
         */
        $this->updateCadastroProfessor($codigo_professor, ['PIS' => $request->input('PIS'), 'Nome_Mae' => $request->input('Nome_Mae')]);

        /**
         * deleta session
         */
        $request->session()->invalidate();

        toastr()->success('Cadastro alterado com sucesso!');

        return redirect()->route('processos.index');
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

    private function updateCadastroProfessor($id, $data = null)
    {
        $data = CadastroProfessores::where('Codigo_Professor', $id)->update($data);
        return $data;
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

        if ($model['endereco'] === 'R BORGES LAGOA' && $model->Numero === '208') {
            $model['endereco'] = '';
            $model['Numero'] = '';
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

        if ($model['endereco'] === 'R BORGES LAGOA' && $model->Numero === '208') {
            $model['endereco'] = '';
            $model['Numero'] = '';
        }

        unset($model->Endereco, $model->Bairro, $model->Cidade, $model->Estado, $model->Email);

        return $model;
    }

    /**
     * transforma email array em string, e.g: email1; email2; email;
     *
     * @param $email
     * @return string
     */
//    private function getEmailInventariante($email1, $email2, $email3)
//    {
//        $array = [$email1, $email2, $email3];
//        $array_filter = array_filter($array);
//        return implode(';', $array_filter);
//    }

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
        return $dv ? $conta . '-' . $dv : $conta;
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
            Em caso de dúvida, solicitamos que entre em contato com o nosso departamento juríco de segunda a sexta,
            das 8h30 às 18h, através do telefone: (11)5080-5989.'
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
