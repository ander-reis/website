@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-9">
            <h2 class="mb-4">Atendimento Eletrônico</h2>
            <div class="mb-5">
                <p>Se você busca esclarecimentos de dúvidas na área trabalhista, previdenciária, sobre legislação educacional ou sobre qualquer
                assunto relacionado ao trabalho desenvolvido pelo Sindicato, utilize os campos abaixo para nos enviar sua mensagem. A resposta
                será enviada o mais breve possível.</p>
            </div>
            <div>
            @csrf
            </div>
            <form action="{{url('/atendimento-eletronico')}}" method="get">
                <div class="form-group">
                    <label for="frmNome">Nome</label>
                    <input type="text" class="form-control" id="frmNome" required placeholder="Informe seu nome">
                </div>
                <div class="form-group">
                    <label for="frmDpto">Selecione o assunto/departamento:</label>
                    <select class="form-control" id="frmDpto" required>
                        <option value="">Escolha uma opção...</option>
                        <option value="1">Dúvida trabalhista</option>
                        <option value="2">Colônia de férias</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="frmEmail">E-mail</label>
                    <input type="email" class="form-control" id="frmEmail" required aria-describedby="email-obs" placeholder="Informe um e-mail válido">
                    <small id="email-obs" class="form-text text-muted">Essa informação é restrita e confidencial!</small>
                </div>

                <div class="form-group">
                    <label for="frmTexto">Texto a ser enviado:</label>
                    <textarea class="form-control" id="frmTexto" rows="3" maxlength="2000" required></textarea><!--minlength="10"-->
                </div>

                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1" style="font-size:0.8rem;">
                        Estou ciente de que o SinproSP respeita a privacidade e não divulga quaisquer informações que eu mencionar nesse atendimento.
                    </label>
                </div>

                {!! Recaptcha::render() !!}

                <div class="form-group mt-2">
                    <input type="hidden" nome="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary">Enviar ao SinproSP</button>
                </div>
            </form>
        </div>
        @component('website.components.layout-1._column_right')@endcomponent
    </div>
@endsection
