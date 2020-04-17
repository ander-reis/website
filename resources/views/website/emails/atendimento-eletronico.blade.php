@component('mail::message')
#Novo chamado cadastrado!

O chamado de número <strong>{{ $id }}</strong> foi cadastrado em nosso website.

@component('mail::button', ['url' => 'http://www1.sinprosp.org.br/admin'])
Acesse aqui a Administração
@endcomponent

Obrigado,<br>
Administração SinproSP
@endcomponent
