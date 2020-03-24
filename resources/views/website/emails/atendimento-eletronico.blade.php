@component('mail::message')
#Novo chamado cadastrado!

O chamado de número <strong>{{ $id }}</strong> foi cadastrado em nosso website.

Devido ao alto número de atendimentos a distância, pode ser que sua resposta demore um pouco mais a chegar, porém iremos responder a todos. Você também pode falar conosco no número (11) 5080-5988, das 11h às 15h.

@component('mail::button', ['url' => 'http://www1.sinprosp.org.br/admin'])
Acesse aqui a Administração
@endcomponent

Obrigado,<br>
Administração SinproSP
@endcomponent
