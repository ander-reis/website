@extends('layouts.website')

@section('content')
    <div class="row">
        <div class="col-md-9 mb-3 mb-md-5">
            <h1>Previdência</h1>
            <h3>Instruções</h3>
            <p>
                Agradecemos pelos dados informados. Iniciaremos a análise dos mesmos o mais breve possível.
            </p>
            <p>
                Para períodos trabalhados em órgão público sem registro em carteira (estado / prefeitura / federal),
                precisaremos da <strong>certidão de tempo de serviço</strong> ou <strong>certidão de tempo de contribuição</strong> (anexo I e II se concursado e anexo III se contratado).
            </p>
            <p>
                Solicitamos que as certidões sejam digitalizadas e enviadas para o e-mail: <u>previdencia@sinprosp.org.br</u>
            </p>
        </div>
        <div class="col-md-9 mb-3 mb-md-5 text-center">
            <a href="{{ route('home') }}"  class="btn btn-primary">Site do SinproSP </a>
        </div>
    </div>
@endsection

