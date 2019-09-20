<?php

namespace Website\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AtendimentoEletronicoEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('website.emails.atendimento-eletronico')
                    ->subject('[SinproSP] Atendimento on-line (chamado nº '. $this->id .')')
                    ->cc('sinprosp@sinprosp.org.br');
    }
}
