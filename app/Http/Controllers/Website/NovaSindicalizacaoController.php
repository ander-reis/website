<?php

namespace Website\Http\Controllers\Website;

use Website\Mail\NovaSindicalizacaoEmail;
use Illuminate\Support\Facades\Mail;
use Website\Http\Controllers\Controller;
use Website\Models\NovaSindicalizacao;

use Illuminate\Http\Request;
use Website\Http\Requests\NovaSindicalizacaoRequest;

use Illuminate\Support\Facades\DB;

class NovaSindicalizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.nova-sindicalizacao.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NovaSindicalizacaoRequest $request)
    {
        try {
            $id_sind = NovaSindicalizacao::max('snd_id_matricula');
            $id_sind++;

            $insert =  NovaSindicalizacao::create([
                'snd_id_matricula'          => $id_sind,
                'snd_nm_professor'          => strtoupper($request['nome']),
                'snd_fl_sexo'               => $request['sexo'],
                'snd_ds_nacionalidade'      => strtoupper($request['nacionalidade']),
                'snd_dt_nascimento'         => $request['nascimento'],
                'snd_ds_cpf'                => $request['cpf'],
                'snd_ds_rg'                 => $request['rg'],
                'snd_fl_estado_civil'       => $request['estadocivil'],
                'snd_cd_cep'                => $request['cep'],
                'snd_ds_endereco'           => strtoupper($request['endereco']),
                'snd_ds_numero'             => strtoupper($request['numero']),
                'snd_ds_complemento'        => strtoupper($request['complemento']),
                'snd_ds_bairro'             => strtoupper($request['bairro']),
                'snd_ds_cidade'             => strtoupper($request['cidade']),
                'snd_ds_uf'                 => strtoupper($request['estado']),
                'snd_ds_ddd_residencial'    => substr($request['telefoneresidencial'],1,2),
                'snd_ds_fone_residencial'   => substr($request['telefoneresidencial'],5,9),
                'snd_ds_ddd_celular'        => substr($request['celular'],1,2),
                'snd_ds_celular'            => substr($request['celular'],5,10),
                'snd_ds_email'              => strtolower($request['email']),
                'snd_fl_pre'                => is_null($request['optInfantil']) ? '' : $request['optInfantil'],
                'snd_fl_1_4serie'           => is_null($request['optFundI']) ? '' : $request['optFundI'],
                'snd_fl_5_8serie'           => is_null($request['optFundII']) ? '' : $request['optFundII'],
                'snd_fl_ens_medio'          => is_null($request['optMedio']) ? '' : $request['optMedio'],
                'snd_fl_ens_superior'       => is_null($request['optSuperior']) ? '' : $request['optSuperior'],
                'snd_fl_supletivo'          => is_null($request['optSupletivo']) ? '' : $request['optSupletivo'],
                'snd_fl_curso_livre'        => is_null($request['optCursosLivres']) ? '' : $request['optCursosLivres'],
                'snd_fl_tecnico'            => is_null($request['optTecnico']) ? '' : $request['optTecnico'],
                'snd_fl_situacao'           => 1,
                'snd_ds_materia'            => strtoupper($request['disciplina']),
                'snd_ds_escola1'            => strtoupper($request['NomeInstI']),
                'snd_ds_endereco1'          => strtoupper($request['EndInstI']),
                'snd_ds_fone1'              => strtoupper($request['TelInstI']),
                'snd_ds_escola2'            => strtoupper($request['NomeInstII']),
                'snd_ds_endereco2'          => strtoupper($request['EndInstII']),
                'snd_ds_fone2'              => strtoupper($request['TelInstII']),
                'snd_ds_escola3'            => strtoupper($request['NomeInstIII']),
                'snd_ds_endereco3'          => strtoupper($request['EndInstIII']),
                'snd_ds_fone3'              => strtoupper($request['TelInstIII']),
                'snd_fl_tipo'               => 0,
                'snd_nm_ip'                 => $request->ip()
            ]);

            $contador = DB::table('tb_sinpro_admin_conta_registros')->update(['id_sindicalizacao' => $id_sind]);

            Mail::to('sinprosp@sinprosp.org.br')->send(new NovaSindicalizacaoEmail($request,$id_sind));

            dd($id_sind);
        } catch (\Exception $e) {
            toastr()->error('Não foi possível enviar a sindicalização!');
            dd($e->getMessage());
            return redirect()->back();
        }
    }
}