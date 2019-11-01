<?php

namespace Website\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovaSindicalizacaoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $dados;
    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dados,$ticket)
    {
        $this->dados = $dados;
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('website.emails.nova-sindicalizacao')
                    ->subject('[SINDICALIZAÇÃO] '. $this->dados->nome)
                    ->with([
                        'ticket'                => $this->ticket,
                        'nome'                  => $this->dados->nome,
                        'sexo'                  => $this->dados->sexo,
                        'nacionalidade'         => $this->dados->nacionalidade,
                        'nascimento'            => $this->dados->nascimento,
                        'cpf'                   => $this->dados->cpf,
                        'rg'                    => $this->dados->rg,
                        'estadocivil'           => $this->dados->estadocivil,
                        'cep'                   => $this->dados->cep,
                        'endereco'              => $this->dados->endereco,
                        'endereco'              => $this->dados->endereco,
                        'numero'                => $this->dados->numero,
                        'complemento'           => $this->dados->complemento,
                        'bairro'                => $this->dados->bairro,
                        'cidade'                => $this->dados->cidade,
                        'estado'                => $this->dados->estado,
                        'telefoneresidencial'   => $this->dados->telefoneresidencial,
                        'celular'               => $this->dados->celular,
                        'email'                 => $this->dados->email,
                        'optInfantil'           => $this->dados->optInfantil,
                        'optFundI'              => $this->dados->optFundI,
                        'optFundII'             => $this->dados->optFundII,
                        'optMedio'              => $this->dados->optMedio,
                        'optSuperior'           => $this->dados->optSuperior,
                        'optSupletivo'          => $this->dados->optSupletivo,
                        'optCursosLivres'       => $this->dados->optCursosLivres,
                        'optTecnico'            => $this->dados->optTecnico,
                        'situacao'              => $this->dados->situacao,
                        'disciplina'            => $this->dados->disciplina,
                        'NomeInstI'             => $this->dados->NomeInstI,
                        'EndInstI'              => $this->dados->EndInstI,
                        'TelInstI'              => $this->dados->TelInstI,
                        'NomeInstII'            => $this->dados->NomeInstII,
                        'EndInstII'             => $this->dados->EndInstII,
                        'TelInstII'             => $this->dados->TelInstII,
                        'NomeInstIII'           => $this->dados->NomeInstIII,
                        'EndInstIII'            => $this->dados->EndInstIII,
                        'TelInstIII'            => $this->dados->TelInstIII,
                    ]);
                    //->cc('webmaster@sinprosp.org.br');
    }
}
