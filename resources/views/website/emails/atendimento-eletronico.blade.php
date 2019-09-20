@component('mail::message')
#Novo chamado cadastrado!

O chamado de número <strong>{{ $id }}</strong> foi cadastrado em nosso website e deve ser respondido o mais breve possível.

@component('mail::button', ['url' => 'http://www.sinprosp.org.br/admin'])
Acesse aqui a Administração
@endcomponent

Obrigado,<br>
Administração SinproSP
@endcomponent
